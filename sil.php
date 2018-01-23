<?php
include('baglan.php');
if(empty($_SESSION['admin']))
{
	header('LOCATION:giris.php');
	exit;
}	
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Sil</title>
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
					$id = intval($_GET['id']);
					if(isset($_GET['silonay']) && $_GET['silonay']=='evet')
					{
						$sil = $db->query('DELETE FROM mesaj WHERE id='.$id);
						if($sil)
						{
							header('LOCATION:index.php');
							exit;
						}
					}
					
					
					$silinecek = $db->get_row('SELECT * FROM mesaj WHERE id='.$id);
				?>
				<h2>Silinecek Mesaj, Onaylıyor musun?</h2>
				<div style="margin:5px;padding:5px;border:1px solid #ccc">
						<div style="padding:5px;border-bottom:1px solid #000;margin-bottom:5px;">
							<span style="color:#111"><?php echo $silinecek->isim;?></span>
							<?php if(!empty($_SESSION['admin'])){?>
								<span><a href="http://localhost/ziyaretci/duzenle.php?id=<?php echo $silinecek->id;?>">Düzenle</a></span>
							<?php }?>
							<span style="float:right;color:#bbb"><?php echo date('d-m-Y H:i:s',$silinecek->tarih);?></span>
						</div>	
						<?php echo $silinecek->mesaj;?>
					</div>
					<a href="http://localhost/ziyaretci/sil.php?id=<?php echo $id;?>&silonay=evet">Evet</a> <a href="http://localhost/ziyaretci">Hayır</a>
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
