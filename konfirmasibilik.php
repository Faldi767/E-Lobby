<?php
include("config.php");
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect($serverdb, $userdb, $passdb, $db);
// To protect MySQL injection for Security purpose
$namapemilik = $_POST['namapemilik'];
$kelaspemilik = $_POST['kelaspemilik'];
$id = $_GET['id'];
$date = date("d/m/Y");
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection, "UPDATE bilik SET konfirmasi='1', tanggalkembali='$date', namapengambil='$namapemilik', kelaspengambil='$kelaspemilik' WHERE id='$id'");
if($query)
{
	header("Location: bilik.php");
}
mysqli_close($connection);
?>