<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
		<?php require_once './incl/header.php'; ?>
        <title>Jindřích Kalina - Objednávka</title>
    </head>
    <body>
		<?php
		require_once './incl/pageHeader.php';
		$medy = file_get_contents('data/medy.json');
		$medy_json = json_decode($medy);
		$sent=0;
		if (isset($_GET['sent']))
			$sent=$_GET['sent'];
		?>
		<div class="content">
			<ul class="nav nav-tabs">
				<li role="presentation"><a href="index.php">Úvod</a></li>
				<li role="presentation" class="active"><a href="objednavka.php">Objednávka</a></li>
				<li role="presentation"><a href="kontakt.php">Kontakt</a></li>
			</ul>
			<div class="row">
				<div class="col-md-6 vlevo">
					<form method="POST" action="obj_post.php">
						<select name="druh" style="display:none;">
							<?php
							foreach ($medy_json as $med) {
								echo "<option value='$med->kod'>$med->jmeno</option>";
							}
							?>
						</select>

						<label for="frm_text">Text objednávky</label> <br><textarea rows="10" cols="50" name="text" id="frm_text" ></textarea>
						<br>
						<input type="submit" value="Odeslat">
					</form>

				</div>
				<img src="img/obj.JPG" class="obj_pic">
			</div>
			<div>
					<img class="center disp_block"  src="img/maringotka.jpg">

			</div>
			<?php
				if ($sent==1)
				{
					require_once 'incl/fnc.php';
					javascript_alert('Objednávka odeslána');
				}
			?>
		</div>
		<?php require_once './incl/pageFooter.php'; ?>
		<?php
		// put your code here
		?>
    </body>
</html>
