
<?php
$id_producto = $_GET['id_producto'];
?>
<html>
<body>
    <form action="actualizar_cantidad.php" method="POST">
        
    <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">

        <label for="cantidad_cambio">Cambio en Cantidad (positivo para agregar, negativo para reducir):</label>
        <input type="number" name="cantidad_cambio" id="cantidad_cambio" required><br><br>

        <button type="submit">Actualizar Cantidad</button>
    </form>
</body>
</html>
