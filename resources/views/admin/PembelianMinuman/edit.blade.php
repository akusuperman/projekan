@extends('layout.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="container mt-1">
    <h2>Edit Event</h2>
    <form>
        <!-- Text Input -->
        <div class="form-group">
            <label for="name">ID</label>
            <input type="text" class="form-control" id="name" value="{{$event->nama_event}}" placeholder="Enter your name" required>
        </div>

        <!-- Email Input -->
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
        </div>

        <!-- Password Input -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" required>
        </div>

        <!-- Textarea
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="3" placeholder="Enter your message"></textarea>
        </div> -->

        <!-- Select Dropdown -->
        <div class="form-group">
            <label for="exampleSelect">Select an option</label>
            <select class="form-control" id="exampleSelect">
                <option>Select...</option>
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
            </select>
        </div>

        <!-- Checkbox
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Check me out
            </label>
        </div> -->

        <!-- Radio Buttons
        <div class="form-group">
            <label>Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div> -->

        <!-- File Input
        <div class="form-group">
            <label for="fileUpload">File upload</label>
            <input type="file" class="form-control-file" id="fileUpload">
        </div> -->

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