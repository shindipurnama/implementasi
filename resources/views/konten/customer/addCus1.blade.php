@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Add Customer 1</h2></center>
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

	<center><input type="submit" value="add" class="btn btn-primary"></center>
	</form>
</div>
</div>

@endsection