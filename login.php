<?php
include("config.php");
session_start(); // Starting Session
$error = 0;
if (isset($_POST['submit'])) {
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect($serverdb, $userdb, $passdb, $db);
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection, "select * from datauser where password='$password' AND username='$username'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username;
}
else
{
$error = 1;
}
mysqli_close($connection); // Closing Connection
}
?>