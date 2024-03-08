<?php

require "../config.php";

$id = $_GET["id"];
$ide = $_GET["ide"];

$pstor = mysqli_query($connect, "SELECT * FROM mahasantri WHERE mentor_id = $id");
session_start();
if (mysqli_num_rows($pstor) == 0) {
    $query = "DELETE FROM user WHERE id=$id";
    mysqli_query($connect, $query);
    session_start();
    $_SESSION["hm"] = "berm";
    header("location: admin.php?id=$ide");
} else {
    session_start();
    $_SESSION["hmg"] = "galm";
    header("location: admin.php?id=$ide");
}
