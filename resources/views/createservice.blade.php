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
            
            <h2 class="mb-4">Create A Service</h2>
    <!-- Add this code inside the <div id="content" class="p-4 p-md-5"> section -->

            <form action="process_registration.php" method="post" enctype="multipart/form-data">
                
              <div class="col form-group">
                <label >Title:</label>
                 <input class="form-control" type="text" id="title" name="title" required><br><br>

              </div>
              <div  class="col form-group">
                <!-- Bootstrap grid structure to create a layout -->
                <label >Description:</label>
                
                <textarea  class="form-control"  id="summernote"></textarea>            
              </div>
             
              <div class="col form-group">
                <label >Upload Picture:</label>
                <input type="file" class="form-control" name="file" id="file"  accept="image/*" required><br><br>
              </div>
              <div class="d-flex justify-content-end">
                <input class="btn btn-primary" type="submit" value="Add">
              </div>
            </form>

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
    


