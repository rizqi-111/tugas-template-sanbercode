@extends('adminlte.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Pertanyaan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ubah Pertanyaan</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Pertanyaan</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="/pertanyaan/{{$pertanyaan->id}}" method="POST">
    @csrf  
    @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul',$pertanyaan->judul) }}" placeholder="Masukkan Judul">
                    @error('judul')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label for="isi">Isi Pertanyaan</label>
                    <textarea class="form-control" rows="3" id="isi" name="isi" placeholder="Isi Pertanyaan">{{ old('isi',$pertanyaan->isi) }}</textarea>
                    @error('isi')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection 