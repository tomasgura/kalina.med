<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$headers = 'From: obj@prazskymed.cz' . "\r\n" .
    'Reply-To: obj@razskymed.cz' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (isset($_POST['text']))
{
	$txt = $_POST['text'];
	$tel = $_POST['tel'];
	$mail = $_POST['email'];
	$zprava="Objednavka medu z webu \n\nTel.: ".$tel. "\n\nmail: ".$mail." \n\nText: ".$txt;
	mail('jinkal@volny.cz','Obj. medu',$zprava,$headers);
//	mail('tomas.gura@gmail.com','Obj. medu',$zprava,$headers);
}

header('Location: objednavka.php?sent=1');
exit;