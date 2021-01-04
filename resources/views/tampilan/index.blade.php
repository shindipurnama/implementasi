<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Implementasi dan Deploy Sistem</title>
    <meta name="description" content="Implementasi">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <meta name="google-signin-client_id" content="490293223703-cs5mvvdilfvi5gjlbbmb6qiu406s54vq.apps.googleusercontent.com">
    <meta name="google-signin-scope" content="profile email">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('/css/fontastic.css') }}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <!--ini header-->
      @include('tampilan/header')

      <div class="page-content d-flex align-items-stretch"> 

      @include('tampilan/sidebar')
        <div class="content-inner">
        <!-- ini Side Navbar -->
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
            @yield('judul')
            </div>
          </header>
          <!-- ini body -->
          <!-- awal konten -->
          <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
            <div role="document" class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 id="exampleModalLabel" class="modal-title">Getaway Timeout</h4>
                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <p>Sesi akan segera berakhir. apakah anda ingin menambah sesi?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" data-dismiss="modal" onclick="reload()" class="btn btn-primary btn-session-yes">Yes</button>
                  <button type="button" data-dismiss="modal"  onclick="stop()" class="btn btn-secondary btn-session-no">No</button>
                </div>
              </div>
            </div>
          </div>
                @yield('konten')
            <!-- akhir konten -->
          <!-- ini Footer-->
        @include('tampilan/footer')

        </div>
        
      </div>
      
    </div>
    <!-- JavaScript files-->
    <!-- Scripts -->
    <script type="text/javascript">
      var idleTime = 0;
      $(document).ready(function () {
          //Increment the idle time counter every minute.
          var idleInterval = setInterval(timerIncrement, 30000); // 30 Detik

          //Zero the idle timer on mouse movement.
          $(this).mousemove(function (e) {
              idleTime = 0;
          });
          $(this).keypress(function (e) {
              idleTime = 0;
          });
      });

      function timerIncrement() {
          idleTime = idleTime + 1;
          if (idleTime > 59) { // 30 minutes // per30 detik
            $('#myModal').modal('show');
            if (idleTime > 60) { // 20 minutes
              $('#myModal').modal('hide');
              window.alert("Getaway Timeout");
            }
          }
      }

      function reload(){
        window.location.reload();
      }

      function stop(){
        $('#myModal').modal('hide');
        window.alert("Getaway Timeout");
      }
    </script>  
    <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/charts-home.js') }}"></script>
    <!-- Main File-->
    <script src="{{ asset('/js/front.js') }}"></script>
  </body>
</html>

    