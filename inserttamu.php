<?php
include("config.php");
include("login.php");
include("session.php");
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect($serverdb, $userdb, $passdb, $db);
// To protect MySQL injection for Security purpose
$nama = $_POST['nama'];
$instansi = $_POST['instansi'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$keperluan = $_POST['keperluan'];
$nama = mysqli_real_escape_string($connection, $nama);
$instansi = mysqli_real_escape_string($connection, $instansi);
$alamat = mysqli_real_escape_string($connection, $alamat);
$telp = mysqli_real_escape_string($connection, $telp);
$keperluan = mysqli_real_escape_string($connection, $keperluan);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection, "INSERT INTO datatamu (nama, instansi, alamat, telp, keperluan, pengisi) VALUES ('$nama', '$instansi', '$alamat', '$telp', '$keperluan', '$namalengkap')");
if($query)
{
	header("Location: datatamu.php");
}
mysqli_close($connection);
?>