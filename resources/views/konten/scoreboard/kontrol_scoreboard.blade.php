@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Kontrol ScoreBoard</h2></center>
@endsection

@section('konten')

<meta name="csrf-token" content="{{ csrf_token() }}">   


<div class="col-lg-12" class="form-inline">
</br>
<center>

<div class="row">
	<div class="col-lg-6">
        <div class="card">
            <div class="block margin-bottom-sm"> 
            <div class="card-header"><center><h2 class="h5 no-margin-bottom">HOME</h2></center></div>
            <br>
                <form action=""  method="POST">
                    <div class="form-group row">
                        <div class="col col-md-1"></div>
                        <div class="col col-md-6">
                            <input type="text" class="form-control" name ="nama_home" id="nama" placeholder="Masukkan Home" >
                        </div>
                        <div class="col col-md-1"><button type="submit" class="btn-sm1 btn btn-success">Submit</button></div>
                    </div>
                </form>
                
                </br>
                <div class="form-group row">
                    <div class="col col-md-2"></div>
                    <div class="col col-md-2">
                        <form action="" method="POST">
                            <button type="submit" class=" btn-submit-homeplus2 btn btn-primary" name="homeplus2">+ 2 Home</button>
                        </form>
                    </div>
                    <div class="col col-md-2">
                        <form action="" method="POST">
                            <button type="submit" class=" btn-submit-homeminus2 btn btn-danger" name="homeminus2">- 2 Home</button>
                        </form>
                    </div>
                    <div class="col col-md-2">
                        <form action="" method="POST">
                            <button type="submit" class=" btn-submit-homeplus3 btn btn-info" name="homeplus3">+ 3 Home</button>
                        </form>
                    </div>
                    <div class="col col-md-2">
                        <form action="" method="POST">
                            <button type="submit" class=" btn-submit-homeminus3 btn btn-warning" name="homeminus2">- 3 Home</button>
                        </form>
                    </div>
                </div>
                <div class="col col-md-3">
                        <form action="" method="POST">
                            <button type="submit" class=" btn-submit-foulshome btn btn-secondary" name="fouls_home">Fouls</button>
                        </form>
                </div> </br>

            </div>
        </div> 
    </div> 
    

    
    <div class="col-lg-6">
        <div class="card">
            <div class="block margin-bottom-sm"> 
            <div class="card-header"><center><h2 class="h5 no-margin-bottom">AWAY</h2></center></div>
            <br>
            <form action="" method="POST">
                <div class="form-group row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-6">
                        <input type="text" class="form-control" name ="nama_away" id="nama" placeholder="Masukkan Away" >
                    </div>
                    <div class="col col-md-1"><button type="submit" class="btn-sm2 btn btn-success">Submit</button></div>
                </div>
            </form>

            </br>
                <div class="form-group row">
                    <div class="col col-md-2"></div>
                    <div class="col col-md-2">
                        <form action="" method="POST">
                            <button type="submit" class=" btn-submit-awayplus2 btn btn-primary" name="awayplus2">+ 2 Away</button>
                        </form>
                    </div>
                    <div class="col col-md-2">
                        <form action="" method="POST">
                            <button type="submit" class=" btn-submit-awayminus2 btn btn-danger" name="awayminus2">- 2 Away</button>
                        </form>
                    </div>
                    <div class="col col-md-2">
                        <form action="" method="POST">
                            <button type="submit" class=" btn-submit-awayplus3 btn btn-info" name="awayplus3">+ 3 Away</button>
                        </form>
                    </div>
                    <div class="col col-md-2">
                        <form action="" method="POST">
                            <button type="submit" class=" btn-submit-awayminus3 btn btn-warning" name="awayminus3">- 3 Away</button>
                        </form>
                    </div>
                    
                </div>
                <div class="col col-md-3">
                        <form action="" method="POST">
                            <button type="submit" class="btn-submit-foulsaway btn btn-secondary " name="fouls_away">Fouls</button>
                        </form>
                </div> </br>

            </div>
        </div> 
    </div> 

    <div class="col-lg-4">
        <div class="card">
            <div class="block margin-bottom-sm"> 
            <div class="card-header"><center><h2 class="h5 no-margin-bottom">TIMER</h2></center></div>
            <br>
                <div class="form-group row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-2">
                        <form action="/store-start-timer" method="POST">
                            <button type="submit" class=" btn-submit-start-timer btn btn-outline-success" name="start_timer">Start Timer</button>
                        </form>
                    </div>
                    <div class="col col-md-1"></div>
                    <div class="col col-md-2">
                        <form action="/store-resume-timer" method="POST">
                            <button type="submit" class="btn btn-outline-warning btn-submit-resume-timer" name="resume_timer">Resume Timer</button>
                        </form>
                    </div>
                    <div class="col col-md-2"></div>
                    <div class="col col-md-2">
                        <form action="/store-stop-timer" method="POST">
                            <button type="submit" class=" btn-submit-stop-timer btn btn-outline-danger" name="stop_timer">Stop Timer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div> 

    <div class="col-lg-4">
        <div class="card">
            <div class="block margin-bottom-sm"> 
            <div class="card-header"><center><h2 class="h5 no-margin-bottom">PERIODE</h2></center></div>
            <br>
            
                <form action=""  method="POST">
                    <div class="form-group row">
                    <div class="col col-md-1"></div>
                        <div class="col col-md-6">
                            <input type="number" class="form-control" name ="nama_periode" id="nama" placeholder="Input Periode" >
                        </div>
                        <div class="col col-md-1"><button type="submit" class="btn-periode btn btn-success">Submit</button></div>

                    </div>
                </form>
            </div>
        </div> 
    </div>
  
    <div class="col-lg-4">
        <div class="card">
            <div class="block margin-bottom-sm"> 
            <div class="card-header"><center><h2 class="h5 no-margin-bottom">MUSIC</h2></center></div>
            <br>
                <div class="form-group row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-2">
                        <form action="" method="POST">
                            <button type="submit" class=" btn-submit-sound1 btn btn-outline-warning" name="homeminus2">SHOOTING</button>
                        </form>
                    </div>
                    <div class="col col-md-2"></div>
                    <div class="col col-md-2">
                        <form action="" method="POST">
                            <button type="submit" class=" btn-submit-sound2 btn btn-outline-success" name="homeminus2">GOALS</button>
                        </form>
                    </div>
                    <div class="col col-md-1"></div>
                    <div class="col col-md-2">
                        <form action="" method="POST">
                            <button type="submit" class=" btn-submit-sound3 btn btn-outline-danger" name="homeminus2">MISSED</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div> 

    <div class="col-lg-12">
        <div class="card">
            <div class="block margin-bottom-sm"> 
                <div class="card-header"><center><h2 class="h5 no-margin-bottom">RESET</h2></center></div>
                <br>
                <form action="" method="POST">
                    <button type="submit" class="btn btn-danger btn-submit-reset" name="reset">Reset</button>
                <br><br>
            </div>
        </div> 
    </div> 

