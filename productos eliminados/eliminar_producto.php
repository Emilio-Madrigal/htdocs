<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario y el id_producto
        $id_producto = $_GET['id_producto'];
       
        $sql = "DELETE FROM producto WHERE id_pro = $id_producto";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro eliminado";
        } else {
            echo "Error: " . $conexion->error;
        }
        $conexion->close();
    ?>
</body>
</html>
