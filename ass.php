<?php
	
	$nome 	  = $_POST["nome"];
	$funcao	  = $_POST["funcao"];
	$telefone = $_POST["telefone"];
	$email 	  = $_POST["email"];
	$cel 	  = $_POST["cel"];
	
	header("Content-type: image/png");
	header('Content-disposition: attachment; filename="assinatura.png"');

	$image = imagecreatefrompng("assinatura.png");
	$imageCel = imagecreatefrompng("cel.png");
	$imageWhats = imagecreatefrompng("whats.png");
	$imgPira = imagecreatefrompng("piracicaba.png");
	$imgBotucatu = imagecreatefrompng("botucatu.png");
	$imgLencois = imagecreatefrompng("lencois.png");
	$imgJau = imagecreatefrompng("jau.png");
	
	if(!empty ($_POST["name"]) ){
	$fotinha = $_POST["name"];
	$imgFotinha = imagecreatefrompng("upload/".$fotinha.".png");
	}
	
	$tileColor = imagecolorallocate($image, 0, 63, 114);
	$gray = imagecolorallocate($image, 100, 100, 100);
	
	
	
	if(!empty($_POST["cel"])){
	imagecopy($image, $imageCel, 445,17,0,0,12,16);
	imagettftext($image, 10,0, 460, 30, $tileColor, "C:\\xampp\\htdocs\\assinatura\\fonts\\Helvetica\\Helvetica-Normal.ttf", $cel);
	if(isset($_POST["whats"])){
	imagecopy($image, $imageWhats , 560,17,0,0,15,16);
	}
	}
	
	if(!empty ($_POST["name"]) ){
	imagecopy($image, $imgFotinha , 10,16,0,0,100,100);
	}
	
	imagettftext($image, 12,0, 110, 33, $tileColor, "C:\\xampp\\htdocs\\assinatura\\fonts\\Helvetica\\Helvetica Bold.ttf", $nome);
	imagettftext($image, 10,0, 120, 50, $tileColor, "C:\\xampp\\htdocs\\assinatura\\fonts\\Helvetica\\Helvetica-Normal.ttf", $funcao);
	
	imagettftext($image, 10,0, 332, 30, $tileColor, "C:\\xampp\\htdocs\\assinatura\\fonts\\Helvetica\\Helvetica-Normal.ttf", $telefone);
	imagettftext($image, 11,0, 334, 56, $tileColor, "C:\\xampp\\htdocs\\assinatura\\fonts\\Helvetica\\Helvetica-Normal.ttf", $email);
	
	$filial = $_POST["filial"];
	
	if ($filial == "piracicaba"){
	imagecopy($image, $imgPira , 310,75,0,0,324,11);
	}
	
	if ($filial == "botucatu"){
	imagecopy($image, $imgBotucatu , 310,75,0,0,324,11);
	}
	
	if ($filial == "lencois"){
	imagecopy($image, $imgLencois , 310,75,0,0,324,11);
	}
	
	if ($filial == "jau"){
	imagecopy($image, $imgJau , 310,75,0,0,324,11);
	}
	
	
	imagepng($image);
	imagedestroy($image);
	

?>