</div>  

</center> 
</div>    
<script>
    $(".btn-sm1").click(function(e){
        e.preventDefault();

        var home = $("input[name=nama_home]").val();
        var url = '{{ url('store-home') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
                  name_home:home, 
                },
           success:function(response){
                  console.log('sukses')
           },
           error:function(error){
              console.log(error)
           }
        });
	});
</script>

<script>
    $(".btn-sm2").click(function(e){
        e.preventDefault();

        var away = $("input[name=nama_away]").val();
        var url = '{{ url('store-away') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
                  name_away:away, 
                },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
	});
</script>

<script>

    $(".btn-submit-homeplus2").click(function(e){
        console.log('masukplus2home');
        e.preventDefault();

        var homeplus2 = $("input[name=homeplus2]").val();
        var url = '{{ url('store-homeplus2') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
           },
           error:function(error){
              console.log(error)
           }
        });
    });
    
</script>

<script>


    $(".btn-submit-homeminus2").click(function(e){
        console.log('masukminus2home');
        e.preventDefault();

        var url = '{{ url('store-homeminus2') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>

    $(".btn-submit-homeplus3").click(function(e){
        console.log('masukhomeplus3');
        e.preventDefault();

        var url = '{{ url('store-homeplus3') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')

           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>

    $(".btn-submit-homeminus3").click(function(e){
        console.log('masukhomeminus3');
        e.preventDefault();

        var url = '{{ url('store-homeminus3') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>



<script>


    $(".btn-submit-awayplus2").click(function(e){
        console.log('masukawayplus2');
        e.preventDefault();

        var url = '{{ url('store-awayplus2') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>


    $(".btn-submit-awayplus3").click(function(e){
        console.log('awayplus3');
        e.preventDefault();

        var url = '{{ url('store-awayplus3') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>


    $(".btn-submit-awayminus3").click(function(e){
        console.log('awayminus3');
        e.preventDefault();

        var url = '{{ url('store-awayminus3') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>


    $(".btn-submit-awayminus2").click(function(e){
        console.log('awayminus2');
        e.preventDefault();

        var url = '{{ url('store-awayminus2') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>


<script>


    $(".btn-submit-sound1").click(function(e){
        console.log('sound1');
        e.preventDefault();

        var url = '{{ url('store-sound1') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>

    $(".btn-submit-sound2").click(function(e){
        console.log('sound2');
        e.preventDefault();

        var url = '{{ url('store-sound2') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>

    $(".btn-submit-sound3").click(function(e){
        console.log('sound3');
        e.preventDefault();

        var url = '{{ url('store-sound3') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>


    $(".btn-submit-start-timer").click(function(e){
        console.log('start-timer');
        e.preventDefault();

        var url = '{{ url('reset-menit-detik') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>


    $(".btn-submit-resume-timer").click(function(e){
        console.log('resume-timer');
        e.preventDefault();

        var url = '{{ url('resume-menit-detik') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>


    $(".btn-submit-stop-timer").click(function(e){
        console.log('stop-timer');
        e.preventDefault();

        var url = '{{ url('stop-menit-detik') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>


<script>

    $(".btn-submit-foulshome").click(function(e){
        console.log('masukfoulshome');
        e.preventDefault();

        var fouls_home = $("input[name=fouls_home]").val();
        var url = '{{ url('store-foulshome') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
           },
           error:function(error){
              console.log(error)
           }
        });
    });
    
</script>

<script>

    $(".btn-submit-foulsaway").click(function(e){
        console.log('masukfoulsaway');
        e.preventDefault();

        var fouls_away = $("input[name=fouls_away]").val();
        var url = '{{ url('store-foulsaway') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
           },
           error:function(error){
              console.log(error)
           }
        });
    });
    
</script>


<script>
    $(".btn-periode").click(function(e){
        e.preventDefault();

        var periode = $("input[name=nama_periode]").val();
        var url = '{{ url('store-periode') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
                  name_periode:periode, 
                },
           success:function(response){
                  console.log('sukses')
              
           },
           error:function(error){
              console.log(error)
           }
        });
	});
</script>

<script>

    $(".btn-submit-reset").click(function(e){
        console.log('masukreset');
        e.preventDefault();

        var reset = $("input[name=reset]").val();
        var url = '{{ url('reset') }}';

        $.ajax({
           url:url,
           method:'POST',
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
              
           },
           success:function(response){
                  console.log('sukses')
           },
           error:function(error){
              console.log(error)
           }
        });
    });
    
</script>
@endsection
