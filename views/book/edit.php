<!-- vista para editar libros -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h1>Editar libro</h1>
    <form action="index.php?action=update" method="post">
        <input type="hidden" name="id" value="<?= $libro["id"] ?>">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="<?= $libro["titulo"] ?>"><br>
        <label for="autor">Autor:</label><br>
        <input type="text" id="autor" name="autor" value="<?= $libro["autor"] ?>"><br>
        <label for="editorial">Editorial:</label><br>
        <input type="text" id="editorial" name="editorial" value="<?= $libro["editorial"] ?>"><br>
        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" value="<?= $libro["isbn"] ?>"><br><br>
        <input type="submit" name="actualizar" value="Actualizar">
    </form>
    <br>
    <!-- enlace para volver al listado de libros usando un método GET -->
    <a href="index.php">Volver al listado de libros</a>
</body>
</html>
