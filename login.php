<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Log in | Koperasi</title>
    <link href="assets/img/logo.png" rel="shortcut icon">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    html{
      position: relative;
      min-height: 100%;
    }      
      body{
        background:url(assets/images/single_service_01.jpg);
        -webkit-background-size:cover;
        -moz-background-size:cover;
        -o-background-size:cover;
        background-size:cover;
      }
      body > .container{
        margin-top: 60px;
      }
    </style>

  </head>
  <body>
    <div class="container">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> LOGIN KOPERASI</h3>
          </div>
          <div class="panel-body">
          <center>
            <img src="assets/img/logo.png" class="img-circle" alt="Logo" width="120px">
          </center>
          <hr>

          <?php 
          if($_SERVER['REQUEST_METHOD']=='POST'){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $p    = md5($pass);

            if($user =='' && $pass==''){
              ?>
              <div class="alert alert-warning"><b>Warning!</b> Form anda belum lengkap</div>
              <?php
            }else{
              include "koneksi.php";
              $sqlLogin = mysqli_query($konek, "SELECT * FROM admin WHERE username='$user' AND password='$p'");
              $jml = mysqli_num_rows($sqlLogin);
              $d = mysqli_fetch_array($sqlLogin);

              if($jml > 0){
                session_start();
                $_SESSION['login']        = TRUE;
                $_SESSION['idadmin']      = $d['idadmin'];
                $_SESSION['username']     = $d['username'];
                $_SESSION['namalengkap']  = $d['namalengkap'];

                header('location:./index.php');
              }else{
                ?>
                <div class="alert alert-danger"><b>ERROR!</b> Username dan Password and salah!</div>
                <?php
              }
            }
          }
          ?>

          <form action="" method="post" role="form">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Sign In">
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>