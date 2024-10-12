@extends('layout.dashboard')
@section ('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Booking</h1>
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
          <a href="/dashboard/booking/create" class="btn btn-primary mb-2" role="button">Tambah Booking +</a>

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    
                    <th>Tanggal Booking</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Nama Pemesan</th>
                    <th>Nama Lapangan</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($bookings as $booking)
                  <tr>
                    <td>{{$booking->Tanggal_booking}}</td>
                    <td>{{$booking->jam_masuk}}</td>
                    <td>{{$booking->jam_keluar}}</td>
                    <td>{{$booking->user_nama}}</td>
                    <td>{{$booking->lapangan_nama}}</td>
                    
                    
                    
          
                    <td>
                    <a href="/dashboard/booking/{{$booking->id}}/edit" class="btn btn-info mb-2" role="button">Edit</a>
                    <form action="/dashboard/booking/{{ $booking ->id }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Are you sure you want to delete this item?');">
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