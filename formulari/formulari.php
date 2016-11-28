<?php

function imprimir_formulari(){


//echo '<h1> Registro en Wallapop </h1>';
	//valor inicial
	$registre["nombre"]="";
	$registre["apellidos"]="";
	$registre["mail"]="";
	$registre["password"]="";
	$registre["codi"]="";
	//si existe el post cargamos en value para que el usuario no tenga que volver a rellenar en caso
	//de error
if(isset($_POST["nombre"])){
	$registre["nombre"]=$_POST["nombre"];
	$registre["apellidos"]=$_POST["apellidos"];
	$registre["mail"]=$_POST["mail"];
	$registre["password"]=$_POST["password"];
	$registre["codi"]=$_POST["codi"];

}


 try {
    $hostname = "localhost";
    $dbname = "wallapop";
    $username = "root";
    $pw = "13246589";
    $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

    //comprobarcion de que no exista el email previamente
    $query = $pdo->prepare("SELECT * FROM CIUDADES ORDER BY NOMBRE");
    $query->execute();
    $row = $query->fetch();

echo '<div class="container espai-formulari">';
	echo '<div class="row">';
		echo '<div class="plantilla col-md-8 col-md-offset-1">';
			echo '<form action="registro.php" class="form-signin" method="POST">';
				echo '<h2 class="form-signin-heading">Formulario de registro</h2>';
					echo '<label for="inputEmail">Nombre</label>';
					echo '<div class="input-group"> ' ; 					        	
					echo '<span class="input-group-addon">';
					echo '<i class="fa fa-user fa" aria-hidden="true"></i>';
					echo '</span>';
					echo '<input type="text" aria-hidden="true" name="nombre" class="form-control" placeholder="Username" aria-describedby="basic-addon1" value="'.$registre["nombre"].'" required>';
					echo '</div>';
					echo '<br>';

					echo '<label for="inputEmail">Apellidos</label>';
					echo '<div class="input-group"> ';  					        	
					echo '<span class="input-group-addon">';
					echo '<i class="fa fa-user fa" aria-hidden="true"></i>';
					echo '</span>';
					echo '<input type="text" aria-hidden="true" name="apellidos" class="form-control" placeholder="Username" aria-describedby="basic-addon1" value="'.$registre["apellidos"].'" required>';
					echo '</div>';
					echo '<br>';

					echo '<label for="inputEmail">email</label>	';						
					echo '<div class="input-group"> ' ; 					        	
					echo '<span class="input-group-addon">';
					echo '<i class="fa fa-envelope fa" aria-hidden="true"></i>';
					echo '</span>';
					echo '<input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Email address" value="'.$registre["mail"].'" required autofocus>';

					echo '</div>';
					echo '<br>';

					echo '<label for="inputEmail">Password</label>';
					echo '<div class="input-group">'; 					        	
					echo '<span class="input-group-addon">';
					echo '<i class="fa fa-lock fa-lg" aria-hidden="true"></i>';
					echo '</span>';
					echo '<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required autofocus>';
					echo '</div>';		
					echo '<br>';

					echo '<label for="inputEmail">Repetir Password</label>';
					echo ' <div class="input-group">';   					        	
					echo '<span class="input-group-addon">';
					echo '<i class="fa fa-lock fa-lg" aria-hidden="true"></i>';
					echo '</span>';
					echo '<input type="password" id="inputPassword" name="rePassword" class="form-control" placeholder="Password" required autofocus>';
					echo '</div>';
					echo '<br>';

					echo '<label for="inputEmail">Codigo postal</label>';
					echo '<div class="input-group"> ' ; 					        	
					echo '<span class="input-group-addon">';
					echo '<i class="fa fa-globe" aria-hidden="true"></i>';
					echo '</span>';
					echo '<select class="form-control" name="codi" aria-hidden="true" id="codi" required autofocus>';
					echo '<option name="option" value="" ></option>';
					while ( $row ) {
    
   						 echo '<option name="option" value="'.$row['CODIGO_POSTAL'].'"  required autofocus>'.$row['CODIGO_POSTAL'].' '.$row['NOMBRE'].'</option>';
   						 $row = $query->fetch();
  					}					
  					echo '</select>';
  					  //eliminem els objectes per alliberar memòria 
				    unset($pdo); 
				    unset($query);

					echo '</div>';	
					echo '<br>';

					echo ' <button class="btn btn-lg btn-primary btn-block" type="submit" data-target="#myModal">Sign in</button>';
					echo ' <br>';
			echo '</form>';

		echo '</div>';
	echo '</div>';
echo '</div> <!-- /container -->';

}
?>