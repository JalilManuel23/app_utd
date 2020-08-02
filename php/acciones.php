<?php
  session_start();
	if (!isset($_SESSION['user'])) {
		header("location: login.php");
	}
	else {
		$us=$_SESSION['user'];
		$priv=$_SESSION['priv'];
  }
  
  require_once("conectar_utd.php");

  $ope=$_POST['opcion'];
  $tab=$_POST['tabla'];

  switch($ope){
    case 'a': $titulo = 'Alta';break;
    case 'b': $titulo = 'Baja';break;
    case 'c': $titulo = 'Consulta';break;
    case 'm': $titulo = 'Modificación';break;
  }

  $print = ($ope == 'c') ? TRUE :  FALSE;

  if (!$conexion)
  	die("Fallo la conexion verifique".mysqli_connect_error());
  else if ($ope!='a') {
      switch($tab){
        case 'a':
          $seccion = 'Alumnos';
          $consulta="select matricula,nombre, especialidad from alumnos";
          $encabezado = ['#', 'Nombre', 'Especialidad'];
          $parametro = 'matricula';
        break;
        case 'c':
          $seccion = 'Contactos';
          $consulta="select id, nombre, apellidos, direccion, telefono, email from contactos";
          $encabezado = ['#', 'Nombre', 'Apellidos', "Dirección", "Telefono", "Email"];
          $parametro = 'id';
        break;
        case 'u':
          $seccion = 'Usuarios';
          $consulta= ($priv=='estandar') ? "select username, privilegio from usuarios" : "select username, password, privilegio from usuarios";
          $encabezado = ($priv=='estandar') ? ['Username', 'Privilegio'] : ['Username', 'Password', 'Privilegio'];
          $parametro = 'username';
        break;
      }

      include 'acciones.view.php';
      
      $query=mysqli_query($conexion,$consulta);
      echo "<h4>Registro de \t".$seccion."</h4>";  
      echo "<div class='content'>";
        echo "<table class='table'>";
            foreach ($encabezado as $th){
              echo "<th>" . $th . "</th>";
            }
        while ($registros=mysqli_fetch_row($query)){ 
            echo "<tr>";
              foreach ($registros as $cambio){
                echo "<td>".$cambio."</td>";   
              }
              if($ope == 'b'){
                echo "<td><a href = 'eliminar.php?" . $parametro . "=".$registros[0]."&tab=".$tab."' class='boton-tabla btn-borrar'>Eliminar</a></td>";
              }elseif($ope == 'm'){
                echo "<td><a href = 'actualizar.php?". $parametro ."=".$registros[0]."&tab=".$tab."' class='boton-tabla btn-modificar'>Modificar</a></td>";
              }
            echo "</tr>";
        }
        echo "</table>";
      echo "</div>";
      $numregistros=mysqli_num_rows($query);
      echo "<div class='row d-flex justify-content-center'><h5 class='col-8 text-center num-regs'> La cantidad de registros encontrados es: $numregistros</h5></div>";
   }else if ($ope=='a'){
      $seccion = 'Alumnos';

      include 'acciones.view.php';
      if ($tab=='a'){
        ?>
<form method="post" action="insertar.php"
    class="formulario d-flex flex-column justify-content-around align-items-center col-md-6 col-11">
    <h1 align="center">Registro nuevo alumno</h1>

    <div class="elemento-form">
        <label for="matricula">Matricula:</label>
        <input type="text" placeholder="Matricula" name="matricula" id="matricula" required class="input">
    </div>
    <div class="elemento-form">
        <label for="nombre">Nombre:</label>
        <input type="text" placeholder="Nombre" name="nombre" id="nombre" required class="input">
    </div>
    <div class="elemento-form">
        <label for="espec">Especialidad:</label>
        <input type="text" placeholder="Especialidad" name="espec" id="espec" required class="input">
    </div>
    <input type="submit" value="Enviar" class="boton">
    <input type="reset" value="Borrar" class="boton">
    <input type="hidden" name="tab" value="<?php echo $tab; ?>">
</form>
<?php
      }

      else if ($tab=='c'){
        ?>
<form method="post" action="insertar.php"
    class="formulario d-flex flex-column justify-content-around align-items-center col-md-6 col-11 contact">
    <h1 align="center">Registro contacto</h1>
    <div class="elemento-form">
        <label for="nombre">Nombre:</label>
        <input type="text" placeholder="Nombre" name="nombre" id="nombre" required class="input">
    </div>
    <div class="elemento-form">
        <label for="apellidos">Apellidos:</label>
        <input type="text" placeholder="Apellidos" id="apellidos" name="apellidos" required class="input">
    </div>
    <div class="elemento-form">
        <label for="email">Email:</label>
        <input type="text" placeholder="Email" name="email" id="email" required class="input">
    </div>
    <div class="elemento-form">
        <label for="direccion">Direccion:</label>
        <input type="text" placeholder="Direccion" name="direccion" id="direccion" required class="input">
    </div>
    <div class="elemento-form">
        <label for="telefono">Telefono:</label>
        <input type="text" placeholder="Telefono" name="telefono" id="telefono" required class="input">
    </div>
    <input type="submit" value="Enviar" class="boton">
    <input type="reset" value="Borrar" class="boton">
    <input type="hidden" name="tab" value="<?php echo $tab; ?>">
</form>
<?php
      }
      else if ($tab=='u'){
        ?>
<form method="post" action="insertar.php"
    class="formulario d-flex flex-column justify-content-around align-items-center col-md-6 col-11">
    <h1 align="center">Registro usuario</h1>
    <div class="elemento-form">
        <label for="usuario">Usuario:</label>
        <input type="text" placeholder="Usuario" name="usuario" required class="input" id="usuario"> </div>
    <div class="elemento-form">
        <label for="contraseña">Contraseña:</label>
        <input type="password" placeholder="Contraseña" name="contraseña" required class="input" id="contraseña">
    </div>
    <div class="elemento-form">
        <label for="priv">Privilegio:</label>
        <select name="priv" id="priv" required>
            <option value="admin">Admin</option>
            <option value="estandar">Estandar</option>
        </select>
    </div>

    <input type="submit" value="Enviar" class="boton">
    <input type="reset" value="Borrar" class="boton">
    <input type="hidden" name="tab" value="<?php echo $tab; ?>">
</form>
<?php
      }
    }
    echo "<a href='menu.php' class='volver boton'>Volver</a>";
?>