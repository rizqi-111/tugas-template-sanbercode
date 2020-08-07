@extends('adminlte.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Beranda Pertanyaan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Beranda Pertanyaan</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Default box -->
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<a class="btn btn-primary mb-2" href="/pertanyaan/create">Buat Pertanyaan</a>
@forelse($pertanyaan as $key => $value)
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{$value->judul}}</h3>
        
        <div class="card-tools" style="display: flex;">
            <a href="/pertanyaan/{{$value->id}}" class="btn btn-info btn-sm">Detil</a>
            <a href="/pertanyaan/{{$value->id}}/edit" class="btn btn-secondary btn-sm">Ubah</a>
            <form action="/pertanyaan/{{$value->id}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
            </form>
        </div>
    </div>
    <div class="card-body">
        {{$value->isi}}
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Jawaban
    </div>
    <!-- /.card-footer-->
</div>
@empty
  <p>Belum Ada Pertanyaan</p>
@endforelse
<!-- /.card -->
@endsection