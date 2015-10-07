<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function javascript_alert($lp_str) {
	echo javascript_obal("alert('$lp_str');");
}

function javascript_obal($lp_script) {
	return "\n<script type=\"text/javascript\">\n" . $lp_script . "\n</script>\n";
}

function polozky_objednavky() {
	$pol_baleni = "";
	$medy = file_get_contents('data/medy.json');
	$medy_json = json_decode($medy);
	foreach ($medy_json as $med) {
		$pol_baleni.= "<option value='$med->cena' data-cena='$med->cena'>$med->jmeno</option>";
	}

	$ret = "";
	$i = 0;
	for ($i == 0; $i < 11; $i++) {
		$i==0 ? $cls='prvni':$cls="radek$i";
		$ret.=" 
  <fieldset class='$cls'>
  <legend>č. $i</legend>
    <select name='Balení$i' id='ctrl_10' class='select baleni$i'>$pol_baleni</select>    
    <input type='text' name='mnozstvi$i' id='ctrl_12' size='4' class='mnozstvi$i' value=''>
    <input type='text' name='Cena$i' id='ctrl_12' size='4' class='fff text cena$i' value=''>

<span id='pridat' class='show2'>přidat položku</span>
  </fieldset>
		";
	}
	// var_dump($ret);
	return $ret;

}


	/*
	  Do objedn8vkz jm0no, příjmení a telefon, vše povinné, poznámku zachovat.
	 * položky v objednávce - balení, množství (pouze edit) a celkem.
	 * 
	 * dvě monžnosti dopravy - osobní odběr a dovoz v okolí Prahy a Příbrami
	 * 		 */

