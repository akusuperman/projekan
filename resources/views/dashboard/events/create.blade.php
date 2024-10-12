@extends('layout.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="container mt-1">
    <h2>Tambah Event</h2>
    <form action="/events" method="POST" enctype="multipart/form-data">
    @csrf
    
    <!-- Text Input -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="nama_event" id="name" placeholder="" required>
    </div>

    <div class="form-group">
        <label for="dateInput">Tanggal</label>
        <input type="date" class="form-control" name="tanggal_event" id="dateInput" required>
    </div>

    <div class="form-group">
        <label for="timeInputStart">Jam Mulai</label>
        <input type="time" class="form-control" name="jam_mulai" id="timeInputStart" required>
    </div>

    <div class="form-group">
        <label for="timeInputEnd">Jam Selesai</label>
        <input type="time" class="form-control" name="jam_selesai" id="timeInputEnd" required>
    </div>

    <div class="form-group">
        <label for="location">Lokasi</label>
        <input type="text" class="form-control" name="lokasi" id="location" placeholder="" required>
    </div>

    <div class="form-group">
        <label for="message">Deskripsi</label>
        <textarea class="form-control" id="message" name="deskripsi" rows="3" placeholder=""></textarea>
    </div>

    <div class="form-group">
        <label for="message">File Foto</label>
        <input type="file" name="file_foto_new"  accept="image/*" id="file_foto">
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