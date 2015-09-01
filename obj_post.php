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
	mail('jinkal@volny.cz','Obj. medu',$txt,$headers);
}

header('Location: objednavka.php?sent=1');
exit;