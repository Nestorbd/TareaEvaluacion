<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="./css/insertOrEditStyles.css">
</head>
<body>
<?php include 'components/navbar.php'; ?>

<div class="container">

<?php
require_once "../controllers/contactosController.php";
$contacto = new ContactosController();

if(!empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["direccion"]) && !empty($_POST["telefono"])){

    $data = array();
    $data["nombre"] = $_POST["nombre"];
    $data["apellidos"] = $_POST["apellidos"];
    $data["direccion"] = $_POST["direccion"];
    $data["telefono"] = $_POST["telefono"];

    $contacto->insert($data);
}

if(empty($_GET["actualizar"])){
?>
<form action="" method="post">
  <div class="form-group">
    <label for="name">Nombre:</label>
    <input type="text" class="form-control" name="nombre" placeholder="nombre" id="name">
  </div>
  <div class="form-group">
    <label for="surname">Apellidos:</label>
    <input type="text" class="form-control" name="apellidos" placeholder="apellidos" id="surname">
  </div>
  <div class="form-group">
    <label for="address">Dirección:</label>
    <input type="text" class="form-control" name="direccion" placeholder="C/" id="address">
  </div>
  <div class="form-group">
    <label for="phone">Teléfono:</label>
    <input type="text" class="form-control" name="telefono" placeholder="número de teléfono" id="phone">
  </div>
  <button type="submit" class="btn btn-primary">Añadir</button>
</form>

<?php
}else{
    $contacto = $contacto->getOne($_GET["actualizar"]);
    if (is_object($contacto)) {
?>
<form action="home.php" method="post">
<div class="form-group">
    <input type="number" class="form-control" name="id" placeholder="nombre" id="id" value="<?php echo $contacto->id?>">
  </div>
  <div class="form-group">
    <label for="name">Nombre:</label>
    <input type="text" class="form-control" name="nombre" placeholder="nombre" id="name" value="<?php echo $contacto->nombre?>">
  </div>
  <div class="form-group">
    <label for="surname">Apellidos:</label>
    <input type="text" class="form-control" name="apellidos" placeholder="apellidos" id="surname" value="<?php echo $contacto->apellidos?>">
  </div>
  <div class="form-group">
    <label for="address">Dirección:</label>
    <input type="text" class="form-control" name="direccion" placeholder="C/" id="address" value="<?php echo $contacto->direccion?>">
  </div>
  <div class="form-group">
    <label for="phone">Teléfono:</label>
    <input type="text" class="form-control" name="telefono" placeholder="número de teléfono" id="phone" value="<?php echo $contacto->telefono?>">
  </div>
  <button type="submit" class="btn btn-success">Editar</button>
</form>
<?php } } ?>
</div>
</body>
</html>