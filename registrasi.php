<link rel="stylesheet" type="text/css" href="css/login.css">
<div class="judul">
	<h2><b>Registration System</b></h2>
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
									<input type="text" name="username" placeholder="Username" maxlength="16">
								</td>
								<td class="w10 center">
									<i class="fa fa-user-circle-o" aria-hidden="true"></i>
								</td>
							</tr>

							<tr>
								<td class="w90">
									<input type="password" name="password" placeholder="Password" maxlength="16">
								</td>
								<td class="w10 center">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</td>
							</tr>

							<tr>
								<td class="w90">
									<input type="password" name="password2" placeholder="Confirm Password" maxlength="16" required>
								</td>
								<td class="w10 center">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</td>
							</tr>
							<!-- 
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
							</tr> -->
						</table>
					</td>
				</tr>
			</table>
			<table class="w100">
				<tr>
					<td class="right">
						<input type="submit" name="confirm" value="NEXT">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php 
if ( isset($_POST["confirm"]) ) {
	$username = @$_POST["username"];
	$password = mysqli_real_escape_string($db, @$_POST["password"] );
	$password2 = mysqli_real_escape_string($db, @$_POST["password2"] );
	$level = @$_POST["level"];
	// fungsi mysqli_real_escape_string = user bisa masukkan passwd dengan karakter kutip 1 dengan aman.

		//perintah dibawah UNTUK sql cek username sudah ada atau belum di table user.
		$sqlcekuser = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'") or die($db -> error);
		$cekuser = mysqli_num_rows($sqlcekuser);

			if ($cekuser == 1) {
				?> 
				<script>
					alert("Maaf username sudah terdaftar.");
				</script>
				<?php 
				die;
			}

			//koding cek password apa sama dengan password konfirmasi
			if ($password !== $password2) {
				?> 
				<script>
					alert("Konfirmasi Password Tidak Sesuai! Mohon Diulang.");
				</script>
				<?php 
				die;
			}

		//ENKRIPSI PASSWORD DENGAN PASSWORD_DEFAULT
		//PASSWORD_DEFAULT MERUPAKAN TEKNIK ALGORITMA UNTUK ENKRIPSI PASSWORD DI PHP5
		//TIAP PHP UPDATE MAKA TEKNIK ALGORITMA ENKRIPSI JUGA AKAN DI UPDATE YG TERBARU
		$password = password_hash($password, PASSWORD_DEFAULT);

		//TAMBAHKAN DATA REGISTRASI KE TABLE USER
		$sqlregistrasi = "INSERT INTO user (username,password,level) VALUES('$username','$password','pelanggan')";
		mysqli_query($db, $sqlregistrasi) or die($db -> error);
		
		?> 
		<script type="text/javascript">
			alert("Anda berhasil registrasi. Akan diarahkan ke halaman Login");
			window.location.href="index.php?hl=log";
		</script>
		<?php
}

?>