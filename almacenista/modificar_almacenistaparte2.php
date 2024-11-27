<html>
<body>
    <?php
        include "conexion.php";

      
        $id_alma = $_REQUEST['id_alma'];  
        $nombre = $_REQUEST['Nombre'];
        $apellido = $_REQUEST['apellido'];
        $fec_nac = $_REQUEST['fec_nac'];
        $inventario = $_REQUEST['inventario'];


        // Subconsulta para obtener el nombre del inventario
        $sqlInv = "SELECT nombre_inv FROM inventario WHERE id_inv = $inventario";
        $resultadoInv = $conexion->query($sqlInv);
        $nombreInv = $resultadoInv->num_rows > 0 ? $resultadoInv->fetch_assoc()['nombre_inv'] : "No disponible";

        
        // Mostrar los datos recibidos para verificar
       
        echo "Nombre: $nombre<br>";
        echo "apellido: $apellido<br>";
        echo "fecha de nacimiento: $fec_nac<br>";
        echo "Inventario: $nombreInv (ID: $inventario)<br>";
       

        // Actualizar los datos en la base de datos
        $sql = "UPDATE almacenista 
                SET nombre = '$nombre', 
                    apellido = '$apellido', 
                    fec_nac = '$fec_nac', 
                    id_inv = '$inventario'  
                WHERE id_alma = $id_alma ";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro actualizado exitosamente.";
        } else {
            echo "Error: " . $conexion->error;
        }

        // Cerrar la conexión
        $conexion->close();
    ?>
</body>
</html>
