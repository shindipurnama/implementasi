@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Data Customer</h2></center>
@endsection

@section('konten')
<br>
<div class="col-lg-12">
<div class="card" >
		 
	<div class="form-group">  
		<table class="table table-striped">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Nama</th>
			  <th>Alamat</th>                                   
			  <th>Provinsi</th>                        
			  <th>Kota</th>
			  <th>Kecamatan</th>
			  <th>Kelurahan</th>
			  <th>Kode Pos</th>
			</tr>
		  </thead>
		  <tbody>

		  <tr>
			  <td>1</td>
			  <td>-</td>
			  <td>-</td>
			  <td>-</td>
			  <td>-</td>
			  <td>-</td>
			  <td>-</td>
			  <td>-</td>
		  </tr>
	</tbody>
	</table>
     </div>
	<div class="form-group">  
          <center>
          <a href="/addCus1"><button type="button" class="btn btn-primary">Tambah Customer 1</button></a>  
          <a href="/addCus2"><button type="button" class="btn btn-primary">Tambah Customer 2</button></a>  
	  	</center>
     </div>
</div>
     
</div>


@endsection