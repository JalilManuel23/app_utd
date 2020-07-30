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
        <title>MENÚ</title>
      </head>
      <body>
        <h3 align="center"> MENÚ PRINCIPAL</h3>
        <hr>
        <form action="acciones.php" method="post">
          <table align="center">
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
          </table>
            <input type="hidden" name="us" value="<? echo $us; ?>">
            <input type="hidden" name="ps" value="<? echo $ps; ?>">
        </form>
        <hr>  
        <a href='login.php'><h3 align=center >Cerrar sesión de <?php echo $us ?></h3></a>
      </body>
   </html> 


   
  
       
