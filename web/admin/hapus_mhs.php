<?php

// require "../config.php";
// $id = $_GET["id"];
// $ide = $_GET["ide"];
// 
// 
// $query = "DELETE FROM mahasantri WHERE id = $id";
// 
// mysqli_query($connect, "$query");
// 
// header("location: admin.php?id=$ide");

?>
<?php

require "../config.php";

$id = $_GET["id"];
$ide = $_GET["ide"];

$pstor = mysqli_query($connect, "SELECT * FROM setoran WHERE mahasantri_id = $id");
session_start();
if (mysqli_num_rows($pstor) == 0) {
    $query = "DELETE FROM mahasantri WHERE id = $id";
    mysqli_query($connect, $query);
    session_start();
    $_SESSION["hms"] = "berm";
    header("location: admin.php?id=$ide");
} else {
    session_start();
    $_SESSION["hmsg"] = "galm";
    header("location: admin.php?id=$ide");
}
