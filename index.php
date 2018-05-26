<?php
include("login.php");
include("session.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Lobby SMKN 5 Malang</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/loginmodal.css" rel="stylesheet">
</head>
<body>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">E-Lobby</a>
			</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="dataguru.php"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Data Guru/Karyawan</a></li>
			<li><a href="about.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About</a></li>
			<li><a href="contact.php"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Contact</a></li>
			<?php
			if(isset($_SESSION['login_user'])){
			echo '<li><a href="bilik.php"><span class="glyphicon glyphicon-oil" aria-hidden="true"></span> Bilik Kejujuran</a></li>';
			echo '<li><a href="datatamu.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Data Tamu</a></li>';
			echo '<li><a href="suratizin.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Surat Izin</a></li>';
			echo '<li class="dropdown">';
			echo	'<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>';
			echo	'<ul class="dropdown-menu">';
			echo		'<li><a>'.$namalengkap.'</a></li>';
			echo		'<li role="separator" class="divider"></li>';
			if($level == 1) {
			echo		'<li><a href="adminmenu.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Admin Menu</a></li>';
			}
			echo		'<li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a></li>';
			echo	'</ul>';
			echo '</li>';
			}
			else
			{
			echo '<li><a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Login</a></li>';
			}
			?>
		</ul>
		</div>
		</div>
	</nav>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img style="width:100%;" src="http://placehold.it/1200x315" alt="...">
      <div class="carousel-caption">
          <h3>Caption Text</h3>
      </div>
    </div>
    <div class="item">
      <img style="width:100%;" src="http://placehold.it/1200x315" alt="...">
      <div class="carousel-caption">
          <h3>Caption Text</h3>
      </div>
    </div>
    <div class="item">
      <img style="width:100%;" src="http://placehold.it/1200x315" alt="...">
      <div class="carousel-caption">
          <h3>Caption Text</h3>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->
<div class="container">
<div class="row">
            <div class="col-lg-12">
			<?php
			if($error == 1) {
			echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> Invalid Username or Password.</div>';
			}
			?>
                <h4 class="page-header">
                    Selamat Datang di E-Lobby
                </h4>
            </div>
			<div class="col-lg-12">
			Masih Dalam Pengerjaan Coy !! :)) 
			</div>
        </div>
		</div>
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form method="post">
					<input type="text" name="username" placeholder="Username" required>
					<input type="password" name="password" placeholder="Password" required>
					<input type="submit" name="submit" class="login loginmodal-submit" value="Login">
				  </form>
				</div>
			</div>
		  </div>
</body>
</html>