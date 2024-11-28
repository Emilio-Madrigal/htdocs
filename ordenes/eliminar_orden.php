<html>
<body>
    <?php
        include "conexion.php";

        $id_nota = $_GET['id_nota'];

        $sql = "DELETE FROM ordenes WHERE id_nota = $id_nota";

        if ($conexion->query($sql) === TRUE) {
            echo "Orden eliminada correctamente.<br>";
        } else {
            echo "Error al eliminar la orden: <br>" . $conexion->error;
        }
        echo "<a href='busqueda_ordenes.php?'><button>regresar</button></a> ";
        $conexion->close();
    ?>
</body>
</html>
