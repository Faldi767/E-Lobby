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
			echo '<li><a href="suratizin.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Surat Izin</a></li>';
			echo '<li class="dropdown">';
			echo	'<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>';
			echo	'<ul class="dropdown-menu">';
			echo		'<li><a>'.$namalengkap.'</a></li>';
			echo		'<li role="separator" class="divider"></li>';
			if($level == 1) {
			echo		'<li class="active"><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Admin Menu</a></li>';
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
            echo '<li><a href="" data-toggle="modal" data-target="#modalform"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Tambah User</a></li>';
			echo '<li><a href="?mode=update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit User</a></li>';
			echo '<li><a href="?mode=hapus"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span> Delete User</a></li>';
			echo '<li><a href="logs.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Logs</a></li>';
			}
		   }
			?>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Data User</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th>Nama Lengkap</th>
				  <?php
				  if(!isset($_GET["mode"]))
				  {
				  }
				  elseif(isset($_GET["mode"]))
				  {
					echo "<th>Action</th>";
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
				$query = mysqli_query($connection, "SELECT * FROM datauser ORDER BY username");
				if (mysqli_num_rows($query) > 0) {
				while($row = mysqli_fetch_assoc($query)) {
					if(!isset($_GET["mode"]))
					{
					if($row['admin'] == 1)
					{
						$level = "Admin";
					}
					else
					{
						$level = "Member";
					}
					echo "<tr>";
					echo "<td>";
					echo $i;
					echo "</td>";
					echo "<td>";
					echo $row['username'];
					echo "</td>";
					echo "<td>";
					echo $level;
					echo "</td>";
					echo "<td>";
					echo $row['namalengkap'];
					echo "</td>";
					echo "</tr>";
					$i++;
					}
					elseif($_GET["mode"] == "update")
					{
						if($row['admin'] == 1)
					{
						$level = "Admin";
					}
					else
					{
						$level = "Member";
					}
					echo "<tr>";
					echo "<td>";
					echo $i;
					echo "</td>";
					echo "<td>";
					echo $row['username'];
					echo "</td>";
					echo "<td>";
					echo $level;
					echo "</td>";
					echo "<td>";
					echo $row['namalengkap'];
					echo "</td>";
					echo "<td>";
					echo '<a href="" data-toggle="modal" data-target="#update'.$row["id"].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
					echo "</td>";
					echo "</tr>";
					echo '<div class="modal fade" id="update'.$row["id"].'" tabindex="-1" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true">';
					echo '<div class="modal-dialog">';
					echo '<div class="modal-content">';
					echo '<div class="modal-header">';
					echo '<button type="button" class="close" data-dismiss="modal">';
                    echo '<span aria-hidden="true">&times;</span>';
                    echo '<span class="sr-only">Close</span>';
					echo '</button>';
					echo '<h4 class="modal-title" id="myModalLabel">';
                    echo "Update Data";
					echo "</h4>";
					echo "</div>";
					echo '<div class="modal-body">';
					echo '<form role="form" method="post" action="updateuser.php?id='.$row["id"].'">';
					echo '<div class="form-group">';
                    echo '<input name="usernama" type="text" class="form-control" id="nama" placeholder="Username" value="'.$row["username"].'" required/>';
					echo '</div>';
					echo '<div class="form-group">';
                    echo '<input name="password" type="password" class="form-control" id="nip" placeholder="Password" value="'.$row["password"].'" required/>';
					echo '</div>';
					echo '<div class="form-group">';
					echo '<select class="form-control" name="admin" id="admin">';
					echo '<option value="1">Admin</option>';
					echo '<option value="0">Member</option>';
					echo '</select>';
					echo '<script>'; 
					echo '​document.getElementById("admin").value = "'.$row["admin"].'";​​​​​​​​​​';
					echo '</script>';
					echo '</div>';
					echo '<div class="form-group">';
                    echo '<input name="namalengkap" type="text" class="form-control" id="alamat" placeholder="Nama Lengkap" value="'.$row["namalengkap"].'" required/>';
					echo '</div>';    
					echo '</div>';
					echo '<div class="modal-footer">';
					echo '<input name="update" type="submit" class="btn btn-primary" value="Update Data">';
					echo '</form>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					}
					elseif($_GET["mode"] == "hapus")
					{
					if($row['admin'] == 1)
					{
						$level = "Admin";
					}
					else
					{
						$level = "Member";
					}
					echo "<tr>";
					echo "<td>";
					echo $i;
					echo "</td>";
					echo "<td>";
					echo $row['username'];
					echo "</td>";
					echo "<td>";
					echo $level;
					echo "</td>";
					echo "<td>";
					echo $row['namalengkap'];
					echo "</td>";
					echo "<td>";
					echo '<a href="" data-toggle="modal" data-target="#delete'.$row["id"].'"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></a>';
					echo "</td>";
					echo "</tr>";
					echo '<div class="modal fade" id="delete'.$row["id"].'" tabindex="-1" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true">';
					echo '<div class="modal-dialog">';
					echo '<div class="modal-content">';
					echo '<div class="modal-header">';
					echo '<button type="button" class="close" data-dismiss="modal">';
                    echo '<span aria-hidden="true">&times;</span>';
                    echo '<span class="sr-only">Close</span>';
					echo '</button>';
					echo '<h4 class="modal-title" id="myModalLabel">';
                    echo "Hapus Data";
					echo "</h4>";
					echo "</div>";
					echo '<div class="modal-body">';
					echo '<form role="form" method="post" action="deleteuser.php?id='.$row["id"].'">'; 
					echo '<h6>Apakah anda yakin ingin menghapus data ini ?</h6>';
					echo '</div>';
					echo '<div class="modal-footer">';
					echo '<input name="delete" type="submit" class="btn btn-primary" value="Delete Data">';
					echo '</form>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					}
				}
				} else {
					echo "<tr>";
					echo "<td colspan='5'>";
					echo "Tidak Ada Data Ditemukan";
					echo "</td>";
					echo "</tr>";
				}
				} else {
				$searchnama = $_GET["srch-term"];
				$searchquery = mysqli_query($connection, "SELECT * FROM datauser WHERE username LIKE '%$searchnama%' ORDER BY username");
				if (mysqli_num_rows($searchquery) > 0) {
				while($row = mysqli_fetch_assoc($searchquery)) {
					if($row['admin'] == 1)
					{
						$level = "Admin";
					}
					else
					{
						$level = "Member";
					}
					echo "<tr>";
					echo "<td>";
					echo $i;
					echo "</td>";
					echo "<td>";
					echo $row['username'];
					echo "</td>";
					echo "<td>";
					echo $level;
					echo "</td>";
					echo "<td>";
					echo $row['namalengkap'];
					echo "</td>";
					echo "</tr>";
					$i++;
				}
				} else {
					echo "<tr>";
					echo "<td colspan='5'>";
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
                
                <form role="form" method="post" action="insertuser.php">
                  <div class="form-group">
                      <input name="username" type="text" class="form-control"
                      id="username" placeholder="Username" required/>
                  </div>
                  <div class="form-group">
                      <input name="password" type="password" class="form-control"
                          id="password" placeholder="Password" required/>
                  </div>
				  <div class="form-group">
                      <select class="form-control" id="admin" name="admin">
					  <option value="0">Member</option>
					  <option value="1">Admin</option>
					  </select>
                  </div>
				  <div class="form-group">
                      <input name="namalengkap" type="text" class="form-control"
                          id="namalengkap" placeholder="Nama Lengkap" required/>
                  </div>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <input name="insert" type="submit" class="btn btn-primary" value="Insert Data">
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