<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   	<meta charset="utf-8">
	<title>Modificar</title>
</head>

<?php
	include_once 'conectar_utd.php';

	$tab= $_GET['tab'];

	if ($tab=='a') 
	{
		$matricula = $_GET ['matricula'];

		$query="SELECT matricula, nombre, especialidad FROM alumnos WHERE matricula ='$matricula'";
		$resultado = mysqli_query($conexion, $query);

		    echo "<hr><h3 align=center>Modificar registros de la tabla alumnos</h3><br>";
            echo "<h4 align='center'>Ingresa los nuevos valores</h4><br>";
            echo "<form method='POST' action='actualizar_2.php'>";
            echo "<table align=center>";
		while ($fila =mysqli_fetch_array($resultado))
		{
			echo "<tr>";
			echo "<td><label>Nombre:</label></td> <td><input class='form-control' type = 'text' name = 'nombre' value = '".$fila['nombre']."' required></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><label>Especialidad:</label></td> <td><input class='form-control' type = 'text' name = 'especialidad' value = '".$fila['especialidad']."'required></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<input type='hidden' name='tab' value='".$tab."''>";
			echo "<input type='hidden' name='matri' value='".$matricula."''>";
			echo "<td colspan=2><input class='btn btn-primary' id='boton' type='submit' name='ENVIAR' value='CAMBIAR'></td>";
			echo "</tr>";
			echo "</form>";
			echo "</table>";
			echo "<hr>";
			echo "<a href='menu.php'><h3 align=center >Volver</h3></a>";
		}
	}

	else if($tab=='c') 
	{
		$id=$_GET['id'];

		$query="SELECT id, nombre, apellidos, direccion, telefono, email FROM contactos WHERE id='$id'";
        $resultado=mysqli_query($conexion,$query);

        echo "<hr><h3 align=center>Modificar registros de la tabla Contactos</h3><br>";
        echo "<h4 align='center'>Ingresa los nuevos valores</h4><br>";
        echo "<form method='POST' action='actualizar_2.php'>";
        echo "<table align=center>";

        while ($fila =mysqli_fetch_array($resultado)) 
        {
        	echo "<tr>";
			echo "<td><label>Nombre:</label></td> <td><input class='form-control' type = 'text' name = 'nombre' value = '".$fila['nombre']."' required></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><label>Apellidos:</label></td> <td><input class='form-control' type = 'text' name = 'apellidos' value = '".$fila['apellidos']."' required></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><label>Dirección:</label></td> <td><input class='form-control' type = 'text' name = 'direccion' value = '".$fila['direccion']."'required></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><label>Telefono:</label></td> <td><input class='form-control' type = 'text' name = 'telefono' value = '".$fila['telefono']."'required></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><label>Email:</label></td> <td><input class='form-control' type = 'text' name = 'email' value = '".$fila['email']."'required></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<input type='hidden' name='tab' value='".$tab."''>";
			echo "<input type='hidden' name='id' value='".$id."''>";
			echo "<td colspan=2><input class='btn btn-primary' id='boton' type='submit' name='ENVIAR' value='CAMBIAR'></td>";
			echo "</tr>";
			echo "</form>";
			echo "</table>";
			echo "<hr>";
			echo "<a href='menu.php'><h3 align=center >Volver</h3></a>";
        }	
	}

	else if($tab=='u') 
	{
		$username = $_GET ['username'];

		$query="select username, password, privilegio from usuarios WHERE username='$username'";
        $resultado=mysqli_query($conexion,$query);

        echo "<hr><h3 align=center>Modificar registros de la tabla Usuarios</h3><br>";
        echo "<h4 align='center'>Ingresa los nuevos valores</h4><br>";
        echo "<form method='POST' action='actualizar_2.php'>";
        echo "<table align=center>";

        while ($fila =mysqli_fetch_array($resultado)) 
        {
        	echo "<tr>";
			echo "<td><label>Usuario:</label></td> <td><input class='form-control' type = 'text' name = 'usuario' value = '".$fila['username']."' required></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><label>Contraseña:</label></td> <td><input class='form-control' type = 'text' name = 'contraseña' value = '".$fila['password']."' required></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><label>Privilegio:</label></td>";
			?><td>
					<select name='priv' class="custom-select custom-select-lg mb-auto" required>
	                  <option <?php if ($fila['privilegio']=="admin") echo "selected";?> value="admin">Admin</option> 
	                  <option <?php if ($fila['privilegio']=="estandar") echo "selected";?> value="estandar">Estandar</option>
                 	</select>
              </td>
            <?php
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "<input type='hidden' name='us' value='".$username."'>";
			echo "<input type='hidden' name='tab' value='".$tab."''>";
			echo "<br><td colspan=2><input class='btn btn-primary' id='boton' type='submit' name='ENVIAR' value='CAMBIAR'></td>";
			echo "</tr>";
			echo "</form>";
			echo "</table>";
			echo "<hr>";
			echo "<a href='menu.php'><h3 align=center >Volver</h3></a>";
        }	
	}
?>