<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo List</title>

        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        @livewireStyles

    </head>
    <body>


      <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="liveToastSuccess" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#00e504"></rect></svg>
            <strong class="me-auto">Success</strong>
            {{-- <small>11 mins ago</small> --}}
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body" id="toast-body-message-success">
            Berhasil di simpan!
          </div>
        </div>
      </div>

      <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="liveToastError" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#e12e00"></rect></svg>
            <strong class="me-auto">Error</strong>
            {{-- <small>11 mins ago</small> --}}
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body" id="toast-body-message-error">
            Berhasil di simpan!
          </div>
        </div>
      </div>


        {{ $slot }}
       

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        @livewireScripts

        @stack('script')

        <script>

          document.addEventListener("DOMContentLoaded", () => {
            
            window.livewire.on('success', (message) => {
                  var option = {
                      animtion : true,
                      delay: 2000
                  }

                  var toastHtmlElement = document.getElementById('liveToastSuccess')
                  var toastElement = new bootstrap.Toast(toastHtmlElement, option)
                  document.getElementById("toast-body-message-success").innerHTML = message;
                  toastElement.show( )
             });
             
             window.livewire.on('error', (message) => {

                  var option = {
                      animtion : true,
                      delay: 5000
                  }

                   var toastHtmlElement = document.getElementById('liveToastError')
                   var toastElement = new bootstrap.Toast(toastHtmlElement, option)
                   document.getElementById("toast-body-message-error").innerHTML = message;
                   toastElement.show( )
              });

          })
         

                  
      </script>

    </body>
</html>
