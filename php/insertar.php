<?php
	include_once 'conectar_utd.php';
	$tab=$_POST['tab'];

	if ($tab=='a') 
	{
		$matri=$_POST['matricula'];
		$nombre=$_POST['nombre'];
		$espec=$_POST['espec'];

		$consulta="insert into alumnos (matricula, nombre, especialidad) values ('$matri', '$nombre', '$espec')";
	}
	elseif ($tab=='c') 	
	{
		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$email=$_POST['email'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$consulta="insert into contactos (nombre, apellidos, email, direccion, telefono) values ('$nombre', '$apellidos', '$email', '$direccion', '$telefono')";

	}
	elseif ($tab=='u') 
	{
		$usuario=$_POST['usuario'];
		$contraseña=$_POST['contraseña'];
		$privilegio=$_POST['priv'];

		$consulta="insert into usuarios (username, password, privilegio) values ('$usuario', '$contraseña', '$privilegio')";
	}

	$resultado=mysqli_query($conexion, $consulta);
	include('menu.php');
	if($resultado) 
		{
			//echo "<br><h4 align=center>Usuario agregado correctamente</h4>";
			?>
    <script>
        function alerta(){
            swal({
                title: "¡Registro agregado correctamente!",
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
		else 
		{
			//echo "<br><h4 align=center><font color='red'>"."Error al agregar usuario"."</font></h4>";
			?>
    <script>
        function alerta(){
            swal({
                title: "Error al agregar registro",
                text: "Por favor verifique",
                icon: "error",
            });
        }
        alerta();                   
    </script>
<?php
		}
		//echo "<a href='menu.php'><h4 align=center >Volver</h4></a>";

?>