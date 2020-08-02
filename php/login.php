<?php
  session_start();
  if (isset($_SESSION)) {
    session_destroy();
  }
 
  $mensaje = 'ninguno';

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

        $mensaje = 'correcto';
    }
    else
     {
        $mensaje = 'incorrecto';
     }
     
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
    <title>LOGIN DE ACCESO</title>

</head>

<body>
    <header class="bg-dark">
        <div class="container">
            <nav class="row navbar-dark">
                <a class="col-md-4 d-flex justify-content-md-start justify-content-center" href="#"><img src="../img/UTD.png" alt="Logo UTD" /></a>
                <h3 class="col-md-4 titulo">Acceso al Sistema</h3>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row contenedor-form justify-content-center align-items-center">
            <form class="formulario d-flex flex-column justify-content-around align-items-center col-md-6 col-11" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <img class="" src="../img/usua.png" alt="Usuarios">
                <h2>Login</h2>
                <div class="elemento-form">
                    <label for="nombre" class="icon-user">Usuario</label>
                    <input type="text" name="nombre" required class="input" placeholder="Usuario">
                </div>
                <div class="elemento-form">
                    <label for="nombre" class="icon-lock">Contraseña</label>
                    <input type="password" name="pass" required class="input" placeholder="Contraseña">
                </div>
                <div class="elemento-form">
                    <input type="submit" name="enviar" value="ENTRAR" class="boton">
                    <input type="reset" name="borrar" value="BORRAR" class="boton">
                </div>
            </form>
        </div>
    </div>
</body>
<?php 
if($mensaje == 'incorrecto'){
?>
    <script>
        function alerta(){
            swal({
                title: "Usuario o contraseña incorrectos",
                text: "Por favor verifique",
                icon: "error",
            });
        }
        alerta();                   
    </script>
<?php
}elseif($mensaje == 'correcto'){
?>
    <script>
        function alerta(){
            swal({
                title: "¡Sesión iniciada correctamente!",
                text: "De click en el botón para continuar",
                icon: "success",
            }).then(function() {
                window.location = "menu.php";
            });
        }
        alerta();                   
    </script>
<?php
}
?>
</html>