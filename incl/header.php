<?php 
$production=false;
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<?php
if ($production==false) {
?>
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/main.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/jquery-1.11.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php } ?>

<?php
if ($production==true) {
?>
<link rel="stylesheet" href="build/build.min.css">
<script src="build/build.min.js"></script>
<?php } ?>
