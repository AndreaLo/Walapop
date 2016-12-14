<?php
	session_start();
	require('funciones.php');
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
		<style>
			.ficha{
				width: 100%;
				float: left;
				padding-top: 7%;
			}
			.mitadImagen{
				padding-left: 5%;
				width: 50%;
				float: left;
			}
			.mitadDatos{
				padding-right: 5%;
				padding-left: 2%;
				width: 50%;
				float: left;
			}
			#precioEnFicha{
				color: #00cc99;
			}
			.encabezado{
				float: left;
				width: 100%;
			}
			#precioEnFicha{
				float: left;
			}
			#visitasFavorito{
				float: right !important;
			}
			.avatar{
				border-radius: 50%;
			}
		</style>
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
				<div class="ficha">
					<?php
						mostrarFicha($_GET['id']);								
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