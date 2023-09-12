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
    <div class="row">
       
        <div class="col-md-9">
            <h1>Articles List</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</Title></th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ $article['title'] }}</td>
                        <td>{{ $article['content'] }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('editArticle', ['title' => $article['title']]) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('Users', ['content' => $article['title']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
