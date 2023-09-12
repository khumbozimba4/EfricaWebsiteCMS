@extends('layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">

<!-- resources/views/users.blade.php -->
@section('content')
<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
  
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-bars"></i>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="#">Users Online</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">My Profile</a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
    <div class="row">
       
        <div class="col-md-9">
            <div class="card" style="background-color: rgb(255, 255, 255)">
                <div class="card-body">
                    <h4 class="card-header mb-4" >edit the User</h4>
                    <!-- Add this code inside the card-body section -->
                    <form action="posteditUser" method="post" enctype="multipart/form-data">
                        <div class="col form-group">
                            <label>Username:</label>
                            <input class="form-control" type="text" id="name" name="name" required>
                        </div>
                        <div class="col form-group">
                            <label>Email:</label>
                            <input class="form-control" type="email" id="email" name="email" required>
                        </div>
                        <div class="col form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password" id="password" accept="image/*" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input class="btn btn-primary" type="submit" value="edit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endsection
