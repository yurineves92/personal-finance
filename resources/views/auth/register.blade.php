@extends('layout.auth')
@section('conteudo')
<div class="login-box">
  <div class="login-logo">
    <a><b>Personal</b>Finances</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Registrar no Sistema</p>

    <form action="/authenticate" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nome" name="nome">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Senha" name="password">
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

    <a href="/login" class="text-center">Login</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection