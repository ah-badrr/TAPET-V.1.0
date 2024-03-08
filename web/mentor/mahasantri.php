<?php
require "../config.php";
$id = $_GET['id'];
$query1 = "SELECT user.id AS uid, user.nama AS nama, user.gambar, mahasantri.* FROM mahasantri
INNER JOIN user ON mahasantri.mentor_id = user.id WHERE mahasantri.id = $id";
$query = "SELECT * FROM setoran WHERE mahasantri_id = $id";
$setoran = mysqli_query($connect, $query);
$mahasantri = mysqli_query($connect, $query1);
$mhs = mysqli_fetch_assoc($mahasantri);
$uid = $mhs['uid'];

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
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/735fc517fe.js" crossorigin="anonymous"></script>
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["aktif$uid"])) { ?>
        <div class="container-scroller">
            <?php
            if (isset($_SESSION["edit$uid"])) {
                echo $_SESSION["edit$uid"];
                unset($_SESSION["edit$uid"]);
            } else if (isset($_SESSION["tambah$uid"])) {
                echo $_SESSION["tambah$uid"];
                unset($_SESSION["tambah$uid"]);
            } else if (isset($_SESSION["hapus$id"])) {
                echo $_SESSION["hapus$id"];
                unset($_SESSION["hapus$id"]);
            }
            ?>
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
                                    <div class="pp rounded-circle" style="background-image: url(../img/<?= $mhs['gambar'] ?>);"></div>
                                </div>
                                <div class="profile-name">
                                    <h5 class="mb-0 font-weight-normal"><?= $mhs['nama'] ?></h5>
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
                                        <div class="pps rounded-circle" style="background-image: url(../img/<?= $mhs['gambar'] ?>);"></div>
                                        <p class="mb-0 d-none d-sm-block navbar-profile-name"><?= $mhs['nama'] ?></p>
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
                                        <span style="float: right;">
                                            <a href="mentor.php?id=<?= $mhs['uid'] ?>" class="btn btn-outline-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                            <a href="tambah_setoran.php?id=<?= $mhs['id'] ?>" class="btn btn-outline-success"><i class="fa fa-plus"></i> Tambah</a>
                                        </span>
                                        <h4 class="card-title">Data Setoran <?= $mhs['nama_mhs'] ?></h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th> No </th>
                                                        <th> Tanggal </th>
                                                        <th> Juz </th>
                                                        <th> Halaman </th>
                                                        <th> Nilai </th>
                                                        <th> Status </th>
                                                        <th> Keterangan </th>
                                                        <th> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($setoran as $str) {
                                                        $date = date_create($str['tanggal']);
                                                    ?>
                                                        <tr>
                                                            <td> <?= $no++ ?> </td>
                                                            <td> <?= date_format($date, 'l-d-M-Y') ?> </td>
                                                            <td> <?= $str['juz'] ?> </td>
                                                            <td> <?= $str['halaman'] ?> </td>
                                                            <td> <?= $str['nilai'] ?> </td>
                                                            <td> <?= $str['nilai'] <= 75 ? 'ulang' : 'lanjut' ?> </td>
                                                            <td> <?= strlen($str['keterangan']) >= 50 ? substr($str['keterangan'], 0, 50) . " ..." : $str['keterangan'] ?> </td>
                                                            <td style="text-align: right;">
                                                                <a href="../detail/detail_setoran.php?id=<?= $str['id'] ?>" class="btn btn-outline-primary"><i class="fa fa-eye"></i> Detail</a>
                                                                <a href="edit_setoran.php?id=<?= $str['id'] ?>" class="btn btn-outline-warning"><i class="fa fa-pencil"></i> Edit</a>
                                                                <a href="hapus_setoran.php?id=<?= $str['id'] ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
