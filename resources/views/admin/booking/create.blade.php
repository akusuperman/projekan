@extends('layout.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="container mt-1">
    <h2>Tambah booking</h2>
    <form action="/booking" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="dateInput">Tanggal</label>
        <input type="date" class="form-control" name="tanggal_booking" id="dateInput" required>
    </div>

    <div class="form-group">
        <label for="timeInputStart">Jam Masuk</label>
        <input type="time" class="form-control" name="jam_masuk" id="timeInputStart" required>
    </div>

    <div class="form-group">
        <label for="timeInputEnd">Jam Keluar</label>
        <input type="time" class="form-control" name="jam_keluar" id="timeInputEnd" required>
    </div>

    <div class="form-group">
        <label for="jenisSelect">Pemesan</label>
        <select class="form-control" name="id_orang" id="jenisSelect">
            <option value="">Pilih Pemesan</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="jenisSelect">Lapangan</label>
        <select class="form-control" name="id_lapangan" id="jenisSelect">
            <option value="">Pilih Lapangan</option>
            @foreach($lapangan_array as $lapangan)
                <option value="{{ $lapangan->id }}">{{ $lapangan->nama }}</option>
            @endforeach
        </select>
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