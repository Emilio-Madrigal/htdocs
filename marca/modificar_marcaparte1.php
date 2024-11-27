<?php
// Recibir el ID del producto
$id_marca = $_GET['id_marca'];
?>

<html>
    <body>
        <h1>Modificar marca</h1>
        <meta charset="utf-8"/>
        <form action="modificar_marcaparte2.php" method="post">
            <!-- Campo oculto para reenviar el ID del producto -->
            <input type="hidden" name="id_marca" value="<?php echo $id_marca; ?>">
            
            Nombre: <input type="text" name="Nombre"><br>
            
            <input type="submit" value="Actualizar">
        </form>
    </body>
</html>
