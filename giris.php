<?php
include('baglan.php');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Giriş Yap</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="wrap-contact2">
				<?php

					if($_POST)
					{
						if($_POST['sifre']==sifre)
						{
							$_SESSION['admin'] = 1;
						}
						else
						{
							echo 'Hatalı şifre girdin? Yoksa bizi mi koparıyon!';
						}
					}
					if(!empty($_SESSION['admin']))
					{
						header('LOCATION:index.php');
					}	

				?>
				<form action="" method="post" class="contact2-form validate-form">
					<span class="contact2-form-title">
						Şifrenizi Yazın
					</span>

					<div class="wrap-input2 validate-input" data-validate="Şifre Alanı Gerekli">
						<input class="input2" type="password" name="sifre">
						<span class="focus-input2" data-placeholder="Şifreniz"></span>
					</div>

					

					

					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn">
								Giriş Yap
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>


	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

</body>
</html>
