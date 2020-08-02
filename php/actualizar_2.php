	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link rel="stylesheet" type="text/css" href="css/menus.css">
	</head>
<?php
	include_once 'conectar_utd.php';

	$tab=$_POST['tab'];

	if ($tab=='a') 
	{
		$matri=$_POST['matri'];
		$nombre=$_POST['nombre'];
		$espec=$_POST['especialidad'];

		$consulta="UPDATE alumnos SET nombre = '$nombre', especialidad = '$espec' WHERE matricula = '$matri'";

		
	}
	
	else if ($tab=='c') 	
	{
		$id=$_POST['id'];
		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$email=$_POST['email'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];

		$consulta="UPDATE contactos SET nombre = '$nombre', apellidos = '$apellidos', email= '$email', direccion = '$direccion', telefono='$telefono' WHERE id= '$id'";

	}
	else if ($tab=='u') 
	{
		$user=$_POST['us'];
		$nuevousuario=$_POST['usuario'];
		$contraseña=$_POST['contraseña'];
		$privilegio=$_POST['priv'];

		$consulta="UPDATE usuarios SET username='$nuevousuario', password='$contraseña', privilegio='$privilegio' WHERE username='$user'";

	}


	   $resultado=mysqli_query($conexion, $consulta);
	   include('menu.php');
		if($resultado) {
			?>
			<script>
				function alerta(){
					swal({
						title: "¡Registro modificado correctamente!",
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
						title: "Error al modificar registro",
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