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

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">   
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/estilos.css">
        <title>LOGIN DE ACCESO</title>

    </head>
    <body>
        <header>
            <div class="contenedor-header">
                <img src="../img/UTD.png" alt="Logo de la UTD">
                <h1>Acceso al Sistema</h1>
                <div></div>
            </div>
        </header>

            <!-- <img src="../img/usua.png"> -->
        
            <!-- <form action="comprueba.php" method="post"> -->
        <main>
            <div class="contenedor-form">
                <img src="../img/usua.png" alt="Usuarios">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <h2>Login</h2>
                    <div class="elemento-form">
                        <label for="nombre">Usuario</label>
                        <input type="text" name="nombre"  required class="input fontAwesome" placeholder="Usuario">
                    </div>
                    <div class="elemento-form">
                        <label for="nombre">Contraseña</label>
                        <input type="password" name="pass" required class="input" placeholder="Contraseña">
                    </div>
                    <input type="submit" name="enviar" value="ENTRAR" class="boton">
                    <input type="reset" name="borrar" value="BORRAR"  class="boton">
                </form>
            </div>
        </main>
    
  </body>
</html>