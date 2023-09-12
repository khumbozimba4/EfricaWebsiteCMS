<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eFrica Content Management System</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include the template's CSS -->
    <!-- Include the template's JavaScript -->
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">


</head>
<body>
		
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
              <a href="#" class="img logo rounded-circle mb-5" style="background-image: url({{asset("sidebar/images/logo.jpg")}});"></a>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
          <li >
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">User Management</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <a href="{{ route('getUsers') }}">View User</a>
            </li>
            <li>
                <a href="{{ route('adduser') }}">Add User</a>
            </li>
            </ul>
          </li>
          <li >
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Servises Management</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <a href="{{ route('getServices') }}">View Services</a>
            </li>
            <li>
                <a href="{{ route('addservice') }}">Add Service</a>
            </li>
           
            </ul>
          </li>
          <li>
          <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Articles Management</a>
          <ul class="collapse list-unstyled" id="pageSubmenu">
            <li>
              <a href="{{ route('getArticles') }}">View Articles</a>
            </li>
            <li>
                <a href="{{ route('addarticle') }}">Add Article</a>
            </li>
            
          </ul>
          </li>
          <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Settings  Management</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
              <li>
                <a href="{{ route('getSettings') }}">View Settings</a>
              </li>
              <li>
                <a href="{{ route('addsetting') }}">Add Settings</a>
              </li>
              
            </ul>
            </li>
         
        </ul>

        <div class="footer">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <i class="icon-heart" aria-hidden="true"></i> by <a href="https://eFrica.mw" target="_blank">eFrica.mw</a>
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>

      </div>
    </nav>
    @yield('content')
 </div>

 
 @yield('scripts')
<script src="{{asset("assets/js/jquery.min.js")}}"></script>
<script src="{{asset("assets/js/popper.js.js")}}"></script>
<script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/main.js")}}"></script>

</body>

</html>






