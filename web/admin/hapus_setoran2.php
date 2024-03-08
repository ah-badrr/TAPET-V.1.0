<?php

require "../config.php";
$id = $_GET["id"];
$ide = $_GET["ide"];


$query = "DELETE FROM setoran WHERE id=$id";

mysqli_query($connect, $query);
session_start();
$_SESSION["hs"] = "";
header("location: admin.php?id=$ide");
