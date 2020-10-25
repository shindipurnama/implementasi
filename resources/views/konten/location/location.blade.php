@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Data lokasi toko</h2></center>
@endsection

@section('konten')
<br>
<div class="col-lg-12" class="form-inline">
<div class="card" >

<table class="table table-striped">
		  <thead>
            @foreach ($lokasi_toko as $lok)
			<tr>
			  <th>Barcode</th>
			  <th>Nama toko</th>                                   
			  <th>Latitude</th>                        
			  <th>Longtitude</th>
			  <th>Accuracy</th>
			</tr>
		  </thead>
		  <tbody>
		  <tr align="center">
			  <td> <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                    $lok->barcode, 'C128')}}" height="60" width="180">
                    <br>{{$lok->barcode }}</td>
			  <td>{{$lok->nama_toko }}</td>
			  <td>{{$lok->latitude }}</td>
			  <td>{{$lok->longitude }}</td>
			  <td>{{$lok->accuracy }}</td>
		  </tr>
	</tbody>
	</table>
     @endforeach
     <center>
         <a href="CetakBarcodeLokasi"><button type="button" class="btn btn-primary">Cetak Barcode</button></a> 
         </center>
</div>
</div>
@endsection

