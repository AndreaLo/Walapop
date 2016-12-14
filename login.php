<?php
	session_start();
	require('funciones.php');
	if(!isset($_SESSION['permiso'])){
		$_SESSION['permiso']=null;
		$_SESSION['email']=null;
	}
	if(isset($_POST['submit'])){
		comprobarLogin();
		if(!$_SESSION['permiso']){
			echo "<script>alert('Alguno de los datos introducidos es incorrecto, vuelva a intentarlo');</script>";
		}
		else{
			$_SESSION['email']=$_POST['email'];
			header('Location: index.php');
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet"  href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/estil.css"/>
		<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/principal.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<style>
			.loginPanel{
					padding-left: 30%;
					padding-right: 30%;
					padding-top: 10%;
					padding-bottom: 20%;
					
				}
			.tituloPanel{
					text-align: center;
				}
			#nuevoRegistro{
				float: right;							
				}
			.text-warning{
				margin-top: 12% !important;
				margin-bottom: 0px !important;
				padding-bottom: 0px !important;
				border-bottom: 0px !important;
			}
		</style>
	</head>
	<body>
		<div class="row">
		<!-- Menu -->
		<div class="side-menu">
		<?php
			require('menuComun.php');
		?>
		</div>
		<!-- Main Content -->
			
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			<div class="side-body">
			
				<div class="loginPanel">
					<div class="panel panel-default">
						<div class="panel-body">
							<form action="" method="POST">
								<p class="tituloPanel"><strong>ENTRAR</strong></p>
								<div class="form-group">
									<label for="email">Email address:</label>
									<input type="email" name="email" class="form-control" id="email">
								</div>
								<div class="form-group">
									<label for="pwd">Password:</label>
									<input type="password" name="password" class="form-control" id="pwd">
								</div>
								<button type="submit" name="submit" class="btn btn-warning">Enviar</button>
								<a href="registro.php" id='nuevoRegistro'><p class="text-warning">Me quiero registrar!</p></a>
							</form>	
						</div>
					</div>
				</div>
			</div>
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
