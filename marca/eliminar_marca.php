<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario y el id_producto
        $id_marca = $_GET['id_marca'];
       
        $sql = "DELETE FROM marca WHERE id_marca = $id_marca";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro eliminado<br>";
        } else {
            echo "Error: " . $conexion->error."<br>";
        }
        echo "<a href='marca.php?'><button>regresar</button></a> ";
        $conexion->close();
    ?>
</body>
</html>
