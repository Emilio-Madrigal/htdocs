<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario y el id_producto
        $id_pro = $_GET['id_producto'];
       
        $sql = "DELETE FROM producto WHERE id_pro = $id_pro";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro eliminado<br>";
        } else {
            echo "Error:<br> " . $conexion->error;
        }
        echo "<a href='busqueda_producto.php?'><button>regresar</button></a> ";
        $conexion->close();
    ?>
</body>
</html>
