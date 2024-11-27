<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario y el id_producto
        $id_prov = $_REQUEST['id_prov'];  // Obtener el id del producto
        $nombre = $_REQUEST['Nombre'];
        $contacto = $_REQUEST['num'];
        $empresa = $_REQUEST['empresa'];


        // Mostrar los datos recibidos para verificar
        echo "Nombre del proveedor: $nombre<br>";
        echo "el numero de contacto es: $contacto<br>";
        echo "el nombre de la empresa es: $empresa<br>";
        

        // Actualizar los datos en la base de datos
        $sql = "UPDATE proveedor
                SET nombre = '$nombre', 
                    num_contacto = '$contacto', 
                    Nombre_Emp = '$empresa'
                WHERE id_prov = $id_prov";

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
