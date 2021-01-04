<link rel="stylesheet" href="css_scoreboard.css">

<meta name="csrf-token" content="{{ csrf_token() }}"> 
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-dark">
                    <div class="card-body card-block">
                      <audio id="audio1">
                      <source src="{{ asset('sound1.mp3') }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>

                      <audio id="audio2">
                      <source src="{{ asset('sound2.mp3') }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>

                      <audio id="audio3">
                      <source src="{{ asset('sound3.mp3') }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>

                      <audio id="audio4">
                      <source src="{{ asset('asset/lagu/sound4.mp3') }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>

                      <centre>
                      <h1 style="text-align: center;">NBA 2021</h1>
                        <div class="largebox-div">
                        </div>
                        <span></span>
                        <span></span>
                        <div class="child-div"></div>
                        <div class="next-div"></div>
                        <div class="home-team"><div  id="name_home">a</div></div>
                        <div class="away-team"><div id="name_away">b</div></div>
                        <div class="timer" id="timer"></span></div>
                        <div class="twodigit">00</div>
                        <div class="nexttwodigit"></div>
                        <div class="doubledot">:</div>
                        <div class="home-score" id="score_home"></div>
                        <div class="away-score" id="score_away"></div>
                        <div class="period" >PERIOD</div>
                        <div class="periodscore" id="periode"></div>
                        <div class="foul-home" >FOUL</div>
                        <div class="foul-away" >FOUL</div>
                        <div class="foulhomescore" id="fouls_home"></div>
                        <div class="foulawayscore" id="fouls_away"></div>
                      </centre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- /.content -->
        <!-- Footer -->
        
        <!-- /.site-footer -->
    <
    <!-- /#right-panel -->

    <!-- Scripts -->
    
<script src="js/scoreboard.js"></script>
    <script>
var stop;
var menit;
var detik;
window.onload = function() {
    var sse = new EventSource("/sse");
      sse.onmessage = function(e) {
          console.log(e);
          var data_json = JSON.parse(e.data);
          document.getElementById("name_home").innerHTML=data_json[0].name_home;
          document.getElementById("name_away").innerHTML=data_json[0].name_away;
          document.getElementById("score_home").innerHTML=data_json[0].score_home;
          document.getElementById("score_away").innerHTML=data_json[0].score_away;
          document.getElementById("periode").innerHTML=data_json[0].periode;
          document.getElementById("fouls_home").innerHTML=data_json[0].fouls_home;
          document.getElementById("fouls_away").innerHTML=data_json[0].fouls_away;

      
          

          if(data_json[0].musik==1){
            var audio1 = document.getElementById("audio1");
            stop_audio2_audio3();
            audio1.play();
            update_sound();
          }

          if(data_json[0].musik==2){
            var audio2 = document.getElementById("audio2");
            stop_audio1_audio3();
            audio2.play();
            update_sound();
          }

          if(data_json[0].musik==3){
            var audio3 = document.getElementById("audio3");
            stop_audio1_audio2();
            audio3.play();
            update_sound();
          }
          
          document.getElementById('timer').innerHTML = data_json[0].menit + ":" + data_json[0].detik;
          
          if(data_json[0].status_waktu==1){
            startTimer();


            function startTimer() {
            
                    var presentTime = document.getElementById('timer').innerHTML;
                    var timeArray = presentTime.split(/[:]+/);
                    var m = timeArray[0];
                    var s = checkSecond((timeArray[1] - 1));
                    if(s==59){m=m-1}
                    if(m<0){
                        if(data_json[0].menit==0 && data_json[0].detik==00){
                            var audio4 = document.getElementById("audio4");
                            audio4.play();
                            
                        }
                        
                    }
                    else{
                        menit = m;
                        detik = s;
                        insert_menit_detik();
                        console.log(m);
                        console.log(s);
                        setTimeout(startTimer, 1000*1000);
                    }
                }

                function checkSecond(sec) {
                        if (sec < 10 && sec >= 0) {sec = "0" + sec}; 
                        if (sec < 0) {sec = "59"};
                        return sec;
                }
          }
      
          


        //   tutup-sse
      }
}



function insert_menit_detik(){
             
      
        var url = '{{ url('update-menit-detik') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              name_menit:menit, 
              name_detik:detik, 
           },
           success:function(response){
              
           },
           error:function(error){
              console.log(error)
           }
                });
}

function stop_audio1_audio2(){
      audio1.pause();
      audio1.currentTime = 0;
      audio2.pause();
      audio2.currentTime = 0;
}

function stop_audio2_audio3(){
      audio2.pause();
      audio2.currentTime = 0;
      audio3.pause();
      audio3.currentTime = 0;
}

function stop_audio1_audio3(){
      audio1.pause();
      audio1.currentTime = 0;
      audio3.pause();
      audio3.currentTime = 0;
}

function update_sound(){
    
        var url = '{{ url('update-sound') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log(response.message);
              
           },
           error:function(error){
              console.log(error)
           }
                });
        }
</script>

    
    
    <script type="text/javascript">
        var idleTime = 0;
        $(document).ready(function () {
            //Increment the idle time counter every second.
            var idleInterval = setInterval(timerIncrement, 1000); // 1 second

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
            if (idleTime > 1799) { // 30 minutes
                $('#myModal'.modal('show'));
                if (idleTime > 1809){
                    $('#myModal').modal('hide');
                    window.alert("Waktu sesi anda telah habis");
                }
            }
        }

        function reload(){
            window.location.reload();
        }

        function stop(){
            $('#myModal').modal('hide');
            window.alert("Waktu sesi anda telah habis");
        }

    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('asset/lte/assets/js/main.js')}}"></script>

    
    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="{{ asset('asset/lte/assets/js/init/weather-init.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="{{ asset('asset/lte/assets/js/init/fullcalendar-init.js')}}"></script> 

   
