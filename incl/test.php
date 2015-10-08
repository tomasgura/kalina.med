<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	$pol_baleni = "";
	$medy = file_get_contents('../data/medy.json');
	$medy_json = json_decode($medy);
	foreach ($medy_json as $med) {
	
		
		$val = str_pad($med->kod, 10," ", STR_PAD_RIGHT);
		$val.= str_pad($med->jmeno, 50, ' ');
		$val.=$med->cena;
		$pol_baleni.= "<option value='$val' data-cena='$med->cena'>$med->jmeno</option>";
		echo $val;
		file_put_contents('msg.txt', $val);
	}
