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
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>MENÚ</title>
</head>

<body>
    <header class="bg-dark">
        <div class="container">
            <nav class="row navbar-dark">
                <a class="col-md-4 d-flex justify-content-md-start justify-content-center" href="#"><img src="../img/UTD.png"
                        alt="Logo UTD" /></a>
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    <h3 class="titulo">
                        Menú
                    </h3>
                </div>
            </nav>
        </div>
    </header>
    <form action="acciones.php" method="post" class="container">
        <div class="cont-opciones">
            <p class="row d-flext justify-content-center">
                ¿Qué desea realizar?
            </p>
            <div class="row  opciones">
                <?php
        if ($priv=="admin")
        {
        ?>
                <div class="p-opciones d-flex flex-column align-items-center col-md-3 col-6">
                    <input type="radio" name="opcion" id="alta">
                    <label for="alta" id="lbl-alta"
                        class="d-flex justify-content-center align-items-center icon-plus-square"></label>
                    <p>Alta</p>
                </div>

                <div class="p-opciones d-flex flex-column align-items-center col-md-3 col-6">
                    <input type="radio" name="opcion" id="baja">
                    <label for="baja" id="lbl-baja"
                        class="d-flex justify-content-center align-items-center icon-trash"></label>
                    <p>Baja</p>
                </div>

                <div class="p-opciones d-flex flex-column align-items-center col-md-3 col-6">
                    <input type="radio" name="opcion" id="consulta">
                    <label for="consulta" id="lbl-consulta"
                        class="d-flex justify-content-center align-items-center icon-search-1"></label>
                    <p>Consulta</p>
                </div>
                <div class="p-opciones d-flex flex-column align-items-center col-md-3 col-6">
                    <input type="radio" name="opcion" id="modificar">
                    <label for="modificar" id="lbl-modificar"
                        class="d-flex justify-content-center align-items-center icon-pencil-square"></label>
                    <p>Modificación</p>
                </div>
                <?php
        }
        else if ($priv=="estandar")
        {
        ?>
                <div class="p-opciones d-flex flex-column align-items-center">
                    <input type="radio" name="opcion" id="consulta">
                    <label for="consulta" id="lbl-consulta"
                        class="d-flex justify-content-center align-items-center icon-search-1"></label>
                    <p>Consulta</p>
                </div>
                <?php
        }
        ?>
            </div>
        </div>

        <div class="row d-flext flex-column align-items-center cont-opciones">
            <p>Seleccione una tabla</p>
            <select name="tabla" required>
                <option value="a">Alumnos</option>
                <option value="c">Contactos</option>
                <option value="u">Usuarios</option>
            </select>
        </div>

        <div class="row d-flext  justify-content-around cont-opciones fila-botones">
            <input class="boton col-md-3" type="submit" name="enviar" value="Enviar">
            <input class="boton col-md-3" type="reset" name="borrar" value="Borrar">
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
    <div class="container">
        <div class="row d-flex justify-content-center">
            <a class="icon-sign-out cerrar-sesion" href="login.php">Cerrar Sesión de <?php echo $us ?></a>
        </div>
    </div>
</body>

</html>