@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">ScoreBoard</h2></center>
@endsection

@section('konten')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<audio id="audio1">
 <source src="{{ asset('asset/lagu/sound1.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<audio id="audio2">
 <source src="{{ asset('asset/lagu/sound2.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<audio id="audio3">
 <source src="{{ asset('asset/lagu/sound3.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<audio id="audio4">
 <source src="{{ asset('asset/lagu/sound4.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>



<center>
<div class="form-row">
    <div class="col md-4" id="name_home">a</div>
    <div class="col md-4" id="name_away">b</div>
</div>

<div class="form-row mt-4">
    <div class="col md-4" id="score_home">0</div>
    <div class="col md-4" id="score_away">0</div>
</div>
</center>

<center class="mt-4">
<div>Timer = <span id="timer">09 : 00</span></div>
</center>
    
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

@endsection
