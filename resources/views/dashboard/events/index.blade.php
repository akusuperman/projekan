@extends('layout.dashboard')
@section ('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Events</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <a href="/dashboard/events/create" class="btn btn-primary mb-2" role="button">Tambah Event +</a>

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tanggal / Jam</th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($events as $event)
                  <tr>
                    <td>{{$event->id}}</td>
                    <td>{{$event->nama_event}}</td>
                    <td>{{$event->tanggal_event}}</td>
                    <td>{{$event->deskripsi}}</td>
                    <td>{{$event->lokasi}}</td>
                    <td><img style="width:200px;" src="@if ($event->file_foto) {{ asset('storage/'.$event->file_foto) }} @endif" >
                    </td>
          
                    <td>
                    <a href="/dashboard/events/{{$event->id}}/edit" class="btn btn-info mb-2" role="button">Edit</a>
                    <form action="/dashboard/events/{{ $event ->id }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
        Delete
    </button>
</form>
                    </td>
                  </tr>
                 @endforeach
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   @endsection