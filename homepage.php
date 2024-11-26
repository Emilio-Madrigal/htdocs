
<html>
    <body>
        
        <h1>Emilio 22100230</h1>
        <meta charset="utf-8"/>
        <form action="insertar.php" method="post">
            Nombre: <input type="text" name="Nombre"><br>
            precio: <input type="text" name="precio"><br>
            Caducidad: <input type="date" name="caducidad"><br>
            
            inventario:
            <select name="inventario">
                <option value="0">Seleccione:</option>
                    <?php
                     $mysqli = new mysqli('localhost', 'root', '', 'integrador') or die("Fallo en la Conexion");
                     $query = $mysqli -> query ("SELECT id_inv, nombre_inv FROM inventario");
                     while ($valores = mysqli_fetch_array($query)) {
                     echo '<option value="'.$valores['id_inv'].'">'.$valores['nombre_inv'].'</option>';
                     }
                    ?>
            </select><br>
            
            marca: <br>
            <select name="marca">
                <option value="0">Seleccione:</option>
            <?php
                $mysqli = new mysqli('localhost', 'root', '', 'integrador') or die("Fallo en la Conexion");
                $query = $mysqli -> query ("SELECT id_marca, nombre FROM marca");
                while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores['id_marca'].'">'.$valores['nombre'].'</option>';
                }
                ?>
            </SELECT>
            <br><br>
            provedor: <br>
            <select name="proveedor">
                <option value="0">Seleccione:</option>
            <?php
                $mysqli = new mysqli('localhost', 'root', '', 'integrador') or die("Fallo en la Conexion");
                    $query = $mysqli -> query ("SELECT id_prov, nombre FROM proveedor");
                    while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores['id_prov'].'">'.$valores['nombre'].'</option>';}
                ?>
            </SELECT>
            <br><br>
    
 
            <input type="submit" value="agregar">

        </form>

        <form action="busqueda.php" method="post">
        Nombre: <input type="text" name="Nombre"><br>
        <input type="submit" value="buscar">
        </form>
    </body>
</html>
