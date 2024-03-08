<?php
// koneksi ke database
$host = "localhost";
$user = "root";
$connect = mysqli_connect($host, $user, 'bismillah', 'tapet');
$mahasantri = mysqli_query($connect, "SELECT * FROM mahasantri");
$setoran = mysqli_query($connect, "SELECT * FROM setoran");
$user = mysqli_query($connect, "SELECT * FROM user");
