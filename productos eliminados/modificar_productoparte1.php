<?php
// Recibir el ID del producto
$id_producto = $_GET['id_producto'];
?>

<html>
    <body>
        <h1>Modificar Producto</h1>
        <meta charset="utf-8"/>
        <form action="modificar_productoparte2.php" method="post">
            <!-- Campo oculto para reenviar el ID del producto -->
            <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
            
            Nombre: <input type="text" name="Nombre"><br>
            Precio: <input type="text" name="precio"><br>
            Caducidad: <input type="date" name="caducidad"><br>
            
            Inventario:
            <select name="inventario">
                <option value="0">Seleccione:</option>
                <?php
                $mysqli = new mysqli('localhost', 'root', '', 'integrador') or die("Fallo en la Conexion");
                $query = $mysqli->query("SELECT id_inv, nombre_inv FROM inventario");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores['id_inv'].'">'.$valores['nombre_inv'].'</option>';
                }
                ?>
            </select><br>
            
            Marca: <br>
            <select name="marca">
                <option value="0">Seleccione:</option>
                <?php
                $query = $mysqli->query("SELECT id_marca, nombre FROM marca");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores['id_marca'].'">'.$valores['nombre'].'</option>';
                }
                ?>
            </select><br><br>
            
            Proveedor: <br>
            <select name="proveedor">
                <option value="0">Seleccione:</option>
                <?php
                $query = $mysqli->query("SELECT id_prov, nombre FROM proveedor");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores['id_prov'].'">'.$valores['nombre'].'</option>';
                }
                ?>
            </select><br><br>

            <input type="submit" value="Actualizar">
        </form>
    </body>
</html>
