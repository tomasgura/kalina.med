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
			<?php
			if ($sent == 1) {
				javascript_alert('Objednávka odeslána');
			}
			?>
		<div class="content">
			
		<?php require_once './incl/pageHeader.php'; ?>
		<?php menu('objednavka') 
		/*
Do objedn8vkz jm0no, příjmení a telefon, vše povinné, poznámku zachovat.
		 * položky v objednávce - balení, množství (pouze edit) a celkem.
		 * 
		 * dvě monžnosti dopravy - osobní odběr a dovoz v okolí Prahy a Příbrami
		 * 		 */
		
		
		
		?>	
			
			<div class="row">
				<div class="col-md-6 vlevo" id="form">
					<form method="POST"  action="obj_post.php">
						<?php echo polozky_objednavky(); ?>
						<br>
						<label for="ctrl_19" class="celkem">cena za med celkem:</label>  <input type="text" name="cenacelkem" id="ctrl_19" class="text celkem" value=""><br>
						<label for="frm_email" class="frm_label">E-mail:</label> <br><input type="email" name="email" id="frm_emal" size="53" required>
						<br>
						<label for="frm_tel" class="frm_label">Telefon:</label> <br><input type="text" name="tel" id="frm_tel" size="53" required>
						<br>

						<label for="frm_text" class="frm_label">Text objednávky:</label> <br><textarea rows="10" cols="50" name="text" id="frm_text" ></textarea>
						<br>
						<input type="submit" value="Odeslat">
					</form>

				</div>
				<img src="img/obj.jpg" class="obj_pic">
			</div>
			<div>
				<img class="center disp_block"  src="img/maringotka.jpg">

			</div>
		</div>
		<script>
			var r = 1;
			$(document).ready(function () {
				//$("#form").validate({
				//	ignore: "input[type='text']:hidden"
				//});
				$('#form').validate();
				$("[class^=radek]").hide();

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
							vcem=vcem.substr(57);
							var co = $(smnozstvi).val();
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
				$("#form").trigger("click");

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
