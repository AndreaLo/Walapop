<?php
  //connexió dins block try-catch:
  //  prova d'executar el contingut del try
  //  si falla executa el catch
function inserir_dades(){

$registre = $_POST;


if(isset($registre["nombre"])){

	$password=$registre["password"];
	$rePassword=$registre["rePassword"];
  $email = $registre["mail"];
  $EncPassword = hash('sha512', $password);
  //pasar a enter correctament si no dona problemes
  $codi = intval($registre['codi']);



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
    $query = $pdo->prepare("SELECT ID FROM USUARIOS WHERE EMAIL='".$email."'");
    $query->execute();
    $row = $query->fetch();

    //donem valor a id false o true si existeix id
    if(isset($row["ID"])){
      $comprobar_email= false;
    }else{
      $comprobar_email=true;
    }
 
//si el password coincide, el codigo es un numero entero, y el mail no existe
if (strcmp($password, $rePassword) == 0 && is_int($codi) &&  $comprobar_email) {
  	
  	 //preparem i executem la consulta
    $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
	  $query = $pdo->prepare("INSERT INTO USUARIOS (NOMBRE,APELLIDO,EMAIL,PASSWORD,CODIGO_POSTAL) VALUES ('".$registre['nombre']."','".$registre['apellidos']."','".$registre['mail']."','".$EncPassword."','".$registre['codi']."')");
	  $query->execute();

	 echo '<div class="espai alert alert-success" role="alert"><h4>Se ha realizado el registro correctamente</h4></div>';
   //devuelve cierto y desde la pagina registro se imprimira la confirmacion
   return true;
}else{

      //mensaje de error con los posibles fallos
  	 echo '<div class="espai alert alert-danger" role="alert"><h4><strong>No se ha efectuado el registro.</strong></h4><h4>* Contraseña erronea. <br>* Email ya existente. <br>* Codigo postal no es un número</h4></div>';
     //devuelve falso y desde la pagina registro se vuelve a imprimir el formulario
     return false;
  }
}
}

 
?>
