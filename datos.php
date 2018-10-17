<?php
include('conexion.php');
$obj = isset($_POST['datos']) ? $_POST['datos']:"Nada";

$id = [];

$long = count($obj);
for ($i=0; $i < $long; $i++) {

  $id        = $obj[$i]['id'];
  $nombre    = $obj[$i]['nombre'];
  $apellidos = $obj[$i]['sapellidos'];
  $usuario   = $obj[$i]['susuario'];

  $consulta = "SELECT COUNT(*) fila FROM usuarios WHERE CLV_NOT = '$id'";
  $valida = mysqli_query($db,$consulta);
  $fila = mysqli_fetch_assoc($valida);

  if ($fila['fila'] == 0) {
    $query = "INSERT INTO notificadores (CLV_NOT, NOMBRE, APELLIDOPA, APELLIDOMA, USUARIO, PASSCODE)
              VALUES ('$id','$nombre','$apellidos',null,'$usuario','1234')";
    $result = mysqli_query($db,$query);

    if ($result == false) {
      echo "Fallo";
    }

  }else {
    echo "Replica";
  }

}
mysqli_close($db);
echo "OK";




 ?>
