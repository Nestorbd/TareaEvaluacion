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
</head>
<body>
    <?php include 'components/navbar.php';?>
<div class="container">          
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>APELLIDOS</th>
        <th>DIRECCION</th>
        <th>TELEFONO</th>
      </tr>
    </thead>
    <tbody>
        <?php
        require_once("../controllers/contactosController.php");
        $contactos = new ContactosController();
        $contacto = $contactos->getAll();
       foreach($contacto as $val) {

        ?>
      <tr>
        <td><?php  echo $val->id?></td>
        <td><?php  echo $val->nombre?></td>
        <td><?php  echo $val->apellidos?></td>
        <td><?php  echo $val->direccion?></td>
        <td><?php  echo $val->telefono?></td>      
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>
</body>
</html>