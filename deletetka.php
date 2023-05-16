<?php
// include database connection file
include_once("koneksi.php");


$id = $_GET['id'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM tka WHERE id=$id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:tabletka.php");
?>