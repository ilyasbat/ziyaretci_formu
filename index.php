<?php
include('baglan.php');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Contact V2</title>
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
						if(empty($_POST['isim']))
						{
							echo 'Lütfen İsim Girin<br/>';
						}
						else
						{
							$isim = $db->escape(strip_tags($_POST['isim']));
						}
						if(empty($_POST['mail']))
						{
							echo 'Lütfen Mail Girin<br/>';
						}
						else
						{
							$mail = $db->escape(strip_tags($_POST['mail']));
						}
						if(empty($_POST['mesaj']))
						{
							echo 'Lütfen Mesaj Girin<br/>';
						}
						else
						{
							$mesaj = $db->escape(strip_tags($_POST['mesaj']));
						}
						if(isset($isim)&&isset($mail)&&isset($mesaj))
						{
							$tarih = time();	
							$ekle = $db->query("INSERT INTO mesaj (isim,mail,tarih,mesaj) VALUES ('$isim','$mail',$tarih,'$mesaj')");	
							if($ekle)
							{
								echo 'Mesajınız Gönderildi';	
							}
						}
					}	

				?>
				<form action="" method="post" class="contact2-form validate-form">
					<span class="contact2-form-title">
						Mesajınızı Yazın
					</span>

					<div class="wrap-input2 validate-input" data-validate="İsim Alanı Gerekli">
						<input class="input2" type="text" name="isim">
						<span class="focus-input2" data-placeholder="Adınız"></span>
					</div>

					<div class="wrap-input2 validate-input" data-validate = "Geçerli bir mail girin">
						<input class="input2" type="text" name="mail">
						<span class="focus-input2" data-placeholder="Mail Adresi"></span>
					</div>

					<div class="wrap-input2 validate-input" data-validate = "Mesaj Alanı Gerekli">
						<textarea class="input2" name="mesaj"></textarea>
						<span class="focus-input2" data-placeholder="Mesajınız"></span>
					</div>

					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn">
								Mesajınızı Gönderin
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="container-contact2">
			<div class="wrap-contact2">
				<span class="contact2-form-title">
						Ziyaretçi Mesajları
					</span>
					<?php
						$mesajlar = $db->get_results('SELECT id,isim,mesaj,tarih FROM mesaj ORDER BY tarih DESC');
					?>
					<?php foreach($mesajlar as $m){?>
					<div style="margin:5px;padding:5px;border:1px solid #ccc">
						<div style="padding:5px;border-bottom:1px solid #000;margin-bottom:5px;">
							<span style="color:#111"><?php echo $m->isim;?></span>
							<?php if(!empty($_SESSION['admin'])){?>
								<span><a href="http://localhost/ziyaretci/sil.php?id=<?php echo $m->id;?>">Sil</a> | <a href="http://localhost/ziyaretci/duzenle.php?id=<?php echo $m->id;?>">Düzenle</a></span>
							<?php }?>
							<span style="float:right;color:#bbb"><?php echo date('d-m-Y H:i:s',$m->tarih);?></span>
						</div>	
						<?php echo $m->mesaj;?>
					</div>
					<?php }?>
					<?php
					if(empty($_SESSION['admin']))
					{
						?>
							<a href="http://localhost/ziyaretci/giris.php">Giriş Yap</a>
						<?php
					}
					else
					{
						?>
							<a href="http://localhost/ziyaretci/cikis.php">Çıkış Yap</a>
						<?php	
					}
					?>
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
