<?php
  session_start();
  if (isset($_SESSION)) {
    session_destroy();
  }
 

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $us=$_POST['nombre'];
    $ps=$_POST['pass'];

    require_once("conectar_utd.php");

    $consulta="select username, password, privilegio from usuarios where username='$us' and password='$ps'";
    //ejecutar la consulta
    $query=mysqli_query($conexion,$consulta) or die("Error al ejecutar la consulta");
    
    if($columna=mysqli_fetch_array($query)) 
     {
       $priv=$columna['privilegio'];
     }

    if (mysqli_num_rows($query)>0)
    {
        session_start();
        $_SESSION['user']=$us;
        $_SESSION['pass']=$ps;
       
        

        if ($priv=="admin")
          $_SESSION['priv']="admin";
        else if($priv=="estandar")
          $_SESSION['priv']="estandar";
       
          echo "<script> alert('Inicio de Sesion, - B I E N V E N I D O -');
                         location.href='menu.php'; 
               </script> ";
        
          //header('Location: menu.php');

    }
    else
     {
       echo "<script>
              window.alert('Usuario y/o Contraseña incorrectas, por favor verifique ... ');
              window.location.href='login.php';
            </script> ";   
     }
     
  }
  
?>
<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">	
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>LOGIN DE ACCESO</title>

  </head>
  <body>
  	 <h3 align="center"> ACCESO AL SISTEMA </h3>
  	<hr>
      <center>
        <img src="usua.png" width="25%" height="25%">
      </center>
    
        <!-- <form action="comprueba.php" method="post"> -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <table align="center">
             <tr>
               <td>Usuario: </td>
               <td><input type="text" name="nombre"  required ></td>
             </tr>
             <tr>
               <td>Contraseña: </td>
               <td><input type="password" name="pass" required ></td>
             </tr>
             <tr>
               <td><input type="submit" name="enviar" value="ENTRAR" ></td>
               <td><input type="reset" name="borrar" value="BORRAR" ></td>
             </tr>
          </table>
        </form>
      
    
    <hr>
  </body>
</html>