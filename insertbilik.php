<?php
include("config.php");
include("login.php");
include("session.php");
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect($serverdb, $userdb, $passdb, $db);
// To protect MySQL injection for Security purpose
$namabarang = $_POST['namabarang'];
$namapelapor = $_POST['namapelapor'];
$kelas = $_POST['kelas'];
$date = date("d/m/Y");
$namabarang = mysqli_real_escape_string($connection, $namabarang);
$namapelapor = mysqli_real_escape_string($connection, $namapelapor);
$kelas = mysqli_real_escape_string($connection, $kelas);
$date = mysqli_real_escape_string($connection, $date);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection, "INSERT INTO bilik (namabarang, namapelapor, kelas, tanggal, konfirmasi) VALUES ('$namabarang', '$namapelapor', '$kelas', '$date', '0')");
if($query)
{
	header("Location: bilik.php");
}
mysqli_close($connection);
?>