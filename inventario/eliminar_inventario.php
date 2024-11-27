<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario y el id_producto
        $id_inv = $_GET['id_inv'];
       
        $sql = "DELETE FROM inventario WHERE id_pro = $id_inv";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro eliminado";
        } else {
            echo "Error: " . $conexion->error;
        }
        $conexion->close();
    ?>
</body>
</html>
