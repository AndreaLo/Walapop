<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//include("file_with_errors.php");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet"  href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/estil.css"/>
		<link rel="stylesheet" href="css/registro.css"/>
		<style>
		</style>

		<script>

		//funcion para solucuionar el problema de fondo de pantalla
		//recaclula la alutra del navegador y añade clase con pixeles
		//fijando un tamañaño al class container fluid de esta pagina.	
		function Resize(){
			var body = document.body,
    		html = document.documentElement;
			var dateSpan = document.getElementById("contenedor");
				dateSpan.style.height = (Math.max( body.scrollHeight, body.offsetHeight, 
                html.scrollHeight)+'px');
				//location.reload();	
		}
		window.onresize=Resize;		
			
		</script>


	</head>
	<body onload="Resize()">
		<div class="row">
		<!-- Menu -->
		<div class="side-menu">
		<?php
			//imprimir la estructura y el menu navegador
			require('formulari/plantilla.php');
		?>
	
		</div>
		<!-- Main Content -->
		<div class="container-fluid" id="contenedor">
			<div class="side-body">



			<?php
			$dades = $_POST;

			//datos formulario html
			require('formulari/formulari.php');
			//datos php insert y tratar datos
			require('formulari/dades.php');
			//datos html mensaje confirmacion
			require('formulari/confirmacio.php');


			if(!isset($dades["nombre"])){
				imprimir_formulari();
			}else{
				//si se ha podido realizar el registro imprimir confirmacion
				if(inserir_dades()){
				imprimir_confirmacio($dades["nombre"]);
				//sino, volver a imprimir registro
				}else{
					imprimir_formulari();
				}
				
			}
			?>

		</div>;
		</div>
		</div>
		
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/javas.js"></script> 
	<script type="text/javascript">
					
  
</script>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!-- Include all compiled plugins (below), or include individual files as needed -->
	</body>
</html>
