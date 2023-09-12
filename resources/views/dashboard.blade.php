@extends('layout')

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
  
    <div>
        <h2 class="mb-4">Dashboard</h2>
        
        <div class="col-md-12">
        <div class="row" style="margin-bottom: 20px;">
          <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">Manage system users <a href="#">here</a>.</p>
                </div>
            </div>
          </div>
        
    
            <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Services</h5>
                    <p class="card-text">Manage system services <a href="#">here</a>.</p>
                </div>
            </div>
            </div>
        </div>
         <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Articles</h5>
                    <p class="card-text">Manage system articles <a href="#">here</a>.</p>
                </div>
            </div>
        </div>
    
        <div   class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Settings</h5>
                    <p class="card-text">Manage system settings <a href="#">here</a>.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>


</div>
@endsection
