 
var printDoctors = function(doctorsArray){
                    if(doctorsArray.length>0){
                    $("#lista-doktora").empty();
                    $.each(doctorsArray, function(i,doktor){
                    content = '<div class="panel-heading">' + doktor.ime + " " + doktor.prezime + '</div>';
                    content += '<div class="panel-body"><img class="img-thumbnail slike-velicina" src="' + doktor.slika + '"/></div>';
                    content += '<div class="panel-body">'+ '<b>' + 'Ocena: ' + doktor.ukupna.ukupna + '</b>' +'</div>';
                    content += '<div class="panel-body">'+ 'Znanje: ' + doktor.ukupna.znanje +'</div>';
                    content += '<div class="panel-body">'+ 'Dostupnost: ' + doktor.ukupna.dostupnost +'</div>';
                    content += '<div class="panel-body">'+ 'Komunikativnost: ' + doktor.ukupna.komunikacija +'</div>';
                    content += '<div class="panel-body">'+ 'Profesionalnost: ' + doktor.ukupna.profesionalnost +'</div>';
                    content += '<div class="panel-body"><span class="stars">'+ doktor.ukupna.ukupna +'</span></div>';
                    content += '<div class="panel-body">' + 'Institucija: ' + doktor.institucija +'</div>';
                    content += '<div class="panel-body">' + 'Grad: ' + doktor.grad + '</div>';
                    content += '<br/>';
                    $(content).appendTo("#lista-doktora");
                });
                drawStars();
                    }
            else{
                $("#lista-doktora").empty();
                content = '<div class="panel panel-danger">';
                content += '<div class="panel-heading">' + 'Ne postoji trazeni lekar!' + '</div>';
                content += '</div>';
                $(content).appendTo("#lista-doktora");

            }
              
            }

var drawStars = function(){
    $(function() {
    $('span.stars').stars();
    });+ '</div>';
    }
var getDoctors = function(){
    $.get( "http://localhost/oceni-doktora/backend/api/getDoctors.php", function( data ) {
    var doctorsArray = JSON.parse(data)
        printDoctors(doctorsArray);    
    });          
            // Funkcija za zvezdice
    $.fn.stars();
    
};
var getGradovi = function(){
$.get("http://localhost/oceni-doktora/backend/api/getGradovi.php", function( data ) {
    var gradoviArray =  JSON.parse(data);
    printGrad(gradoviArray);
});
}
var printGrad = function (gradoviArray){    
    $.each(gradoviArray, function(i,grad){
    content = '<option value=' + grad.id + '>' + grad.ime_grada + '</option>';
    $(content).appendTo("#sel1");
    });
}

var getInstitucije = function (gradid){
    $.get("http://localhost/oceni-doktora/backend/api/getInstitucija.php"+"?gradid="+gradid, function(data) {
        var institucijaArray = JSON.parse(data);
        printInstitucija(institucijaArray);
    });
}
var printInstitucija = function(institucijaArray){
    $("#sel2").empty();
    $("#sel2").prepend("<option disabled selected value>-- Selektujte instituciju --</option>");
    $.each(institucijaArray, function(i,institucija){
        content = '<option value=' + institucija.id + '>' + institucija.ime_institucije + '</option>';
        $(content).appendTo("#sel2");
    });
}

 var gradChange = function () {
   var gradid = $("#sel1").val();
   var gradText = $("#sel1 :selected").text();
   $("#searchText").prop('disabled', true);
   getInstitucije(gradid);
   $("#sel2").prop('disabled', false);
    
 }
var institucijaChange = function (){
    var instText = $("#sel2 :selected").text();
    $("#searchText").prop('disabled', false);
    
}