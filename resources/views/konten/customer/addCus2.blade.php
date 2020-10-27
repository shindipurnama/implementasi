@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Add Customer 2</h2></center>
@endsection

@section('konten')
<div class="col-lg-12">
	<div class="block margin-bottom-sm">
    <br>
    <center><div class="title"><strong>Please Fill The BOX</strong></div></center>
	<form class="form-horizontal" action="cusStore2" method="post" enctype="multipart/form-data">
	{{ @csrf_field() }}
	  <div class="form-group row">
		<div class="col col-md-3">
			<label for="text-input" class=" form-control-label">Nama Customer</label></div>
			<div class="col-12 col-md-9">
			<input type="text" id="nama" name="nama" placeholder="Masukkan Nama" class="form-control"></div>
		</div>
	  </div>
	  <div class="line"></div>
 
	  <div class="form-group row">
	  <div class="col col-md-3">
	  	<label for="email-input" class=" form-control-label">Alamat</label></div>
		<div class="col-12 col-md-9">
		<input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" class="form-control">
		</div>
	  </div>
	  <div class="line"></div>

	  <div class="form-group row">
	  <div class="col col-md-3">
	  <label for="select" class=" form-control-label">Provinsi</label></div>
		<div class="col-12 col-md-9">
			<select name="provinsi" class="form-control">
				<option value="">Please select</option>
				@foreach ($provinsi as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select>
		</div>
	</div>
	  <div class="line"></div>

	  <div class="form-group row">
	  <div class="col col-md-3">
	  <label for="select" class=" form-control-label">Kota</label></div>
		<div class="col-12 col-md-9">
			<select name="kota" class="form-control">
				<option value="0">Please select</option>
			</select>
		</div>
	  </div>
	  <div class="line"></div>

	  <div class="form-group row">
	  <div class="col col-md-3">
	  	<label for="select" class=" form-control-label">Kecamatan</label></div>
		<div class="col-12 col-md-9">
			<select name="kecamatan" class="form-control">
				<option value="0">Please select</option>
			</select>
		</div>
	  </div>
	  <div class="line"></div>

	  <div class="form-group row">
	  <div class="col col-md-3">
	  <label for="select" class=" form-control-label">Kode Pos - Kelurahan</label></div>
		<div class="col-12 col-md-9">
			<select name="kelurahan" class="form-control">
				<option value="0">Please select</option>
			</select>
		</div>
	  </div>
	  <div class="line"></div>


	<div class="form-actions form-group">
	<div class="row">
		<div class="col-sm-5">
            <img src="" id="img" name="img" required="required">
            <input id="foto" name="foto" type="hidden" value="" required="required">
		</div>
		<div class="col-sm-7" text-right>
				<br>
				<button type="button" onclick="btn_ambilFoto()" class="btn btn-success btn-xl" data-toggle="modal" data-target="#modal">Ambil Foto</button>
		</div>
	</div>
	</div>
	<center><input type="submit" value="add" class="btn btn-primary"></center>
	</form>
</div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="width:500px; margin-left:50px;">
		<div class="modal-header">
			<h3 class="modal-title" id="exampleModalLongTitle" style="float:left; margin-top:3px; margin-left:10px;">Ambil Foto</h3>
			<button type="button" style="margin-top:5px;" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div id="kamera"></div>
			<div id="results" style="float:right; margin-top:-140px; margin-right:5px;"></div>
		<center>
				<br>
			<button id="btn_kamera" type="button" onclick="take_snapshot()" class="btn btn-primary"><i class="fa fa-camera fa-lg"></i></button>
		</center>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" id="save" class="btn btn-primary simpan-foto" data-dismiss="modal">Save changes</button>
		</div>
		</div>
		</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous"></script>

<script type="text/javascript">
	jQuery(document).ready(function ()
	{
			jQuery('select[name="provinsi"]').on('change',function(){
				var countryID = jQuery(this).val();
				if(countryID)
				{
					jQuery.ajax({
						url : 'konten/customer/addCus1/getstates/' +countryID,
						type : "GET",
						dataType : "json",
						success:function(data)
						{
						console.log(data);
						jQuery('select[name="kota"]').empty();
						jQuery.each(data, function(key,value){
							$('select[name="kota"]').append('<option value="'+ key +'">'+ value +'</option>');
						});
						}
					});
				}
				else
				{
					$('select[name="kota"]').empty();
				}
			});
	});
	jQuery(document).ready(function ()
	{
			jQuery('select[name="kota"]').on('change',function(){
				var id_kota = jQuery(this).val();
				if(id_kota)
				{
					jQuery.ajax({
						url : 'konten/customer/addCus1/kecamatan/' +id_kota,
						type : "GET",
						dataType : "json",
						success:function(data)
						{
						console.log(data);
						jQuery('select[name="kecamatan"]').empty();
						jQuery.each(data, function(key,value){
							$('select[name="kecamatan"]').append('<option value="'+ key +'">'+ value +'</option>');
						});
						}
					});
				}
				else
				{
					$('select[name="kecamatan"]').empty();
				}
			});
	});
	jQuery(document).ready(function ()
	{
			jQuery('select[name="kecamatan"]').on('change',function(){
		var kecamatanID = jQuery(this).val();
		if(kecamatanID)
		{
			jQuery.ajax({
			url : 'konten/customer/addCus1/kelurahan/' +kecamatanID,
			type : "GET",
			dataType : "json",
			success:function(data)
			{
				console.log(data);
				jQuery('select[name="kelurahan"]').empty();
				jQuery.each(data, function(key, value){
				$('select[name="kelurahan"]').append('<option value="'+ value.ID_KELURAHAN +'">'+ value.KODEPOS + ' - ' + value.NAMA_KELURAHAN +'</option>');
				});
			}
			});
		}
		else
		{
			$('select[name="kelurahan"]').empty();
		}
		});
	});
</script>

<script>
  Webcam.set({
    width: 200,
    height: 140,
    image_format: 'png',
    jpeg_quality: 90
  })

  function btn_ambilFoto(){
    Webcam.attach("#kamera")
  }

  function take_snapshot(){
    Webcam.snap(function (data_uri){
      document.getElementById('results').innerHTML =
      '<img id="hasil" src="'+data_uri+'"/>';
    });

    var hasil = $('#hasil').attr('src');
    $('#save').click(function(){
      $('#img').attr('src', hasil);
      $('#foto').val(hasil);
    });
  }
</script>



@endsection

