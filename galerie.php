<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
		<?php require_once './incl/header.php'; ?>
		<?php require_once './incl/fnc.php'; ?>
		<link rel="stylesheet" href="css/example.css">
		<link rel="stylesheet" href="css/wallop.css">

        <title>Jindřích Kalina - Pražský med</title>
    </head>
    <body>
		<div class="content">
			<?php require_once './incl/pageHeader.php'; ?>
			<?php menu('galerie') ?>	
			<div class="row">
				<div class="vlevo col-md-6">



					<div class="Container">
						<h1>Wallop Slider Examples</h1>
						<h2>Animations</h2>

						<!-- SLIDER STARTS -->
						<div class="Wallop Wallop--slide">
							<div class="Wallop-list">
								<?php generuj_obrazky_galerie(); ?>
							</div>

							<button class="Wallop-buttonPrevious">Previous</button>
							<button class="Wallop-buttonNext">Next</button>
						</div>
						<!-- SLIDER ENDS -->


					</div>


				</div>
			</div>
		</div>
		<?php require_once './incl/pageFooter.php'; ?>

		<script src="js/Wallop.min.js"></script>
  <script>

    // New instance of Wallop
    var slider = document.querySelector('.Wallop');
    new Wallop(slider);

    var animations = [
      'slide',
      'fade',
      'scale',
      'rotate',
      'fold',
      'vertical-slide'
    ];

    function insertCss(animation) {
      var link = document.createElement('link');
      link.rel = 'stylesheet';
      link.href = 'css/wallop--' + animation + '.css';
      document.getElementsByTagName("head")[0].appendChild(link)
    }

    function updateSliderClass(className) {
      animations.forEach(function(animation) {
        removeClass(slider, 'Wallop--' + animation);
      });
      addClass(slider, 'Wallop--' + className);
    }

    function insertButton(animation) {
      var button = document.createElement('button');
      button.innerHTML = animation;
      slider.parentNode.insertBefore(button, slider);
      button.addEventListener('click', function() {
        updateSliderClass(animation);
      });
    }

    animations.forEach(function(animation) {
      insertCss(animation);
      insertButton(animation);
    });


    // Helpers
    function addClass(element, className) {
      if (!element) { return; }
      element.className = element.className.replace(/\s+$/gi, '') + ' ' + className;
    }

    function removeClass(element, className) {
      if (!element) { return; }
      element.className = element.className.replace(className, '');
    }
  </script>
		
    </body>
</html>
