@extends('user.layouts.login')

@section('content')
<div id="jumbotron">
    <div class="container">
      <div class="row d-flex"> 
        <div class="col-md-7 text-white text-center align-self-center">
          <p class="mb-4">Sistem Informasi Akademik</p>
          <hr>
          <p>UNIVERSITAS PERDANA</p>
        </div>
        <div class="col-md-5">
          <div class="login">
            <h3 class="text-center">Login SIAKD</h3>
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
            <form class="user" action="{{route('login2')}}" method="post">
            @csrf
              <div class="form-group">
                <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nim/Email">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- end jumbotron -->
@endsection