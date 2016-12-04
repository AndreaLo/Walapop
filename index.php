<?php 
session_start();
require('funciones.php');
if(isset($_GET["reset"])){
	print_r($_SESSION);
	session_destroy();
	session_start();	
	echo 'sesion destrozada';
	$_SESSION["email"]=null;
	print_r($_SESSION);
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<!-- Latest compiled and minified CSS -->

		<link rel="stylesheet"  href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/estil.css"/>
		<link rel="stylesheet" href="css/principal.css"/>
		<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>
		</script>
	</head>
	<body>
		<div class="row">
		<!-- Menu -->
		<?php
			require('menuComun.php');
		?>
		<!-- Main Content -->
		<div class="container-fluid">
			<div class="side-body">
				<h1> Main Content here </h1>
				<pre> Resize the screen to view the left slide menu </pre>
				<div id="busquedaCategoria">
					<?php
						 mostrarProductosPorFecha();								
					?>
				</div>
			</div>
		</div>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
		<script src="js/javas.js"></script> 
	</body>
</html>
