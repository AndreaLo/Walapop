<?php


session_start();
require('funciones.php');
//$_SESSION['email']='aaal@hotmail.com';

//al@hotmail.com
//aaal@hotmail.com
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<!-- Latest compiled and minified CSS -->

		<link rel="stylesheet"  href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/estil.css"/>
		<link rel="stylesheet" href="css/usuario.css"/>
		<link rel="stylesheet" href="css/principal.css"/>
		<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	
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
					<?php
					require('usuari/usuari.php');
						printar_menuUsuari();
					?>


					<?php

						global $usuari;
						$usuari = $_SESSION;
						


						
						$pdo=conexio();

						$codi=printar_usuari($pdo,$usuari);


						printar_CantitatprodVenta($pdo,$codi);

						printar_Cantitatvenuts($pdo,$codi);

						printar_CantitatValoraciones($pdo,$codi);

						printar_Cantitatfavoritos($pdo,$codi);

						printar_productesVenta($pdo,$codi);
						

					?>

					
			</div>
		</div>
		</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
		<script src="js/javas.js"></script> 
		<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.js" />
	</body>
</html>