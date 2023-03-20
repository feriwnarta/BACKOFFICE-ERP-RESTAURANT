$(window).on('load', function(){
    let html = sessionStorage.getItem('html');

    if(html != null && html != undefined) {

        let currentPage = $('#page').html();

        let replaceHtml = `
            <div class="wrapper">
            <nav id="sidebar">
                ${html}
            </nav>
            <div id="content">
                <div id="page">
                ${currentPage}
                </div>
            </div>
            </div>
        `;


        $('.wrapper').html(replaceHtml);

        dataTableInit();

        // $('body').replaceWith(replaceHtml);
        

        // var newDoc = document.open("text/html", "replace");
        // newDoc.write(html);
        // newDoc.close();
    }
    
});

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


window.addEventListener("beforeunload", function (event) {

  
    let html = $('#sidebar').html();
    

    this.sessionStorage.setItem('html', html);
  
    
  });