<?php
  session_start();
  if (!isset($_SESSION['user'])) 
  {
		header("location: login.php");
	}
  else 
  {
    $us=$_SESSION['user'];
    $ps=$_SESSION['pass'];
    $priv=$_SESSION['priv'];
	}
       
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>MENÚ</title>
</head>

<body>
    <header class="bg-dark">
        <div class="container">
            <nav class="row navbar-dark">
                <a class="col-md-4 text-center" href="#"><img src="../img/UTD.png" alt="Logo UTD" /></a>
                <h3 class="col-md-4 titulo">Menú</h3>
            </nav>
        </div>
    </header>
    <form action="acciones.php" method="post" class="container">
        <div class="row d-flex justify-content-around align-items-center opciones">
          
          <label for="alta">f</label>
          <input type="radio" name="opcion" id="alta">

          <label for="baja"></label>
          <input type="radio" name="opcion" id="baja">

          <label for="consulta"></label>
          <input type="radio" name="opcion" id="consulta">

          <label for="modificar"></label>
          <input type="radio" name="opcion" id="modificar">
          
        </div>

        <div class="row">
          
        </div>

        <div class="row">
          <input type="submit" name="enviar" value="Enviar">
          <input type="reset" name="borrar" value="Borrar">
        </div>
        <!-- <table align="center">
            <tr>
              <td>¿Que deseas realizar? : </td>
              <td>
                  <select name="operacion" required >
                    <?php 
                    if ($priv=="admin")
                      {
                        echo "<option value='a'>Alta</option>"; 
                        echo "<option value='b'>Baja</option>"; 
                        echo "<option value='c'>Consulta</option>"; 
                        echo "<option value='m'>Modificacion</option>";
                      }
                      else if ($priv=="estandar")
                      { 
                        echo "<option value='c'>Consulta</option>"; 
                      } 
                      ?>
                    </select>
              </td>
            </tr>
            <tr>
              <td>¿A que tabla? : </td>
              <td><select name="tabla" required>
                      <option value="a">Alumnos</option>
                      <option value="c">Contactos</option>
                      <option value="u">Usuarios</option>
                  </select>
              </td>
            </tr>
            <tr>
              <td><input type="submit" name="enviar" value="Enviar"></td>
              <td><input type="reset" name="borrar" value="Borrar"></td>
            </tr>
          </table> -->
        <input type="hidden" name="us" value="<? echo $us; ?>">
        <input type="hidden" name="ps" value="<? echo $ps; ?>">
    </form>
    <a href='login.php'>
        <h3 align=center>Cerrar sesión de <?php echo $us ?></h3>
    </a>
</body>

</html>