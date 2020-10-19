@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Barang</h2></center>
@endsection

@section('konten')
<br>
<div class="col-lg-12" class="form-inline">
<div class="card" >
<div class="table-responsive"> 
		 
         <div class="form-group">  
             <table class="table table-striped">
               <thead>
                 <tr align="center">
                   <th>Barang Id</th>
                   <th>Nama</th>  
                   <th>Barcode</th>
                 </tr>
               </thead>
               <tbody>
               @foreach ($barang as $br)
                    <tr align="center">
                       <td>{{ $br->id_barang }} </td>
                       <td>{{ $br->nama }} </td>
                       <td> <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                        $br->id_barang, 'C128')}}" height="60" width="180">
                        <br>{{$br->id_barang }} </td>
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