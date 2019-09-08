<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Financeiro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins-->
  <link rel="stylesheet" href="/css/_all-skins.min.css">
  
  <link href="/css/chosen.css" rel="stylesheet">
  
  <link href="/css/bootstrap-chosen.css" rel="stylesheet">
  
  <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">

  <!-- jQuery 3 -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="/js/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="/js/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/js/demo.js"></script>

  <script src="/js/jquery.maskedinput.js"></script>

  <script src="/js/chosen.jquery.js"></script>

  <script src="/js/jquery.dataTables.min.js"></script>

  <script src="/js/dataTables.bootstrap.min.js"></script>
  
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <!-- Full Width Column -->
  <div class="content-wrapper">
  	<div class="container-fluid">
      <?php date_default_timezone_set('America/Sao_Paulo'); ?>
     	@yield('conteudo')
	  </div>
  </div>
   <!-- /.content-wrapper -->
   <footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 0.0.1
        </div>
        <strong>Copyright &copy; 2018 <a href="yurineves92@gmail.com">Yuri Neves</a>.</strong> All rights
        reserved.
      </div>
      <!-- /.container -->
    </footer>
</div>

</body>
</html>
