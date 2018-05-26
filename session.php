<?php
include("config.php");
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect($serverdb, $userdb, $passdb, $db);
if(isset($_SESSION['login_user'])) {
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($connection, "select * from datauser where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];
$level = $row['admin'];
$namalengkap = $row['namalengkap'];
}
else {
mysqli_close($connection); // Closing Connection
}
?>