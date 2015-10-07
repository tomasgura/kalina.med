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
		require_once 'incl/fnc.php';
		$sent = 0;
		if (isset($_GET['sent']))
			$sent = $_GET['sent'];
		?>
		<div class="content">
			<?php require_once './incl/pageHeader.php'; ?>
			<ul class="nav nav-tabs">
				<li role="presentation"><a href="index.php">Úvod</a></li>
				<li role="presentation" class="active"><a href="objednavka.php">Objednávka</a></li>
				<li role="presentation"><a href="kontakt.php">Kontakt</a></li>
			</ul>
			<div class="row">
				<div class="col-md-6 vlevo" id="form">
					<form method="POST"  action="obj_post.php">
						<input type="button" id="btn" value="pepa"/>
						<?php echo polozky_objednavky(); ?>
						<select name="druh" style="display:none;">
							<?php
							foreach ($medy_json as $med) {
								echo "<option value='$med->kod'>$med->jmeno</option>";
							}
							?>
						</select>
						<label for="ctrl_19" class="celkem">cena za med celkem:</label>  <input type="text" name="cenacelkem" id="ctrl_19" class="text celkem" value=""><br>
						<label for="frm_email" class="frm_label">Email</label> <br><input type="text" name="email" id="frm_emal" size="53">
						<br>
						<label for="frm_tel" class="frm_label">Tel</label> <br><input type="text" name="tel" id="frm_tel" size="53">
						<br>

						<label for="frm_text" class="frm_label">Text objednávky</label> <br><textarea rows="10" cols="50" name="text" id="frm_text" ></textarea>
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
			if ($sent == 1) {
				javascript_alert('Objednávka odeslána');
			}
			?>
		</div>
		<script>
			var r = 1;
			$(document).ready(function () {
				$("[class^=radek]").hide();

				$('#btn').click(function () {
					var x = $('.mnozstvi0').val();
					console.log(x)
					alert(x);

				});


				$('#form').click(function () {
					var c = 0;
					var sum = 0;
					$(".fff").each(function () {

						var sbaleni = ".baleni" + c;
						var smnozstvi = ".mnozstvi" + c;
						var scena = ".cena" + c;
						var vcem = $(sbaleni).val();
						if (vcem)
						{

							var co = $(smnozstvi).val();
							console.debug('baleni ' + c + '  ' + vcem + '  ' + co);
							// console.debug($(smnozstvi).toSource());

							var baleni = vcem.substr(10);
							var polozka = vcem * co;
							$(scena).val(polozka + ",- Kč");
							c++;
							sum = sum + polozka;
							$(".celkem").val(sum + ",- Kč");
						}
					});
					//			alert(sum.toString());

				}).change();
				$(":input").trigger("change");

				$("[class^=show]").click(function () {
					$(".radek" + r).show();
					$(".show" + r).hide();
					r++;
				});

			});



		</script>
		<?php require_once './incl/pageFooter.php'; ?>
		<?php
		// put your code here
		?>
    </body>
</html>
