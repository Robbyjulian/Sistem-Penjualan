<link rel="stylesheet" type="text/css" href="css/login.css">
<div class="judul">
	<h2><b>Login System</b></h2>
</div>
<div class="login">
	<div class="detail_login">
		<form action="" method="post">
			<table class="w100">
				<tr>
					<td>
						<table class="w100">
							<tr>
								<td class="w90">
									<input type="text" name="username" placeholder="Username" maxlength="16" required>
								</td>
								<td class="w10 center">
									<i class="fa fa-user-circle-o" aria-hidden="true"></i>
								</td>
							</tr>

							<tr>
								<td class="w90">
									<input type="password" name="password" placeholder="Password" maxlength="16" required>
								</td>
								<td class="w10 center">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</td>
							</tr>

							<tr>
								<td>
									<table class="w115">
										<tr>
											<td class="w50">
												<input type="radio" name="level" value="petugas"> Petugas
											</td>
											<td class="w50 plg">
												<input type="radio" name="level" value="pelanggan"> Pelanggan
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table class="w100">
				<tr>
					<td>
						<a class="registrasi" href="?hl=rgts">Registration</a>
					</td>
					<td class="right">
						<input type="submit" name="login" value="Login">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php 
if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$level = $_POST["level"];

	//sql cek username ada atau tidak di tabel user
	$sql = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'") or die($db -> error);
	$hasilsql = mysqli_fetch_assoc($sql);
	$cekusername = mysqli_num_rows($sql);
	
	// var_dump($hasilsql);
	// var_dump($cekusername);
	// die;

	if ( $cekusername >= 1 ) {
		if ( password_verify($password, $hasilsql["password"]) ) {
			if ($hasilsql["level"] == $level) {
				if ($hasilsql["level"] == "petugas") {
					$_SESSION['petugas'] = 'petugas';
					// $_SESSION['no_induk'] = $hasilsql['username'];
				 	?><script>
				 		window.location.href="petugas/petugas.php";
				 	</script><?php 
				}else if ($hasilsql["level"] == "pelanggan") {
					$_SESSION['pelanggan'] = 'pelanggan';
					// $_SESSION['no_induk'] = $hasilsql['username'];
					?><script>
				 		window.location.href="pelanggan/pelanggan.php";
				 	</script><?php 
				}
			} else {
				?><script>
					alert("Maaf, anda tidak ada hak akses untuk login tersebut");
				</script><?php
			}
		} else {
			echo "Password yang di inputkan salah";
		}
	} else {
		echo "Maaf user tidak terdaftar dalam sistem";
	}
}

?>