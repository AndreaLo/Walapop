 
<?php

function conexio(){

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
						  return $pdo;

}

function printar_usuari($pdo,$usuari){

						    //comprobarcion de que no exista el email previamente

						    $query = $pdo->prepare("SELECT * FROM USUARIOS WHERE EMAIL = '".$usuari['email']."'");
						    $query->execute();
						    $row = $query->fetch();

						  
						  
						
						 	//imprimir foto de usuario
							echo '<div class="contenedorFoto">';
							if($row["FOTO"]==null){
								
								echo '<h1><img src="images/user.png" alt="imagen-perfil" width="250" height="250" class="foto"/> </h1>';

							}else{
								echo '<h1><img src="'.$row["FOTO"].'" alt="'.$row["NOMBRE"].'" width="250" height="250" class="foto"/> </h1>';

							}
							while ( $row ) {

							
							echo '<br><p><h2>'.$row["NOMBRE"].'</h2></p>';
							//echo $row["FOTO"];
							//sacamos le id para las demás comprobaciones 
    						$codi = $row["ID"];
   						 	$row = $query->fetch();
  							}
  							echo '</div>';

  							return $codi;

}

function printar_CantitatprodVenta($pdo,$codi){

  							//inicio contenedor contadores
  							echo '<div class="contadores">';
  							//nueva consulta contamos cantidad de productos vendidos
  							
  							$query = $pdo->prepare("SELECT count(NOMBRE) FROM PRODUCTOS WHERE ID_VENDEDOR = '".$codi."'");
						    $query->execute();
						    $row = $query->fetch();

						    echo '<div>';
						    while ( $row ) {
						    	echo '<p class="numeros">'.$row["count(NOMBRE)"].'</p>';
						    	    						
   						 	$row = $query->fetch();
  							}
  							echo '<p><b>En venta</b></p>';
  							echo '</div>';



}

function printar_Cantitatvenuts($pdo,$codi){
  							//$query = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE ID_VENDEDOR = '".$codi."' and VENDIDO = 1");
  							//consulta para imprimir productos venuts
  						
  							$query = $pdo->prepare("SELECT count(NOMBRE) FROM PRODUCTOS WHERE ID_VENDEDOR = '".$codi."' and VENDIDO = 1");
						    $query->execute();
						    $row = $query->fetch();

						    echo '<div>';
						    while ( $row ) {
						    
    							echo '<p class="numeros">'.$row["count(NOMBRE)"].'</p>';
    							echo '<p><b>Vendido</b></p>';

   							 echo '</div>';
						    	    						
   						 	$row = $query->fetch();
  							}

}

function printar_CantitatValoraciones($pdo,$codi){
  								//$query = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE ID_VENDEDOR = '".$codi."' and VENDIDO = 1");
  							//consulta para imprimir Favoritos
  						
  							$query = $pdo->prepare("SELECT count(ID_VENDEDOR) FROM PRODUCTOS WHERE ID_VENDEDOR = '".$codi."' and COMENTARIO_COMPRADOR is not null");
						    $query->execute();
						    $row = $query->fetch();

						    echo '<div>';
						    while ( $row ) {
						    	
    							echo '<p class="numeros">'.$row["count(ID_VENDEDOR)"].'</p>';
    							echo '<p><b>Valoraciones</b></p>';

   							 echo '</div>';
						    	    						
   						 	$row = $query->fetch();
  							}

}

function printar_Cantitatfavoritos($pdo,$codi){
  								//$query = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE ID_VENDEDOR = '".$codi."' and VENDIDO = 1");
  							//consulta para imprimir Favoritos
  							
  							$query = $pdo->prepare("SELECT count(ID_PRODUCTO) FROM FAVORITOS WHERE ID_USUARIO = '".$codi."'");
						    $query->execute();
						    $row = $query->fetch();

						    echo '<div>';
						    while ( $row ) {
						    	
    							echo '<p class="numeros">'.$row["count(ID_PRODUCTO)"].'</p>';
    							echo '<p><b>Favoritos</b></p>';

   							 echo '</div>';
						    	    						
   						 	$row = $query->fetch();
  							}


  							//final contenedor de contadores
  							echo '</div>';
}

function printar_productesVenta($pdo,$codi){

							//IMPRIMIR BOTON PARA AGREGAR PRODUCTOS QUE ESTA EN MEDIO DE LA PANTALLA
  							echo '<div class="boton"><div class="agregar-productos"><p>+</p></div></div>';
  				
  							//consulta para imprimir productos en venta
  						
  							$query = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE ID_VENDEDOR = '".$codi."' ");
						    $query->execute();
						    $row = $query->fetch();

						    if(!isset($row["PRECIO"])){
						    	echo '<div class="notProducts"><br><h1>[ No hay productos a la venta]</h1></div>';
						    }
						    echo '<div class="flex">';

						    while ( $row ) {
						    	echo '<div class="grupo separacion altura1">';
    						 //echo '<div class="grupo separacion">';
   							 echo '<img src="'.$row["IMAGEN"].'" alt="'.$row["TITULO"].'" width="250" height="250" class="separacion"/>'."\n";
   							 echo '<h4>'.$row["PRECIO"].'€ </h4>'."\n";
   							 echo '<h4>'.$row["TITULO"].'</h4>'."\n";
   							 echo '<strong>'.$row["DESCRIPCION"].'</strong>'."\n";
   							 echo '</div>';
						    	    						
   						 	$row = $query->fetch();
  							}
 }
 
?>