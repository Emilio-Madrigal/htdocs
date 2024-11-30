
<html>
    <body>
        
        <h1>Marcas</h1>
        <meta charset="utf-8"/>
        <form action="insertar_marca.php" method="post">
            Nombre: <input type="text" name="Nombre"><br>

            <input type="submit" value="agregar">

        </form>

        <form action="busqueda_marca.php" method="post">
        Nombre: <input type="text" name="Nombre"><br>
        <input type="submit" value="buscar">
        </form>
        <?php
        echo "<a href='/usuarios/menuU.php?'><button>regresar</button></a> ";
        ?>
    </body>
</html>
