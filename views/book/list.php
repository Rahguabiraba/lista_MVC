<!-- vista para listar los libros -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>th,td{border:1px solid black;}</style>
</head>
<body>
    <h1>Listado de libros</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>ISBN</th>
            <th>Acciones</th>
        </tr>
        <?=$table?>
    </table>
    <br>
    <!-- enlace para crear un nuevo libro usando un método GET -->
    <a href="index.php?action=create">Crear nuevo libro</a>
</body>
</html>
