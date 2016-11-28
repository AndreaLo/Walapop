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

echo '<div class="container longitud">';
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
					echo '<input type="text" aria-hidden="true" name="codi" class="form-control" placeholder="Username" aria-describedby="basic-addon1" value="'.$registre["codi"].'" required autofocus>';
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