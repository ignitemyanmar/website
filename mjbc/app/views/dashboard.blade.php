<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>MJBC	| Admin Dashboard</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  {{HTML::style('assets/bootstrap/css/bootstrap.min.css')}}
  {{HTML::style('../../../assets/css/metro.css')}}
  {{HTML::style('assets/font-awesome/css/font-awesome.css')}}
  {{HTML::style('assets/css/style.css')}}
  {{HTML::style('css/font.css')}}
  
  {{HTML::style('assets/font-awesome/css/font-awesome.css')}}
  <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
  <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
  <!-- BEGIN LOGO -->
  <div class="logo">
    <img src="assets/img/logo-big1.png" alt="" /> 
  </div>
  <!-- END LOGO -->
    @yield('content')
  <!-- BEGIN COPYRIGHT -->
  <div class="copyright">
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="assets/js/jquery-1.8.3.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  
  <script src="assets/uniform/jquery.uniform.min.js"></script> 
  <script src="assets/js/jquery.blockui.js"></script>
  <script type="text/javascript" src="assets/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="assets/js/app.js"></script>
  <script>
    jQuery(document).ready(function() {     
      App.initLogin();
    });
  </script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>