<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet"  href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/estil.css"/>
		<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
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
		</style>
		<?php
		function comprobarLogin(){
			try {
				$hostname = "localhost";
				$dbname = "walapop";
				$username = "root";
				$pw = "andrea1234";
				$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
			} catch (PDOException $e) {
				return false;
			exit;
			}
			try{
				$query = $pdo->prepare("select password FROM USUARIOS WHERE email ='".$_POST['email']."';");
				$query->execute();
						
				$row = $query->fetch();
				if($_POST['password'] == $row['password']){ 
								
			}} catch (PDOException $e){
				return false;
			}
			return true;
			unset($pdo); 
			unset($query);
			}
		
		if(isset($_POST['submit'])){
			$valido = comprobarLogin();	
			if($valido){
				//mostrar mensaje bajo 'entrar' dentro del panel
				}		
			}
		?>
	</head>
	<body>
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
					</form>	
				</div>
			</div>
		</div>
	</body>
</html>
