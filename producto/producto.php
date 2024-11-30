
<html>
    <body>
        
        <h1>Productos</h1>
        <meta charset="utf-8"/>
        <form action="insertar_producto.php" method="post">
            Nombre: <input type="text" name="Nombre"><br>
            cantidad: <input type="text" name="cantidad"><br>
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
            
            marca:
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
            <br>
            provedor: 
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

        <form action="busqueda_producto.php" method="post">
        Nombre: <input type="text" name="Nombre"><br>
        <input type="submit" value="buscar">
        </form>

        <?php
        echo "<a href='/usuarios/menuU.php?'><button>regresar</button></a> ";
        ?>

    </body>
</html>
