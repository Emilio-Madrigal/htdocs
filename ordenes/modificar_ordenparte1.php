<?php
// Recibir el ID de la orden
$id_nota = $_GET['id_nota'];

// Conectar a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'integrador') or die("Fallo en la Conexion");

// Consultar datos de la orden
$queryOrden = $mysqli->query("SELECT * FROM ordenes WHERE id_nota = $id_nota");
$orden = $queryOrden->fetch_assoc();

if (!$orden) {
    die("No se encontró la orden con ID: $id_nota");
}
?>

<html>
    <body>
        <h1>Modificar Orden</h1>
        <meta charset="utf-8"/>
        <form action="modificar_ordenparte2.php" method="post">
            <!-- Campo oculto para reenviar el ID de la orden -->
            <input type="hidden" name="id_nota" value="<?php echo $id_nota; ?>">

            Fecha: <input type="date" name="fecha" value="<?php echo $orden['fecha']; ?>"><br>

            Producto:
            <select name="id_pro">
                <option value="0">Seleccione:</option>
                <?php
                $query = $mysqli->query("SELECT id_pro, nombre FROM producto");
                while ($valores = mysqli_fetch_array($query)) {
                    $selected = $orden['id_pro'] == $valores['id_pro'] ? "selected" : "";
                    echo '<option value="'.$valores['id_pro'].'" '.$selected.'>'.$valores['nombre'].'</option>';
                }
                ?>
            </select><br>

            Proveedor:
            <select name="id_prov">
                <option value="0">Seleccione:</option>
                <?php
                $query = $mysqli->query("SELECT id_prov, nombre FROM proveedor");
                while ($valores = mysqli_fetch_array($query)) {
                    $selected = $orden['id_prov'] == $valores['id_prov'] ? "selected" : "";
                    echo '<option value="'.$valores['id_prov'].'" '.$selected.'>'.$valores['nombre'].'</option>';
                }
                ?>
            </select><br>

            Fecha de Entrega: <input type="date" name="fec_entr" value="<?php echo $orden['fec_entr']; ?>"><br>

            Almacenista:
            <select name="id_alma">
                <option value="0">Seleccione:</option>
                <?php
                $query = $mysqli->query("SELECT id_alma, nombre FROM almacenista");
                while ($valores = mysqli_fetch_array($query)) {
                    $selected = $orden['id_alma'] == $valores['id_alma'] ? "selected" : "";
                    echo '<option value="'.$valores['id_alma'].'" '.$selected.'>'.$valores['nombre'].'</option>';
                }
                ?>
            </select><br><br>

            <input type="submit" value="Actualizar">
        </form>
    </body>
</html>
