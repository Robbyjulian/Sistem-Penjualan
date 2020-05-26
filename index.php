<?php 
session_start();
include "conn/koneksi.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="css/style-utama.css">
	<link rel="stylesheet" type="text/css" href="icon/css/font-awesome.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<div id="wadah">
			<div class="header">
				<img class="logo_header" src="img/header.jpg">
			</div>

		<div class="detail_wadah">

			<div class="menu">
				<ul>
					<li>
						<a href="">
							<i class="fa fa-home" aria-hidden="true" style="font-size: 21px;"></i>
						</a>
					</li>
					<li>
						<a href="?hl=log">Login</a>
					</li>
					<li>
						<a href="?hl=contact">Contact us</a>
					</li>
					<li>
						<a href="?hl=about">About us</a>
					</li>
				</ul>
			</div>

			<div class="main">
				
				<div class="konten">
					<div class="detail_konten">
						<!-- <p style="text-align: center;">konten</p> -->
						<?php 
							$hl = @$_GET['hl'];

							if ($hl == "log") {
								include "login.php";
							} elseif ($hl == "contact") {
								include "about.php";
							} elseif ($hl == "about") {
								include "contact.php";
							} elseif ($hl == "rgts") {
								include "registrasi.php";
							}
						?>
					</div>
				</div>

				<div class="menu_kanan">
					<div class="menu_1">
						<p style="text-align: center;">side bar 1</p>
					</div>
					<div class="menu_2">
						<p style="text-align: center;">side bar 2</p>
					</div>
				</div>
				<div class="clearboth"></div>
			</div>

		</div>
	</div>
	<div class="footer">
		<p>Copy Right</p>
	</div>

</body>
</html>