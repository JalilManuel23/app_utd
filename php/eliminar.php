<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   
   <meta charset="utf-8">
	<title>Usuarios</title>
</head>

<?php 
	include_once 'conectar_utd.php';

	$tab= $_GET ['tab'];

	if ($tab=='a') {
		$matricula = $_GET ['matricula'];

		$consulta="DELETE from alumnos WHERE matricula='$matricula'";

	}

	else if ($tab=='c') 
	{
		$id=$_GET['id'];
		
		$consulta="DELETE from contactos WHERE id='$id'";

	}
	else if ($tab=='u') {
		$username = $_GET ['username'];

		$consulta="DELETE from usuarios WHERE username='$username'";
	}

	$resultado=mysqli_query($conexion, $consulta) or die( "Algo ha ido mal en la consulta a la base de datos");

	if ($resultado) 
	{
		//echo "<h4 align=center>Se ha eliminado el registro correctamente</h4>";
		include('menu.php');
		?>
			<script>
				swal({
					title: "¿Está seguro que desea eliminar este registro?",
					text: "Confirme para borrar el registro",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
				if (willDelete) {
					swal("¡Registro eliminado!", {
					icon: "success",
					});
				} else {
					swal("¡El registro NO ha sido eliminado!");
				}
				});
			</script>
		<?php
	}
	else 
	{
		//echo "Error";
		?>
		<script>
			function alerta(){
				swal({
					title: "Error al eliminar registro",
					text: "Por favor verifique",
					icon: "error",
				});
			}
			alerta();                   
		</script>
	<?php
	}

?>