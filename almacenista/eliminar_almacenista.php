<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario y el id_producto
        $id_alma = $_GET['id_alma'];
       
        $sqlA = "DELETE FROM almacenista WHERE id_alma = $id_alma";
        $sqlU = "DELETE FROM usuarios WHERE id_alma = $id_alma";

        if ($conexion->query($sqlA) === TRUE and $conexion->query($sqlU) === TRUE ) {
            echo "Registro eliminado<br>";
        } else {
            echo "Error: " . $conexion->error."<br>";
        }
        echo "<a href='/administradores/menuA.php?'><button>regresar</button></a> ";
        $conexion->close();
    ?>
</body>
</html>
