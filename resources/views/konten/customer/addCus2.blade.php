@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Add Customer 2</h2></center>
@endsection

@section('konten')
<div class="col-lg-12">
	<div class="block margin-bottom-sm">
    <br>
    <center><div class="title"><strong>Please Fill The BOX</strong></div></center>
	<form class="form-horizontal" action="" method="post">
		{{ @csrf_field() }}

	  <div class="form-group row">
		<label class="col-sm-3 form-control-label">Nama</label>
			<div class="col-sm-9">
		 	 <input type="text" class="form-control" name="nama" id="nama">
			</div>
	  </div>
	  <div class="line"></div>

	  <div class="form-group row">
	 	<label class="col-sm-3 form-control-label">Alamat</label>
	  	<div class="col-sm-9">
			<input type="text" class="form-control" name="Alamat" id="Alamat">
	 	 </div>
	  </div>
	  <div class="line"></div>

	  <div class="form-group row">
		<label class="col-sm-3 form-control-label">Provinsi</label>
		<div class="col-sm-9">
		  <input type="email" class="form-control" name="Provinsi" id="Provinsi">
		</div>
	  </div>
	  <div class="line"></div>

	  <div class="form-group row">
		<label class="col-sm-3 form-control-label">Kota</label>
		<div class="col-sm-9">
		  <input type="text" class="form-control" name="Kota" id="Kota">
		</div>
	  </div>
	  <div class="line"></div>

	  <div class="form-group row">
		<label class="col-sm-3 form-control-label">Kecamatan</label>
		<div class="col-sm-9">
		  <input type="text" class="form-control" name="Kecamatan" id="Kecamatan">
		</div>
	  </div>
	  <div class="line"></div>

	  <div class="form-group row">
		<label class="col-sm-3 form-control-label">Kelurahan</label>
		<div class="col-sm-9">
		  <input type="text" class="form-control" name="Kelurahan" id="Kelurahan">
		</div>
	  </div>
	  <div class="line"></div>

	  <div class="form-group row">
		<label class="col-sm-3 form-control-label">Kode Pos</label>
		<div class="col-sm-9">
		  <input type="text" class="form-control" name="kdpos" id="kdpos">
		</div>
	  </div>
	  <div class="line"></div>

	  <div>
		
	</div>
	<div class="form-actions form-group">
	<div class="row">
		<div class="col-sm-5">
			<canvas id="myCanvas2" width="320" height="240" style="border:1px solid #000000;">
		</div>
		<div class="col-sm-7" text-right>
				<br><br><br><br>
				<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#largeModal">Ambil Gambar</button>
		</div>
	</div>
</div>
	<center><input type="submit" value="add" class="btn btn-primary"></center>
	</form>
</div>
</div>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Ambil Foto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-6">
						<video autoplay="" id="video-webcam" class="border w-100">
						Browsermu tidak mendukung bro, upgrade donk!</video>
					</div>
					<div class="col-sm-6" text-right>
						<canvas id="myCanvas" width="320" height="240" style="border:1px solid #000000;"></canvas>
						<button type="button" class="btn btn-primary" onclick="takeSnapshot()">Ambil Foto</button>
					</div>
				</div>
				<div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary"  data-dismiss="modal" onclick="saveSnapshot()">Simpan Foto</button>
                        </div>
			</div>

<script type="text/javascript">
    // seleksi elemen video
	var video = document.querySelector("#video-webcam");

// minta izin user
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

// jika user memberikan izin
if (navigator.getUserMedia) {
	// jalankan fungsi handleVideo, dan videoError jika izin ditolak
	navigator.getUserMedia({ video: true }, handleVideo, videoError);
}

// fungsi ini akan dieksekusi jika  izin telah diberikan
function handleVideo(stream) {
	video.srcObject = stream;
}

// fungsi ini akan dieksekusi kalau user menolak izin
function videoError(e) {
	// do something
	alert("Izinkan menggunakan webcam untuk demo!")
}

function takeSnapshot() {
	

	// ambil ukuran video
	var width = video.offsetWidth
			, height = video.offsetHeight;

	// buat elemen canvas
	canvas = document.getElementById("myCanvas");
	canvas.width = width;
	canvas.height = height;

	// ambil gambar dari video dan masukan 
	// ke dalam canvas
	context = canvas.getContext('2d');
	context.drawImage(video, 0, 0, width, height);
}

function saveSnapshot() {
	var img = document.createElement('img');

	// ambil ukuran video
	var width = video.offsetWidth
			, height = video.offsetHeight;

	// buat elemen canvas
	canvas1 = document.getElementById("myCanvas2");
	canvas1.width = width;
	canvas1.height = height;
	foto = document.getElementById("myCanvas");

	context = canvas1.getContext('2d');
	context.drawImage(foto, 0, 0, width, height);

	img.src = canvas1.toDataURL('image/png');
	document.getElementById("foto").value=img;
}
</script>

@endsection

