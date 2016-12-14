<?php	
	function abrirConexion(){
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
	
	function cantidadProductos(){
		$email = $_SESSION['email'];
		$pdo = abrirConexion();
		
		$query = $pdo->prepare("SELECT ID FROM USUARIOS where email ='".$email."'");
		$query->execute();

		$row = $query->fetch();
		while ( $row ) {		
			$codi = $row["ID"];
			$row = $query->fetch();
		}
		$query = $pdo->prepare("SELECT count(ID_PRODUCTO) FROM PRODUCTOS where ID_VENDEDOR ='".$codi."'");
		$query->execute();
		$row = $query->fetch();

		while ( $row ) {
			
			$cantidad=$row["count(ID_PRODUCTO)"];
			$row = $query->fetch();
		}
		
		unset($pdo); 
		unset($query);

		$cantidad = '<span class=""></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Productos '.$cantidad.'</a>';	
		return $cantidad;
	}

	function mostrarNombreUsu(){
			$email = $_SESSION['email'];
			$pdo = abrirConexion();
			
			$query = $pdo->prepare("SELECT NOMBRE,ID FROM USUARIOS where email ='".$email."'");
			$query->execute();

			$row = $query->fetch();
			while ( $row ) {
				
				$nombre= '<a href="usuario.php" class="usuario"><h4><span class="glyphicon glyphicon-user"></span><b>'.$row["NOMBRE"].'</b></h4>';	
				$codi = $row["ID"];
				$row = $query->fetch();
			}
			unset($pdo); 
			unset($query);
			return $nombre;
	}

	function mostrarCategoria(){
		$pdo = abrirConexion();
		$query = $pdo->prepare("select id, nombre FROM CATEGORIAS;");
		$query->execute();
		
		$row = $query->fetch();
		while ( $row ) {
			echo "<li><a href='categoria.php?id=".$row['id']."'>".$row['nombre']."</a></li>";	
			$row = $query->fetch();
		}
		unset($pdo); 
		unset($query);
	}
	//
	function mostrarProductosPorCategoria($id){
		$pdo = abrirConexion();
		//comprobarcion de que no exista el email previamente
		$query = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE id_categoria = ".$id." ORDER BY fecha_publicacion desc"); 
		$query->execute();
		$row = $query->fetch();
		
		echo '<div class="flex">';
		while ( $row ) {
			echo '<div class="grupo separacion altura1">';
			echo '<img src="'.$row["IMAGEN"].'" alt="'.$row["TITULO"].'" width="250" height="250" class="separacion"/>'."\n";
			echo '<h4>'.$row["TITULO"].'</h4>'."\n";
			echo '<strong>'.$row["DESCRIPCION"].'</strong>'."\n";
			echo '<a href="ficha.php?id='.$row["ID_PRODUCTO"].'" >ver</a>';
			echo '</div>';
		$row = $query->fetch();
		}	
		echo '</div>';	
	}
	function mostrarProductosPorFecha(){
		$pdo = abrirConexion();
		//comprobarcion de que no exista el email previamente
		$query = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE IMAGEN<>'null' ORDER BY fecha_publicacion desc"); //order by fecha desc
		$query->execute();
		$row = $query->fetch();

		echo '<div class="flex">';
		while ( $row ) {
			echo '<div class="grupo separacion altura1">';
   			echo '<img src="'.$row["IMAGEN"].'" alt="'.$row["TITULO"].'" width="250" height="250" class="separacion"/>'."\n";
   			echo '<h4 class="precio">'.$row["PRECIO"].' €</h4>'."\n";
   			echo '<h4>'.$row["TITULO"].'</h4>'."\n";
   			echo '<p><strong>'.$row["DESCRIPCION"].'</strong></p>'."\n";
   			echo '</div>';
			$row = $query->fetch();
		}	
		echo '</div>';	
	}
	function comprobarLogin(){
		$pdo = abrirConexion();
		try{
			$query = $pdo->prepare("select password FROM USUARIOS WHERE email ='".$_POST['email']."';");
			$query->execute();
					
			$row = $query->fetch();
			if($row==null){
				echo "mail null";
				$_SESSION['permiso']=false;
				}		
			$EncPassword = hash('sha512', $_POST['password']);
			
			if($EncPassword == $row['password']){ 
				$_SESSION['permiso']=true;
			}
			else $_SESSION['permiso']=false;
		}catch (PDOException $e){
			$_SESSION['permiso']=false;
		}
		unset($pdo); 
		unset($query);
	}	

	function mostrarBusqueda($busqueda){
		$pdo = abrirConexion();
		//comprobarcion de que no exista el email previamente
		$query = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE lower(TITULO) like lower('%$busqueda%') or lower(TITULO) like lower('$busqueda%') or lower(TITULO) like lower('$busqueda%')"); //order by fecha desc
		$query->execute();
		$row = $query->fetch();		
		if(!isset($row["NOMBRE"])){
			echo '<div class="notProducts"><br><h1>[ No se han encontrado resultados]</h1></div>';
			mostrarProductosPorFecha();	
		}else{
			echo '<div class="flex">';
			while ( $row ) {
				echo '<div class="grupo separacion altura1">';
				 //echo '<div class="grupo separacion">';
	   			echo '<img src="'.$row["IMAGEN"].'" alt="'.$row["TITULO"].'" width="250" height="250" class="separacion"/>'."\n";
	   			echo '<h4 class="precio">'.$row["PRECIO"].' €</h4>'."\n";
	   			echo '<h4>'.$row["TITULO"].'</h4>'."\n";
	   			echo '<p><strong>'.$row["DESCRIPCION"].'</strong></p>'."\n";
	   			echo '</div>';
				$row = $query->fetch();
			}	
			echo '</div>';	
		}
	}
	function mostrarNuevoZona($email){
		$pdo = abrirConexion();
		
		//En primer lugar obtengo el codigo postal del usuario a través del email (Obtengo un dato)
		$query = $pdo->prepare("SELECT CODIGO_POSTAL FROM USUARIOS WHERE email = '".$email."'"); 
		$query->execute();
		$row = $query->fetch();
		//Ahora obtengo los últimos 9 productos de la zona comparando el codigo postal
		$query2 = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE CODIGO_POSTAL = ".$row['CODIGO_POSTAL']." ORDER BY FECHA_PUBLICACION DESC"); 
		$query2->execute();
		$row2 = $query2->fetch();
		
		echo '<div class="flex">';
		while ( $row2 ) {
			echo '<div class="grupo separacion altura1">';
   			echo '<img src="'.$row2["IMAGEN"].'" alt="'.$row2["TITULO"].'" width="250" height="250" class="separacion"/>'."\n";
   			echo '<h4 class="precio">'.$row2["PRECIO"].' €</h4>'."\n";
   			echo '<h4>'.$row2["TITULO"].'</h4>'."\n";
   			echo '<p><strong>'.$row2["DESCRIPCION"].'</strong></p>'."\n";
   			echo '</div>';
			$row2 = $query2->fetch();
		}	
		echo '</div>';	
		
	}
		
	function mostrarFicha($id){
		$pdo = abrirConexion();
		
		//Obtenemos todos los datos del producto seleccionado
		$query = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE ID_PRODUCTO = ".$id); 
		$query->execute();
		$row = $query->fetch();
		
		//Obtenemos codigo postal a través del vendedor y a través del codigo postal obtenemos el nombre de la ciudad
		$query2 =$pdo->prepare("SELECT * FROM CIUDADES WHERE codigo_postal = (SELECT codigo_postal FROM USUARIOS WHERE id=".$row['ID_VENDEDOR'].")");
		$query2->execute();
		$row2 = $query2->fetch();
		
		//Obtenemos datos vendedor
		$query3 =$pdo->prepare("SELECT * FROM USUARIOS where ID ='".$row['ID_VENDEDOR']."'");
		$query3->execute();
		$row3 = $query3->fetch();
		
		//Obtenemos el total de productos que tiene actualmente a la venta el usuario vendedor
		$query4 =$pdo->prepare("SELECT count(ID_PRODUCTO) FROM PRODUCTOS where ID_VENDEDOR ='".$row['ID_VENDEDOR']."'");
		$query4->execute();
		$row4 = $query4->fetch();
		
		while ( $row4 ) {			
			$cantidad=$row4["count(ID_PRODUCTO)"];
			$row4 = $query4->fetch();
		}
		
		
		//datos producto
		echo '<div class="mitadImagen">';
			echo '<img src="'.$row["IMAGEN"].'" class="img-rounded" alt="'.$row["TITULO"].'" width="100%" height="100%"/>'."\n";
		echo '</div>';
		echo '<div class="mitadDatos">';
			echo '<div class="panel panel-default">';
				echo '<div class="panel-body">';
					echo '<div class="encabezado">';
						echo '<h4 id="precioEnFicha">'.$row["PRECIO"].' €</h4>'."\n";
						echo '<p id="visitasFavorito"><span class="glyphicon glyphicon-eye-open"></span>&nbsp&nbsp&nbsp'; 
						echo '<span class="glyphicon glyphicon-heart-empty"></span></p>'; //corazón lleno .glyphicon .glyphicon-heart
					echo '</div>';
					echo '<h4>'.$row["TITULO"].'</h4>'."\n";
					echo '<p>'.$row["DESCRIPCION"].'</p>'."\n";
					echo '<p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp&nbsp'.$row2["CODIGO_POSTAL"].', '.$row2["NOMBRE"].'</p>';
					echo '<p>Comparte este producto con tus amigos</p><p><i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp&nbsp';
					echo '<i class="fa fa-twitter-square" aria-hidden="true"></i>&nbsp&nbsp<i class="fa fa-pinterest-square" aria-hidden="true"></i></p>';
				echo '</div>';
			echo '</div>';
		//echo '</div>';
		//datos vendedor
		echo '<div class="panel panel-default">';
			echo '<div class="panel-body">';
				//echo '<div class="encabezado">';
				if($row3["FOTO"]!= null){
					echo "<p><img src='".$row3["FOTO"]."' class='avatar'  width='40px' height='40px'/>";
				}else{
					echo "<p><span class='glyphicon glyphicon-search'></span>";
				}
				echo '&nbsp&nbsp'.$row3["NOMBRE"].'</p>';		
				//echo '</div>';
				echo $cantidad.'&nbsp productos';
			echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	
?>
