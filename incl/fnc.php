<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function javascript_alert($lp_str)
{
    echo javascript_obal("alert('$lp_str');");
}

function javascript_obal($lp_script)
{
   return "\n<script type=\"text/javascript\">\n".$lp_script."\n</script>\n";
}

function menu($aktivni)
{ ?>
			<ul class="nav nav-tabs">
				<li role="presentation" <?php if ($aktivni=='index') { ?> class="active" <?php } ?> ><a href="index.php">Úvod</a></li>
				<li role="presentation" <?php if ($aktivni=='objednavka') { ?> class="active" <?php } ?>><a href="objednavka.php">Objednávka</a></li>
				<li role="presentation" <?php if ($aktivni=='kontakt') { ?> class="active" <?php } ?>><a href="kontakt.php">Kontakt</a></li>
				<li role="presentation" <?php if ($aktivni=='galerie') { ?> class="active" <?php } ?>><a href="galerie.php">Galerie</a></li>
			</ul>
	<?php
}