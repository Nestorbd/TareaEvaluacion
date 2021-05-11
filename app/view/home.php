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

  <link rel="stylesheet" href="./css/homeStyles.css">
</head>

<body>
  <?php include 'components/navbar.php'; ?>
  <div class="container">

    <form action="" method="get">
      <div class="form-group">
        <label for="search_id" id="search">Buscar:</label>
        <input type="number" name="search_id" class="form-control" placeholder="Buscar por id" id="search_id" value="<?php echo $search_id; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>


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

        if(!empty($_POST["id"]) && !empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["direccion"]) && !empty($_POST["telefono"])){

          $data = array();
          $data["id"] = $_POST["id"];
          $data["nombre"] = $_POST["nombre"];
          $data["apellidos"] = $_POST["apellidos"];
          $data["direccion"] = $_POST["direccion"];
          $data["telefono"] = $_POST["telefono"];
      
          $contactos->update($data);
      }

        if (!empty($_GET["eliminar"])) {
          $contactos->delete($_GET["eliminar"]);
        }

        if (empty($_GET["search_id"])) {
          $contacto = $contactos->getAll();
          foreach ($contacto as $val) {
        ?>
            <tr>
              <td><?php echo $val->id ?></td>
              <td><?php echo $val->nombre ?></td>
              <td><?php echo $val->apellidos ?></td>
              <td><?php echo $val->direccion ?></td>
              <td><?php echo $val->telefono ?></td>
              <td>
                <a class="btn edit btn-success" href="insertOrEdit.php?actualizar=<?php echo $val->id ?>">editar</a>
                <a class="btn delete btn-danger" href="home.php?eliminar=<?php echo $val->id ?>">eliminar</a>
              </td>
            </tr>
          <?php }
        } else {
          $contacto = $contactos->getOne($_GET["search_id"]);
          if (is_object($contacto)) {
          ?>
            <tr>
              <td><?php echo $contacto->id ?></td>
              <td><?php echo $contacto->nombre ?></td>
              <td><?php echo $contacto->apellidos ?></td>
              <td><?php echo $contacto->direccion ?></td>
              <td><?php echo $contacto->telefono ?></td>
            </tr>
        <?php }
        } ?>
      </tbody>
    </table>
  </div>
</body>

</html>