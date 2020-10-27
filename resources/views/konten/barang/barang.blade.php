@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Barang</h2></center>
@endsection

@section('konten')
<br>
<div class="col-lg-12" class="form-inline">
<div class="card" >
</br>
<center><h2 class="h5 no-margin-bottom">Tambah Barang</h2></center>
</br>
	<form class="form-horizontal" action="tambahBarang" method="post" enctype="multipart/form-data">
	{{ @csrf_field() }}
  <div class="form-group row">
    <div class="col col-md-1"></div>
    <div class="col col-md-2"><strong><label for="text-input" class=" form-control-label">Nama Barang</label></strong></div>
    <div class="col col-md-6"><input type="text" id="nama" name="nama" placeholder="Masukkan Nama Barang" class="form-control"></div>
    <div class="col col-md-2"><input type="submit" value="add" class="btn btn-success"></div>
  </div>
	</form>
</div>

<div class="card" >
</br>
<center><h2 class="h5 no-margin-bottom">Data Barang</h2></center>
</br>
<div class="table-responsive"> 		 
         <div class="form-group">  
             <table class="table table-striped">
               <thead>
                 <tr align="center">
                   <th>Barang Id</th>
                   <th>Nama</th>  
                   <th>Barcode</th>
                   <!--<th>Action</th>-->
                 </tr>
               </thead>
               <tbody>
               @foreach ($barang as $br)
                    <tr align="center">
                       <td>{{ $br->id_barang }} </td>
                       <td>{{ $br->nama }} </td>
                       <td> <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                        $br->id_barang, 'C128')}}" height="60" width="180"></td>
                       <!-- <td><a href="/cetakBarcodeId/{id}"><button class="btn btn-success">cetak</button</a></td> -->
                    </tr>
                 @endforeach   
            </tbody>
         </table>
         <center>
         <a href="/cetakBarcode"><button type="button" class="btn btn-primary">Cetak Barcode</button></a> 
         </center>
        </div>
    </div>
</div>
</div>

@endsection