@extends('layout.auth')
@section('conteudo')
<div class="login-box">
  <div class="login-logo">
    <a><b>Personal</b>Finances</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Acesso ao sistema</p>
    @if ($message = Session::get('alert-danger'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <form action="/authenticate" method="POST">
      {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="/register" class="text-center">Register</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection