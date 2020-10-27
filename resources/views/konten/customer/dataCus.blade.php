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
                 <tr align="center">
					<th>ID Customer</th>
					<th>ID Kelurahan</th>
					<th>Nama Customer</th>
					<th>Alamat Customer</th>
					<th>Foto Customer</th>
                 </tr>
               </thead>
               <tbody>
               @foreach ($customer as $cust)
                    <tr align="center">
						<td>{{$cust->ID_CUSTOMER}}</td>
						<td>{{$cust->ID_KELURAHAN}}</td>
						<td>{{$cust->NAMA}}</td>
						<td>{{$cust->ALAMAT}}</td>
						<td>
						@if (isset($cust->FOTO))
							<img src="{{ base64_decode($cust->FOTO) }}">
						@elseif (isset($cust->FILE_PATH))
							<img src="{{ asset($cust->FILE_PATH) }}">
						@endif
						</td>
                    </tr>
                 @endforeach   
            </tbody>
         </table>
		<div>

	<div class="form-group">  
          <center>
          <a href="/addCus1"><button type="button" class="btn btn-primary">Tambah Customer 1</button></a>  
          <a href="/addCus2"><button type="button" class="btn btn-primary">Tambah Customer 2</button></a>  
	  	</center>
     </div>
</div> 
</div>
</div>
</div>


@endsection