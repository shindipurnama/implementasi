@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Data Customer</h2></center>
@endsection

@section('konten')
<br>
<div class="col-lg-12">
<div class="card" >

<div class="form-group">  
<div class="table-responsive"> 		 
         <div class="form-group"> 
         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            </div>
            <div class="card-body">

            @if($message = Session::get('fsuccess'))
              <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                  <span class="badge badge-pill badge-primary">Success</span>
                  {{ $message }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              @endif
              
              @if(count($errors) > 0)
              <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                  <span class="badge badge-pill badge-danger">Error</span>
                  @foreach($errors->all() as $error)
                      {{ $error }}
                  @endforeach
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              @endif

              @if($message = Session::get('ferror'))
              <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                  <span class="badge badge-pill badge-danger">Error</span>
                  {{ $message }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              @endif

              @if($message = Session::get('ferror2'))
              <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                  <span class="badge badge-pill badge-danger">Error</span>
                  {{ $message }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              @endif

              <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                  IMPORT EXCEL
              </button> <br><br>

              <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row" align="center">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 58px;">ID Customer</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62px;">ID Kelurahan</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 50px;">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 50px;">Alamat</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 50px;">Foto</th>
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
			</table></div></div><div class="row">
                <div class="col-sm-12 col-md-5">
                  <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 4 of 4 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                 <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                  <ul class="pagination">
                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                    <!--<li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                    <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>-->
                  </ul>
                  </div></div></div></div>
              </div>
            </div>
          </div>
    
	<div class="form-group">  
          <center>
          <a href="/addCus1"><button type="button" class="btn btn-primary">Tambah Customer 1</button></a>  
          <a href="/addCus2"><button type="button" class="btn btn-primary">Tambah Customer 2</button></a>  
	  	</center>
     </div>
</div>
</div>
</div>
</div></div>

 <!-- Import Excel -->
 <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form method="post" action="import_excel" enctype="multipart/form-data">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
              </div>
              <div class="modal-body">

                  {{ csrf_field() }}

                  <label>Pilih file excel</label>
                  <div class="form-group">
                      <input type="file" name="file_excel" required="required">
                  </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Import</button>
              </div>
          </div>
      </form>
  </div>
</div>
@endsection