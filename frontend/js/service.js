var searchDoctors = function() {

var searchData =JSON.stringify( {"searchdoctor" : $("input[name='searchData']").val(),"gradID" : $("#sel1").val(),"instID" : $("#sel2").val()});
$.post("http://localhost/oceni-doktora/backend/api/searchDoctors.php", searchData, function(data){
    var doctorsArray = JSON.parse(data)
    printDoctors(doctorsArray);
});

};
function handle(e) {
    if(e.keyCode === 13) {
      e.preventDefault();
      searchDoctors();
    }
    return false;
  }