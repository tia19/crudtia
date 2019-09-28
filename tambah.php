<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD TIA</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">CRDU TIA</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah User</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$nama = @$_POST['nama'];
			$username = @$_POST['username'];
			$password = @$_POST['password'];
			$email = @$_POST['email'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO user( nama,username, password, email) VALUES( '$nama','$username', '$password', '$email')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Nama sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" id="nama" placeholder="Nama" class="form-control" required onkeypress='return harusHuruf(event)'>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">USERNAME</label>
				<div class="col-sm-10">
					<input type="text" name="username" id="username" placeholder="Username" class="form-control" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">PASSWORD</label>
				<div class="col-sm-10">
					<input type="password" name="password" id="password" maxlength="8" placeholder="Password" class="form-control" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">EMAIL</label>
				<div class="col-sm-10">
					<input type="email" name="email" data-validate-length-range="8" id="email" onchange="ValidateEmail()" placeholder="example@mail.com" class="form-control" required="required">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-danger"><i class="fa fa-ban"></i> KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	<div id="footer">
        Copyright &copy; 2019
        Designed by Tia STS
    </div>
</body>
</html>

<script>
 
function harusHuruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
}
 
</script>

