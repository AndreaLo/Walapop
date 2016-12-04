<?php	
	


	function cantidadProductos(){

		

			$email = $_SESSION['email'];
			try {
				$hostname = "localhost";
				$dbname = "wallapop";
				$username = "root";
				$pw = "13246589";
				$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");

			
			} catch (PDOException $e) {
				 echo "El acceso a la DDBB a fallado: " . $e->getMessage() . "\n";
				 exit;
			}
			
			$query = $pdo->prepare("SELECT ID FROM USUARIOS where email ='".$email."'");
			$query->execute();
			
			

			$row = $query->fetch();
			while ( $row ) {
				
				$codi = $row["ID"];
				$row = $query->fetch();
			}

			$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
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
			try {
				$hostname = "localhost";
				$dbname = "wallapop";
				$username = "root";
				$pw = "13246589";
				$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
			
			} catch (PDOException $e) {
				 echo "El acceso a la DDBB a fallado: " . $e->getMessage() . "\n";
				 exit;
			}
			
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
			try {
			$hostname = "localhost";
			$dbname = "wallapop";
			$username = "root";
			$pw = "13246589";
			$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
		
		} catch (PDOException $e) {
			echo "El acceso a la DDBB a fallado: " . $e->getMessage() . "\n";
			exit;
		}
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
		try {
			$hostname = "localhost";
			$dbname = "wallapop";
			$username = "root";
			$pw = "13246589";
			$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
		
		} catch (PDOException $e) {
			echo "El acceso a la DDBB a fallado: " . $e->getMessage() . "\n";
			exit;
		}
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
			echo '</div>';
		$row = $query->fetch();
		}	
		echo '</div>';	
	}
	function mostrarProductosPorFecha(){
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
		$query = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE IMAGEN<>'null' ORDER BY fecha_publicacion desc"); //order by fecha desc
		$query->execute();
		$row = $query->fetch();

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
	function comprobarLogin(){
		try {
			$hostname = "localhost";
			$dbname = "wallapop";
			$username = "root";
			$pw = "13246589";
			$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
		
		} catch (PDOException $e) {
			 $_SESSION['permiso']=false;
			exit;
		}
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
?>