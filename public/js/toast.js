class Toast {
    static success(element, title, message) {
        let styleHeader = `
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 28px;
        color: #0A0A0A;
        `;

        let styleBody = `
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 20px;
        padding: 16px 16px;
        gap: 4px;
        color: #616161;
        `;

        let html = `
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

        <div class="toast-container position-fixed top-0 start-50 translate-middle-x py-5">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
        >
          <div class="toast-header">

            <img src="/img/icons/check-circle.png" class="rounded me-2" alt="...">

            <strong class="me-auto" style="${styleHeader}">
            ${title}
            </strong>
            
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body" style="${styleBody}">
            ${message}
            
          </div>

          <div style=
            "
            width: 100%;
              height: 0px;
  
              border: 2px solid #B8DBCA;
            ">
            </div>
        </div>
      </div>
        `;
        $(element).append(html);

        new bootstrap.Toast($("#liveToast")).show();
    }
}
