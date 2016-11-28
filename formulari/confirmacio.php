<?php

function imprimir_confirmacio($nombre){
	echo '<div class="container longitud">';
		echo '<div class="row">';
			echo '<div class="col-md-8 col-md-offset-1">'; 
						echo	'<div class="panel-group">';
				 			   echo '<h2>Vienvenido a Wallapop!</h2>';
							   echo' <div class="panel panel-success">';
							     echo' <div class="panel-heading">Hola '.$nombre.'!, tu cuenta ha sido creada correctamente.</div>';
									    echo'  <div class="panel-body">
												<ul>
													<li>Ya puedes acceder a tu panel de usuario y ver tu información de usuario</li>
													<br>
													<li>También podrás añadir información, tus imagen personal, dirección postal...</li>
													<br>
													<li>Podrás visualizar tus favoritos, poner a la venta productos y comprar</li>
													<br>
													<button type="button" class="btn btn-primary">Inicia session</button>

												</ul>';
									    echo '</div>';
							   echo' </div>';        
				        echo' </div>';
		    echo' </div>';
	    echo' </div>';
    echo '</div> <!-- /container -->';		
	
	//elminar datos de registro para no repetir entrada
	unset($_POST["nombre"]);
	unset($_POST["apellidos"]);
	unset($_POST["mail"]);
	unset($_POST["password"]);
	unset($_POST["codi"]);
			
}
?>