<?php
include("config.php");
include("login.php");
include("session.php");
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect($serverdb, $userdb, $passdb, $db);
// To protect MySQL injection for Security purpose
$namasiswa = $_POST['namasiswa'];
$namapelapor = $_POST['namapelapor'];
$kelas = $_POST['kelas'];
$keterangan = $_POST['keterangan'];
$namasiswa = mysqli_real_escape_string($connection, $namasiswa);
$namapelapor = mysqli_real_escape_string($connection, $namapelapor);
$kelas = mysqli_real_escape_string($connection, $kelas);
$keterangan = mysqli_real_escape_string($connection, $keterangan);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection, "INSERT INTO surat (namasiswa, namapelapor, kelas, keterangan, arsip) VALUES ('$namasiswa', '$namapelapor', '$kelas', '$keterangan', '0')");
if($query)
{
	header("Location: suratizin.php");
}
mysqli_close($connection);
?>