@extends('layout.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="container mt-1">
    <h2>Edit Minuman</h2>
    <form action="/dashboard/minuman/{{$minuman->id}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
        <!-- Email Input -->
        <div class="form-group">
            <label for="name">nama</label>
            <input type="name" class="form-control" name="nama" id="nama" value="{{$minuman->nama}}" >
        </div>

        <!-- Password Input -->
        <div class="form-group">
            <label for="text">merk</label>
            <input type="text" class="form-control" name="merk" id="merk" value="{{$minuman->merk}}" >
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label for="text">harga</label>
            <textarea class="form-control" name="harga" id="harga" rows="3" placeholder="Enter your message">{{$minuman->harga}}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection