<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$headers = 'From: obj@prazskymed.cz' . "\r\n" .
    'Reply-To: obj@prazskymed.cz' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (isset($_POST['text']))
{
	$txt = $_POST['text'];
	$tel = $_POST['tel'];
	$mail = $_POST['email'];
	// polozky objednavky
	$pol='';
	for($i=0;$i<10;$i++)
	{
		$pol_text=$_POST['Baleni'.$i];
		$pol_text =  substr($pol_text, 0, 60);
		$pol_text = preg_replace('/\s\s+/', ' ',$pol_text);
		$pol_ks=$_POST['mnozstvi'.$i];
		if ($pol_ks!='')
			$pol.="Polozka: $pol_text - $pol_ks ks \n";
		
	}
	$zprava="Objednavka medu z webu \n\n$pol\n\nTel.: ".$tel. "\n\nmail: ".$mail." \n\nText: ".$txt;
	file_put_contents('msg.txt', $zprava);
    mail('jinkal@volny.cz','Obj. medu',$zprava,$headers);
//	mail('tomas.gura@gmail.com','Obj. medu',$zprava,$headers);
}
//var_dump($zprava);
//die('x');
header('Location: objednavka.php?sent=1');
exit;