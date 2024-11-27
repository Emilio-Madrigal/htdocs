<?php
// Recibir el ID del producto
$id_prov = $_GET['id_prov'];
?>

<html>
    <body>
        <h1>Modificar Producto</h1>
        <meta charset="utf-8"/>
        <form action="modificar_provparte2.php" method="post">
            <!-- Campo oculto para reenviar el ID del producto -->
            <input type="hidden" name="id_prov" value="<?php echo $id_prov; ?>">
            
            Nombre: <input type="text" name="Nombre"><br>
            numero de contacto: <input type="text" name="num"><br>
            nombre de la empresa: <input type="text" name="empresa"><br>
            
            <input type="submit" value="agregar">
            
            

            <input type="submit" value="Actualizar">
        </form>
    </body>
</html>
