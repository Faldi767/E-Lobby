<?php
include("config.php");
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect($serverdb, $userdb, $passdb, $db);
// To protect MySQL injection for Security purpose
$id = $_GET['id'];
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection, "UPDATE surat SET arsip='1' WHERE id='$id'");
if($query)
{
	header("Location: suratizin.php");
}
mysqli_close($connection);
?>