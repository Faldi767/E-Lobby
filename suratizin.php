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
	<link href="css/dashboard.css" rel="stylesheet">
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
			<a class="navbar-brand" href="index.php">E-Lobby</a>
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
			echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Surat Izin</a></li>';
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
<div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
		  <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
		<?php
			if(isset($_SESSION['login_user'])){
			if($level == 1)
			{
            echo '<li><a href="" data-toggle="modal" data-target="#modalform"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Tambah Surat</a></li>';
			echo '<li><a href="?mode=konfirmasi"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Konfirmasi Surat</a></li>';
			echo '<li><a href="?mode=arsip"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Arsip Surat</a></li>';
			}
		   }
			?>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Surat Izin</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th align="center" style="vertical-align:top">No</th>
                  <th align="center" style="vertical-align:top">Nama Siswa</th>
				  <th align="center" style="vertical-align:top">Nama Pelapor</th>
                  <th align="center" style="vertical-align:top">Kelas</th>
				  <th align="center" style="vertical-align:top">Keterangan</th>
				  <?php
				  if(!isset($_GET["mode"]))
				  {
				  }
				  elseif($_GET["mode"] == "konfirmasi")
				  {
					echo "<th align='center' style='vertical-align:top'>Action</th>";
				  }
				  ?>
                </tr>
              </thead>
              <tbody>
                <?php
				$connection = mysqli_connect($serverdb, $userdb, $passdb, $db);
				$i = 1;
				if(!isset($_GET["srch-term"]))
				{
					if(!isset($_GET["mode"]))
					{
					$query = mysqli_query($connection, "SELECT * FROM surat WHERE arsip='0'");
					if (mysqli_num_rows($query) > 0) {
					while($row = mysqli_fetch_assoc($query)) {
					echo "<tr>";
					echo "<td>";
					echo $i;
					echo "</td>";
					echo "<td>";
					echo $row['namasiswa'];
					echo "</td>";
					echo "<td>";
					echo $row['namapelapor'];
					echo "</td>";
					echo "<td>";
					echo $row['kelas'];
					echo "</td>";
					echo "<td>";
					echo $row['keterangan'];
					echo "</td>";
					echo "</tr>";
					$i++;
					}
					} else {
					echo "<tr>";
					echo "<td colspan='7'>";
					echo "Tidak Ada Data Ditemukan";
					echo "</td>";
					echo "</tr>";
				}
					}
					elseif($_GET["mode"] == "konfirmasi")
					{
					$query = mysqli_query($connection, "SELECT * FROM surat WHERE arsip='0'");
					if (mysqli_num_rows($query) > 0) {
					while($row = mysqli_fetch_assoc($query)) {
					echo "<tr>";
					echo "<td>";
					echo $i;
					echo "</td>";
					echo "<td>";
					echo $row['namasiswa'];
					echo "</td>";
					echo "<td>";
					echo $row['namapelapor'];
					echo "</td>";
					echo "<td>";
					echo $row['kelas'];
					echo "</td>";
					echo "<td>";
					echo $row['keterangan'];
					echo "</td>";
					echo "<td>";
					echo '<a href="" data-toggle="modal" data-target="#konfirmasi'.$row["id"].'">Konfirmasi</a>';
					echo "</td>";
					echo "</tr>";
					echo '<div class="modal fade" id="konfirmasi'.$row["id"].'" tabindex="-1" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true">';
					echo '<div class="modal-dialog">';
					echo '<div class="modal-content">';
					echo '<div class="modal-header">';
					echo '<button type="button" class="close" data-dismiss="modal">';
                    echo '<span aria-hidden="true">&times;</span>';
                    echo '<span class="sr-only">Close</span>';
					echo '</button>';
					echo '<h4 class="modal-title" id="myModalLabel">';
                    echo "Konfirmasi";
					echo "</h4>";
					echo "</div>";
					echo '<div class="modal-body">';
					echo '<form role="form" method="post" action="konfirmasisurat.php?id='.$row["id"].'">'; 
					echo '<h6>Konfirmasi bahwa surat telah dikirim oleh siswa yang bersangkutan</h6>';
					echo '</div>';
					echo '<div class="modal-footer">';
					echo '<input name="delete" type="submit" class="btn btn-primary" value="Konfirmasi">';
					echo '</form>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					}
					} else {
					echo "<tr>";
					echo "<td colspan='7'>";
					echo "Tidak Ada Data Ditemukan";
					echo "</td>";
					echo "</tr>";
				}
					}
					elseif($_GET["mode"] == "arsip")
					{
					$query = mysqli_query($connection, "SELECT * FROM surat WHERE arsip='1'");
					if (mysqli_num_rows($query) > 0) {
					while($row = mysqli_fetch_assoc($query)) {
					echo "<tr>";
					echo "<td>";
					echo $i;
					echo "</td>";
					echo "<td>";
					echo $row['namasiswa'];
					echo "</td>";
					echo "<td>";
					echo $row['namapelapor'];
					echo "</td>";
					echo "<td>";
					echo $row['kelas'];
					echo "</td>";
					echo "<td>";
					echo $row['keterangan'];
					echo "</td>";
					echo "</tr>";
					$i++;
					}
					} else {
					echo "<tr>";
					echo "<td colspan='7'>";
					echo "Tidak Ada Data Ditemukan";
					echo "</td>";
					echo "</tr>";
				}
					}
				} else {
				$searchnama = $_GET["srch-term"];
				$searchquery = mysqli_query($connection, "SELECT * FROM surat WHERE namasiswa LIKE '%$searchnama%'");
				if (mysqli_num_rows($searchquery) > 0) {
				while($row = mysqli_fetch_assoc($searchquery)) {
					echo "<tr>";
					echo "<td>";
					echo $i;
					echo "</td>";
					echo "<td>";
					echo $row['namasiswa'];
					echo "</td>";
					echo "<td>";
					echo $row['namapelapor'];
					echo "</td>";
					echo "<td>";
					echo $row['kelas'];
					echo "</td>";
					echo "<td>";
					echo $row['keterangan'];
					echo "</td>";
					echo "</tr>";
					$i++;
				}
				} else {
					echo "<tr>";
					echo "<td colspan='6'>";
					echo "Tidak Ada Data Ditemukan";
					echo "</td>";
					echo "</tr>";
				}
				}
				?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
<div class="modal fade" id="modalform" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Tambah Data
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <form role="form" method="post" action="insertsurat.php">
                  <div class="form-group">
                      <input name="namasiswa" type="text" class="form-control"
                      id="namasiswa" placeholder="Nama Siswa" required/>
                  </div>
                  <div class="form-group">
                      <input name="namapelapor" type="text" class="form-control"
                          id="namapelapor" placeholder="Nama Pelapor" required/>
                  </div>
				  <div class="form-group">
                      <input name="kelas" type="text" class="form-control"
                          id="kelas" placeholder="Kelas" required/>
                  </div>
					<div class="form-group">
                      <input name="keterangan" type="text" class="form-control"
                          id="keterangan" placeholder="Keterangan" required/>
                  </div>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <input name="insert" type="submit" class="btn btn-primary" value="Insert Surat">
				</form>
            </div>
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