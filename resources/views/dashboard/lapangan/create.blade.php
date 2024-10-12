@extends('layout.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="container mt-1">
    <h2>Tambah Lapangan</h2>
    <form action="/lapangan" method="POST" enctype="multipart/form-data">
    @csrf
    
    <!-- Text Input -->
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="name" placeholder="" required>
    </div>

    <div class="form-group">
        <label for="message">File Foto</label>
        <input type="file" name="file_foto"  accept="image/*" value="{{old('file_foto')}}" id="file_foto">
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