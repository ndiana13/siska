<?php  
include 'config.php';
 
session_start();
 
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row['level']=='1'){
          $_SESSION['username'] = $username;
          $_SESSION['nama'] = $row['nama_lengkap'];
          $_SESSION['foto'] = $row['foto'];
          $_SESSION['level'] = "1";
          header("Location: ../jurusan/index.php");
        }else if($row['level']=='2'){
          $_SESSION['username'] = $username;
          $_SESSION['nama'] = $row['nama_lengkap'];
          $_SESSION['foto'] = $row['foto'];
          $_SESSION['level'] = "2";
          header("Location: ../kajur/index.php");
        }else if($row['level']=='3'){
          $_SESSION['username'] = $username;
          $_SESSION['nama'] = $row['nama_lengkap'];
          $_SESSION['foto'] = $row['foto'];
          $_SESSION['level'] = "3";
          header("Location: ../baak/index.php");
        }else if($row['level']=='4'){
          $_SESSION['username'] = $username;
          $_SESSION['nama'] = $row['nama_lengkap'];
          $_SESSION['foto'] = $row['foto'];
          $_SESSION['level'] = "4";
          header("Location: ../umum/index.php");
        }else if($row['level']=='5'){
          $_SESSION['username'] = $username;
          $_SESSION['nama'] = $row['nama_lengkap'];
          $_SESSION['foto'] = $row['foto'];
          $_SESSION['level'] = "5";
          header("Location: ../wadir/index.php");
        }else if($row['level']=='6'){
          $_SESSION['username'] = $username;
          $_SESSION['nama'] = $row['nama_lengkap'];
          $_SESSION['foto'] = $row['foto'];
          $_SESSION['level'] = "6";
          header("Location: ../direktur/index.php");
        }    
    }else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISKA | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-secondary">
    <div class="card-header text-center">
      <a href="login.php" class="h1"><img src="../AdminLTE/dist/img/pnc.png" style="width: 50px;"></a><br>
      <h1><b>S I S K A</b></h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in untuk masuk SISKA.</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="position-relative">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Sign In</button>     
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
