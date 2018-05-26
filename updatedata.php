<?php
include("config.php");
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect($serverdb, $userdb, $passdb, $db);
// To protect MySQL injection for Security purpose
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$id = $_GET['id'];
$nama = mysqli_real_escape_string($connection, $nama);
$nip = mysqli_real_escape_string($connection, $nip);
$telp = mysqli_real_escape_string($connection, $telp);
$alamat = mysqli_real_escape_string($connection, $alamat);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection, "UPDATE dataguru SET nama='$nama', nip='$nip', telp='$telp', alamat='$alamat' WHERE id='$id'");
if($query)
{
	header("Location: dataguru.php");
}
mysqli_close($connection);
?>