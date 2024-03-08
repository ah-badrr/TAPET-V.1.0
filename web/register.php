<?php
require "config.php";
session_start();
if (isset($_POST['daftar'])) {
  $name = $_POST["nama"];
  $username = $_POST["user"];
  $password1 = $_POST["pass"];
  $sql = "SELECT * FROM user WHERE username='$username'";
  $result = mysqli_query($connect, $sql) or die("Query Failed.");
  $row = mysqli_fetch_assoc($result);
  $count = mysqli_num_rows($result);
  if ($count > 0) {
    echo "<script>alert('Goblok lu mao aje disamaian')</script>";
  } else {
    $sql1 = "INSERT INTO user (nama,username,password,role) VALUES ('$name','$username','$password1','m')";
    mysqli_query($connect, $sql1);
    header("Location: login.php");
  };
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tapet</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../img/tapet.jpg" />
  <!-- Font Awessome -->
  <script src="https://kit.fontawesome.com/735fc517fe.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <a href="landing/index.php" class="btn btn-warning float-right"><i class="fa fa-arrow-left"></i> back</a>
              <h3 class="card-title text-left mb-3">Register</h3>
              <form method="POST">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control p_input" name="nama">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control p_input" name="user">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control p_input" name="pass">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input"> Remember me </label>
                  </div>
                  <a href="#" class="forgot-pass">Forgot password</a>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn" name="daftar">Register</button>
                </div>
                <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login </a></p>
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/misc.js"></script>
  <script src="../assets/js/settings.js"></script>
  <script src="../assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>