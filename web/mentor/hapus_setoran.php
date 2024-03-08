<?php
require "../config.php";
$id = $_GET['id'];
$query = "SELECT mahasantri.id AS mid, setoran.* FROM setoran
INNER JOIN mahasantri ON setoran.mahasantri_id = mahasantri.id WHERE setoran.id = $id";
$str = mysqli_fetch_assoc(mysqli_query($connect, $query));

$delete = "DELETE FROM setoran WHERE id = $id";
$mid = $str['mid'];
mysqli_query($connect, "$delete");
session_start();
$_SESSION["hapus$mid"] = "
    <script>swal({
title: 'Good job!',
text: 'Hapus data berhasil!',
icon: 'success',
button: 'ok',
});</script>";
header("location:mahasantri.php?id=$mid");
// session_start();
// $_SESSION['deleted'] = "Selamat...";
