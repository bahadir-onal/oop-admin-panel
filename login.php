<?php
session_start();
if (isset($_SESSION['admins'])) {
  header("Location:index.php");
  exit;
}
require_once 'netting/class.crud.php';
$db=new crud();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bahadır Önal OOP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <style type="text/css">
  .login-page {

    background: url(dimg/images/bg.jpg) no-repeat center center fixed;
    background-size:cover;
    -webkit-background-size:cover;
    -moz-background-size:cover;
    -o-background-size:cover;
  }

  body {

    overflow: hidden;
  }
</style>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index2.html"><b>Bahadır </b>Önal</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Giriş yapmak için bilgilerinizi girin</p>



      <?php 

      // echo "<pre>";
      // print_r(json_decode($_COOKIE['adminsLogin']));
      // echo "</pre>";

      if (isset($_COOKIE['adminsLogin'])) {
        $login=json_decode($_COOKIE['adminsLogin']);
      }

      if (isset($_POST['admins_login'])) {

        $sonuc=$db->adminsLogin(htmlspecialchars($_POST['admins_username']),htmlspecialchars($_POST['admins_pass']),$_POST['remember_me']);

        if ($sonuc['status']) {

          header("Location:index.php");
          exit;

        } else {?>

         <div class="alert alert-danger">
           Bilgilerinizi kontrol edin...
         </div>

       <?php }
     }

     ?>

     <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" 
        <?php
        if (isset($_COOKIE['adminsLogin'])) {
         echo 'value="'.$login->admins_username.'"';
       } else {

        echo 'placeholder="Kullanıcı Adı"';
      }
      ?>
      name="admins_username">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" 
      <?php
      if (isset($_COOKIE['adminsLogin'])) {
        echo 'value="'.$login->admins_pass.'"';
      } else {

        echo 'placeholder="Şifre Girin"';
      }
      ?>
      name="admins_pass">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
      <div class="col-xs-8">
        <div class="checkbox icheck">
          <label>
            <input type="checkbox" 
            <?php
            if (isset($_COOKIE['adminsLogin'])) {
              echo 'checked';
           } 
          ?>
          name="remember_me"> Beni Hatırla
        </label>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
      <button type="submit" name="admins_login" class="btn btn-primary btn-block btn-flat">Giriş Yap</button>
    </div>
    <!-- /.col -->
  </div>
</form>

  <!--   <div class="social-auth-links text-center">
      <p>- VEYA -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
     
      </div> -->
      <!-- /.social-auth-links -->


    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>
</html>
