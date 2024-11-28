<html>
<body>
    <h1>Insertar Nueva Orden</h1>
    <meta charset="utf-8"/>
    <form action="insertar_orden.php" method="post">
        Fecha: <input type="date" name="fecha" required><br>

        Producto: 
        <select name="id_pro" required>
            <option value="">Seleccione:</option>
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'integrador') or die("Fallo en la conexión");
            $query = $mysqli->query("SELECT id_pro, nombre FROM producto");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores['id_pro'].'">'.$valores['nombre'].'</option>';
            }
            ?>
        </select><br>

        Proveedor: 
        <select name="id_prov" required>
            <option value="">Seleccione:</option>
            <?php
            $query = $mysqli->query("SELECT id_prov, nombre FROM proveedor");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores['id_prov'].'">'.$valores['nombre'].'</option>';
            }
            ?>
        </select><br>

        Fecha de Entrega: <input type="date" name="fec_entr" required><br>

        Almacenista: 
        <select name="id_alma" required>
            <option value="">Seleccione:</option>
            <?php
            $query = $mysqli->query("SELECT id_alma, nombre FROM almacenista");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores['id_alma'].'">'.$valores['nombre'].'</option>';
            }
            ?>
        </select><br><br>

        <input type="submit" value="Agregar Orden">
    </form>
</body>
</html>
