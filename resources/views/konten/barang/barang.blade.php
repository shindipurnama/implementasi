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
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
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
<div class="table-responsive"> 		 
         <div class="form-group"> 
         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row"  align="center">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 58px;">Barang Id</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62px;">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 50px;">Barcode</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">Action</th>
                  </tr>
                  </thead>
                  <tfoot>
                    <tr align="center"><th rowspan="1" colspan="1">Barang ID</th>
                    <th rowspan="1" colspan="1">Nama</th>
                    <th rowspan="1" colspan="1">Barcode</th>
                    <th rowspan="1" colspan="1">Action</th>
                  </tfoot>
                  <tbody>
               @foreach ($barang as $br)
                    <tr align="center">
                       <td>{{ $br->id_barang }} </td>
                       <td>{{ $br->nama }} </td>
                       <td> <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                        $br->id_barang, 'C128')}}" height="60" width="180"></td>
                       <td><a href="/cetakBarcodeId/{{ $br->id_barang }}"><button class="btn btn-success">cetak</button</a></td>
                    </tr>
                 @endforeach   
            </tbody>
                </table></div></div><div class="row">
                <div class="col-sm-12 col-md-5">
                  <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 6 of 6 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                 <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                  <ul class="pagination">
                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                    </ul>
                  </div></div></div></div>
              </div>
            </div>
          </div>
         <center>
         <a href="/cetakBarcode"><button type="button" class="btn btn-primary">Cetak Barcode</button></a> 
         </center>
        </div>
    </div>
</div>
</div>


@endsection