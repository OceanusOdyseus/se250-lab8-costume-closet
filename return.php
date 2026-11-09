<?php
$conn = mysqli_connect("localhost", "root", "", "costume_closet");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
$id = (int)$_GET["id"];
$conn->query("UPDATE loans SET returned = 1 WHERE id = $id");
header("Location: show.php");
?>