// $(window).on('load', function(){
//     let html = sessionStorage.getItem('html');

//     if(html != null && html != undefined) {

//         let currentPage = $('#page').html();
        
//         var newDoc = document.open("text/html", "replace");
//         newDoc.write(html);
//         newDoc.close();


//         $('#page').html(currentPage);

//     }
    
// });

// Data Table
function dataTableInit() {
    $(document).ready(function() {
        $('#tableMenu').DataTable( {
            paging: true,
            selected: false,
            lengthChange: false,
            searching: false,
            info: false,
        } );
    });
}



// window.addEventListener("beforeunload", function (event) {

  
//     let html = $('html').html();
    

//     this.sessionStorage.setItem('html', html);
  
    
//   });