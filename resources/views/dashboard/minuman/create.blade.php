@extends('layout.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="container mt-1">
    <h2>Tambah Minuman</h2>
    <form action="/dashboard/minuman" method="POST">
    @csrf
    <!-- Text Input -->
    <div class="form-group">
        <label for="name">nama</label>
        <input type="text" class="form-control" name="nama" id="name" placeholder="" required>
    </div>

    <div class="form-group">
        <label for="name">Merk</label>
        <input type="text" class="form-control" name="merk" id="name" required>
    </div>

    <div class="form-group">
        <label for="name">Harga</label>
        <input type="text" class="form-control" name="harga" id="name" required>
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