<!-- vista para crear libros -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h1>Crear nuevo libro</h1>
    <form action="index.php?action=store" method="post">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="<?= $titulo ?>"><br>
        <label for="autor">Autor:</label><br>
        <input type="text" id="autor" name="autor" value="<?= $autor ?>"><br>
        <label for="editorial">Editorial:</label><br>
        <input type="text" id="editorial" name="editorial" value="<?= $editorial ?>"><br>
        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" value="<?= $isbn ?>"><br><br>
        <input type="submit" name="crear" value="Crear">
    </form>
    <br>
    <!-- enlace para volver al listado de libros usando un método GET -->
    <a href="index.php">Volver al listado de libros</a>
</body>
</html>
