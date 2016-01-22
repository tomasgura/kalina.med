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

function menu($aktivni) {
	?>
	<ul class="nav nav-tabs">
		<li role="presentation" <?php if ($aktivni == 'index') { ?> class="active" <?php } ?> ><a href="index.php">Úvod</a></li>
		<li role="presentation" <?php if ($aktivni == 'o_nas') { ?> class="active" <?php } ?>><a href="o_nas.php">O nás</a></li>
		<li role="presentation" <?php if ($aktivni == 'katalog') { ?> class="active" <?php } ?>><a href="katalog.php">Katalog</a></li>
		<li role="presentation" <?php if ($aktivni == 'objednavka') { ?> class="active" <?php } ?>><a href="objednavka.php">Objednávka</a></li>
		<li role="presentation" <?php if ($aktivni == 'kontakt') { ?> class="active" <?php } ?>><a href="kontakt.php">Kontakt</a></li>
		<li role="presentation" <?php if ($aktivni == 'galerie') { ?> class="active" <?php } ?>><a href="galerie.php">Galerie</a></li>
	</ul>
	<?php
}

function generuj_obrazky_galerie() {
	/* vystup ma vypadat takto
	<div class="Wallop-item Wallop-item--current"><img src="imgs/1.jpg"></div>
	<div class="Wallop-item"><img src="imgs/2.jpg"></div>
	<div class="Wallop-item"><img src="imgs/3.jpg"></div>
	<div class="Wallop-item"><img src="imgs/4.jpg"></div>
	<div class="Wallop-item"><img src="imgs/5.jpg"></div>
	 * 

	 * 
	 * 	 */
	$dir = "galerie/*.jpg";
	$thumbs = glob($dir);

	if (count($thumbs)) {
		natcasesort($thumbs);
		foreach ($thumbs as $thumb) {
			?>
			<div class="Wallop-item">
					<img src="<?php echo $thumb ?>" alt="" />
			</div>  
			<?php
		}
	} else {
		echo "No images";
	}
}


function polozky_objednavky() {
	$pol_baleni = "";
	$medy = file_get_contents('data/medy.json');
	$medy_json = json_decode($medy);
	$pol_baleni.= "<option value='' data-cena='0'>Druh medu</option>";
	foreach ($medy_json as $med) {
	
		$val = str_pad($med->kod, 10, ' ');
		$val.= str_pad($med->jmeno, 50, ' ');
		$val.=$med->cena;
		$pol_baleni.= "<option value='$val' data-cena='$med->cena'>$med->jmeno</option>";
	}

		$ret = "";
	$i = 0;
	for ($i == 0; $i < 11; $i++) {
		$j=$i+1;
		$i==0 ? $cls='prvni':$cls="radek$i";
		$ret.=" 
  <fieldset class='$cls'>
  <legend>č. $j</legend>
    <select name='Baleni$i' id='ctrl_10' class='select baleni$i'>$pol_baleni</select>    
    <input type='text' placeholder='Množství' name='mnozstvi$i' id='ctrl_12' size='4' class='mnozstvi$i' value='' >
    <input type='text' placeholder='Cena' name='Cena$i' id='ctrl_12' size='4' class='fff text cena$i' value=''>

<span id='pridat' class='show$j'><span title='Nová položka' class='pridej_polozku'>+</span></span>
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

