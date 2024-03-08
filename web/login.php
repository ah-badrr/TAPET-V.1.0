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
  <link rel="shortcut icon" href="../assets/images/favicon.png" />
  <!-- sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
              <h3 class="card-title text-left mb-3">Login</h3>
              <form method="POST">
                <div class="form-group">
                  <label>Username *</label>
                  <input type="text" required class="form-control p_input" name="username">
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input type="password" required class="form-control p_input" name="pass">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input"> Remember me </label>
                  </div>
                  <a href="#" class="forgot-pass">Forgot password</a>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn" name="login">Login</button>
                </div>
                <p class="sign-up text-center">Already have an Account?<a href="register.php"> Register </a></p>
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
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/misc.js"></script>
  <script src="../assets/js/settings.js"></script>
  <script src="../assets/js/todolist.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <!-- endinject -->

</body>

</html>
<?php require "config.php";
if (isset($_POST["login"])) {
  $username = $_POST['username'];
  $password = $_POST['pass'];
  $valid = mysqli_query($connect, "SELECT * FROM user");
  $valide = mysqli_fetch_assoc($valid);
  $validate = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
  $user = mysqli_fetch_assoc($validate);
  $id = $user['id'];
  if ($user && $user["role"] == 'm') {
    session_start();
    $_SESSION["login$id"] = "
    <script>swal({
  title: 'Good job!',
  text: 'Login berhasil!',
  icon: 'success',
  button: 'ok',
});</script>";
    // header("Location: mentor/mentor.php?id=$id");
    echo "<script>document.location.href='mentor/mentor.php?id=$id'</script>";
  } elseif ($user && $user["role"] == 'a') {
    session_start();
    $_SESSION["hasil"] = "hasil";
    echo "<script>document.location.href='admin/admin.php?id=$id'</script>";
  } else {
    echo "<script>swal({
      title: 'Maaf!',
      text: 'Username atau Password salah!',
      icon: 'warning',
      button: 'ok',
    });</script>";
    // echo "<script>alert('username atau password salah')</script>";
  }
} ?>