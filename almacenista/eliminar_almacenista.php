<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario y el id_producto
        $id_alma = $_GET['id_alma'];
       
        $sql = "DELETE FROM almacenista WHERE id_alma = $id_alma";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro eliminado<br>";
        } else {
            echo "Error: " . $conexion->error."<br>";
        }
        echo "<a href='almacenista.php?'><button>regresar</button></a> ";
        $conexion->close();
    ?>
</body>
</html>
