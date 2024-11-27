<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario y el id_producto
        $id_prov = $_GET['id_prov'];
       
        $sql = "DELETE FROM proveedor WHERE id_prov = $id_prov";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro eliminado";
        } else {
            echo "Error: " . $conexion->error;
        }
        $conexion->close();
    ?>
</body>
</html>
