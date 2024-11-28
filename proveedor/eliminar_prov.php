<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario y el id_producto
        $id_prov = $_GET['id_prov'];
       
        $sql = "DELETE FROM proveedor WHERE id_prov = $id_prov";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro eliminado<br>";
        } else {
            echo "Error: " . $conexion->error."<br>";
        }
        echo "<a href='proveedor.php?'><button>regresar</button></a> ";
        $conexion->close();
    ?>
</body>
</html>
