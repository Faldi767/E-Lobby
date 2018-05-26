<?php
include("config.php");
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect($serverdb, $userdb, $passdb, $db);
// To protect MySQL injection for Security purpose
$username = $_POST['username'];
$password = $_POST['password'];
$admin = $_POST['admin'];
$namalengkap = $_POST['namalengkap'];
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
$admin = mysqli_real_escape_string($connection, $admin);
$namalengkap = mysqli_real_escape_string($connection, $namalengkap);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection, "INSERT INTO datauser (username, password, admin, namalengkap) VALUES ('$username', '$password', '$admin', '$namalengkap')");
if($query)
{
	header("Location: adminmenu.php");
}
mysqli_close($connection);
?>