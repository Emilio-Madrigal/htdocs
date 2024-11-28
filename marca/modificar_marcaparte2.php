<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario y el id_producto
        $id_marca = $_REQUEST['id_marca'];  // Obtener el id del producto
        $nombre = $_REQUEST['Nombre'];
        
       
        echo "Nombre: $nombre<br>";
        

        // Actualizar los datos en la base de datos
        $sql = "UPDATE marca
                SET nombre = '$nombre'
                WHERE id_marca = $id_marca";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro actualizado exitosamente.<br>";
        } else {
            echo "Error: " . $conexion->error."<br>";
        }

        echo "<a href='marca.php?'><button>regresar</button></a> ";
        // Cerrar la conexión
        $conexion->close();
    ?>
</body>
</html>
