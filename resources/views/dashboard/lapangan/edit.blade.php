@extends('layout.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="container mt-1">
    <h2>Edit Lapangan</h2>
    <form action="/dashboard/lapangan/{{$lapangan->id}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
        <!-- Text Input -->
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" value="{{$lapangan->nama}}" id="nama" placeholder="" required>
    </div>

    <div class="form-group">
        <label for="file_foto">File Foto</label>
        <input type="file" name="file_foto"  accept="image/*" value="{{$lapangan->file_foto}}" id="file_foto">
        <img src="@if ($lapangan->file_foto) {{ asset('storage/'.$lapangan->file_foto) }} @endif" >
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection