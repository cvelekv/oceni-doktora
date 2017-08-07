var searchDoctors = function() {
var searchData =JSON.stringify( {"searchdoctor" : $("input[name='searchData']").val()});
$.post("/backend/api/searchDoctors.php", searchData, function(data){
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