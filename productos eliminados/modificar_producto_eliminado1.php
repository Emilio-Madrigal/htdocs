<?php
// Recibir el ID del producto eliminado
$id_pro = $_GET['id_pro'];

// Conectar a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'integrador') or die("Fallo en la Conexion");

// Consultar datos del producto eliminado
$queryProducto = $mysqli->query("SELECT * FROM productos_eliminados WHERE id_pro = $id_pro");
$producto = $queryProducto->fetch_assoc();

if (!$producto) {
    die("No se encontró el producto con ID: $id_pro");
}
?>

<html>
    <body>
        <h1>Modificar Producto Eliminado</h1>
        <meta charset="utf-8"/>
        <form action="modificar_producto_eliminado2.php" method="post">
            <!-- Campo oculto para reenviar el ID del producto -->
            <input type="hidden" name="id_pro" value="<?php echo $id_pro; ?>">

            Nombre: <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>"><br>

            Precio: <input type="text" name="precio" value="<?php echo $producto['precio']; ?>"><br>

            Caducidad: <input type="date" name="caducidad" value="<?php echo $producto['caducidad']; ?>"><br>

            Marca:
            <select name="id_marca">
                <option value="0">Seleccione:</option>
                <?php
                $query = $mysqli->query("SELECT id_marca, nombre FROM marca");
                while ($valores = mysqli_fetch_array($query)) {
                    $selected = $producto['id_marca'] == $valores['id_marca'] ? "selected" : "";
                    echo '<option value="'.$valores['id_marca'].'" '.$selected.'>'.$valores['nombre'].'</option>';
                }
                ?>
            </select><br>

            Inventario:
            <select name="id_inv">
                <option value="0">Seleccione:</option>
                <?php
                $query = $mysqli->query("SELECT id_inv, nombre_inv FROM inventario");
                while ($valores = mysqli_fetch_array($query)) {
                    $selected = $producto['id_inv'] == $valores['id_inv'] ? "selected" : "";
                    echo '<option value="'.$valores['id_inv'].'" '.$selected.'>'.$valores['nombre_inv'].'</option>';
                }
                ?>
            </select><br>

            Proveedor:
            <select name="id_prov">
                <option value="0">Seleccione:</option>
                <?php
                $query = $mysqli->query("SELECT id_prov, nombre FROM proveedor");
                while ($valores = mysqli_fetch_array($query)) {
                    $selected = $producto['id_prov'] == $valores['id_prov'] ? "selected" : "";
                    echo '<option value="'.$valores['id_prov'].'" '.$selected.'>'.$valores['nombre'].'</option>';
                }
                ?>
            </select><br><br>

            <input type="submit" value="Actualizar">
        </form>
    </body>
</html>
