@extends('adminlte.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detil Pertanyaan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detil Pertanyaan</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{$pertanyaan->judul}}</h3>
    </div>
    <div class="card-body">
        {{$pertanyaan->isi}}
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Jawaban
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection