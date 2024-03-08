<?php
require "../config.php";
$id = $_GET['id'];
$query = "SELECT user.gambar, user.nama, user.id AS uid, mahasantri.nama_mhs, mahasantri.id AS mid, setoran.* FROM setoran
INNER JOIN mahasantri ON setoran.mahasantri_id = mahasantri.id 
INNER JOIN user ON mahasantri.mentor_id = user.id WHERE setoran.id = $id";
$str = mysqli_fetch_assoc(mysqli_query($connect, $query));
$uid = $str['uid'];

$date = $_POST['date'];
$juz = $_POST['juz'];
$hal = $_POST['hal'];
$nilai = $_POST['nilai'];
$ket = htmlspecialchars($_POST['ket']);
$mid = $str['mid'];

if (isset($_POST['simpan'])) {
    $query = "UPDATE setoran SET tanggal = '$date', juz = '$juz', halaman = '$hal', nilai = '$nilai', keterangan = '$ket' WHERE id = '$id' ";
    mysqli_query($connect, "$query");
    session_start();
    $_SESSION["edit$uid"] = "
    <script>swal({
title: 'Good job!',
text: 'Edit data berhasil!',
icon: 'success',
button: 'ok',
});</script>";
    // echo "<script>document.location.href='mahasantri.php?id=$mid'</script>";
    header("Location: mahasantri.php?id=$mid");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TAPET</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    <!-- Font Awessome -->
    <script src="https://kit.fontawesome.com/735fc517fe.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["aktif$uid"])) { ?>
        <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                    <a class="sidebar-brand brand-logo text-light text-decoration-none font-weight-bold" href="mentor.php?id=<?= $uid ?>" style="font-size:2rem;">TAPET</a>
                    <a class="sidebar-brand brand-logo-mini font-weight-bold text-decoration-none text-light pl-4 " href="mentor.php?id=<?= $uid ?>" style="font-size:2rem;">T</a>
                </div>
                <ul class="nav">
                    <li class="nav-item profile">
                        <div class="profile-desc">
                            <div class="profile-pic">
                                <div class="count-indicator">
                                    <div class="pp rounded-circle" style="background-image: url(../img/<?= $str['gambar'] ?>);"></div>
                                </div>
                                <div class="profile-name">
                                    <h5 class="mb-0 font-weight-normal"><?= $str['nama'] ?></h5>
                                    <span>Mentor</span>
                                </div>
                            </div>
                            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                                <a href="edit_mentor.php?id=<?= $uid ?>" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </li>
                    <li class="nav-item nav-category">
                        <span class="nav-link">Navigation</span>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="mentor.php?id=<?= $uid ?>">
                            <span class="menu-icon">
                                <i class="mdi mdi-speedometer"></i>
                            </span>
                            <span class="menu-title">Home</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_navbar.html -->
                <nav class="navbar p-0 fixed-top d-flex flex-row">
                    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo-mini" href="mentor.php?id=<?= $uid ?>"><h1 class="text-light">T</h1></a>
                    </div>
                    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                            <span class="mdi mdi-menu"></span>
                        </button>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item dropdown">
                                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                    <div class="navbar-profile">
                                        <div class="pps rounded-circle" style="background-image: url(../img/<?= $str['gambar'] ?>);"></div>
                                        <p class="mb-0 d-none d-sm-block navbar-profile-name"><?= $str['nama'] ?></p>
                                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                    <h6 class="p-3 mb-0">Profile</h6>
                                    <div class="dropdown-divider"></div>
                                    <a href="edit_mentor.php?id=<?= $uid ?>" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-settings text-success"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1">Settings</p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form class="dropdown-item preview-item" action="" method="POST">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-logout text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content pl-0">
                                            <button type="submit" onclick="return confirm('Apakah anda yakin akan keluar ?')" name="logout" class="btn preview-subject mb-1">Log out</button>
                                        </div>
                                    </form>
                                    <div class="dropdown-divider"></div>
                                    <p class="p-3 mb-0 text-center">Advanced settings</p>
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                            <span class="mdi mdi-format-line-spacing"></span>
                        </button>
                    </div>
                </nav>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row ">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="mahasantri.php?id=<?= $str['mid'] ?>" class="btn btn-outline-warning" style="float: right;"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        <h4 class="card-title">Edit Data Setoran <?= $str['nama_mhs'] ?></h4>
                                        <!-- <p class="card-description"> Basic form elements </p> -->
                                        <form class="forms-sample" method="POST">
                                            <div class="form-group">
                                                <label for="date">Tanggal</label>
                                                <input required value="<?= $str['tanggal'] ?>" type="date" class="form-control" name="date" id="date">
                                            </div>
                                            <div class="form-group">
                                                <label for="juz">Juz</label>
                                                <input required value="<?= $str['juz'] ?>" type="number" class="form-control" name="juz" id="juz" placeholder="Juz">
                                            </div>
                                            <div class="form-group">
                                                <label for="hal">Halaman</label>
                                                <input required value="<?= $str['halaman'] ?>" type="number" class="form-control" name="hal" id="hal" placeholder="Halaman">
                                            </div>
                                            <div class="form-group">
                                                <label for="nilai">Nilai</label>
                                                <input required value="<?= $str['nilai'] ?>" type="number" class="form-control" name="nilai" id="nilai" placeholder="Nilai">
                                            </div>
                                            <div class="form-group">
                                                <label for="ket">Keterangan</label>
                                                <textarea required class="form-control" name="ket" id="ket" rows="2" placeholder="Keterangan"><?= $str['keterangan'] ?></textarea>
                                            </div>
                                            <button type="submit" name="simpan" class="btn btn-outline-primary mr-2"><i class="fa fa-paper-plane"></i> Submit</button>
                                            <a href="mahasantri.php?id=<?= $str['mid'] ?>" class="btn btn-outline-warning">Cancel</a>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- content-wrapper ends -->
                        <!-- partial:partials/_footer.html -->
                        <footer class="footer">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © tahfidzpetik.com
                                    2024</span>
                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                                        templates</a> from Bootstrapdash.com</span>
                            </div>
                        </footer>
                        <!-- partial -->
                    </div>
                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
        </div>
    <?php } else {
        header('location:../login.php');
    }
    ?>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>

<?php
if (isset($_POST['logout'])) {
    unset($_SESSION["aktif$uid"]);
    echo "<script>document.location.href = '../login.php'</script>";
}
