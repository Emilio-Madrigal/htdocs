<?php
// Recibir el ID del producto
$id_inv = $_GET['id_inv'];
?>
<html>
    <body>
        
        <h1>Emilio 22100230</h1>
        <meta charset="utf-8"/>
        <form action="modificar_invparte2.php" method="post">
        <input type="hidden" name="id_inv" value="<?php echo $id_inv; ?>">
            Nombre: <input type="text" name="Nombre"><br>
  
            almacenista:
            <select name="almacenista">
                <option value="0">Seleccione:</option>
                    <?php
                     $mysqli = new mysqli('localhost', 'root', '', 'integrador') or die("Fallo en la Conexion");
                     $query = $mysqli -> query ("SELECT id_alma, nombre FROM almacenista");
                     while ($valores = mysqli_fetch_array($query)) {
                     echo '<option value="'.$valores['id_alma'].'">'.$valores['nombre'].'</option>';
                     }
                    ?>
            </select><br>

            <input type="submit" value="actualizar">

        </form>

    </body>
</html>
