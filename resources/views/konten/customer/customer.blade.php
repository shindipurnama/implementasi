@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Customer</h2></center>
@endsection

@section('konten')
<br>
<div class="col-lg-12" class="form-inline">
<div class="card" >
<div class="row">
    <div class="col-lg-4">
        <div class="card-header d-flex align-items-center">
            <h3 class="h4">Data Customer</h3>
            <div class="card-body">
            <a href="/dataCus"><button type="button" class="btn btn-primary">Open</button></a>  
            </div>
        </div>
    </div>

    <div class="col-lg-4">
    <div class="card-header d-flex align-items-center">
            <h3 class="h4">Tambah Customer 1</h3>
            <div class="card-body">
            <a href="/addCus1"><button type="button" class="btn btn-primary">Add</button></a>  
            </div>
        </div>
    </div>

    <div class="col-lg-4">
    <div class="card-header d-flex align-items-center">
            <h3 class="h4">Tambah Customer 2</h3>
            <div class="card-body">
            <a href="/addCus2"><button type="button" class="btn btn-primary">Add</button></a>  
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection