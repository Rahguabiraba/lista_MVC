<!-- modelos de la aplicación, que se encargarán de realizar las operaciones CRUD de la base 
de datos (como obtener un listado de libros, crear un nuevo libro, etc.) -->

<?php

class BookModel
{
    private $db;

    public function __construct()
    {
        // Inicializamos la conexión a la base de datos
        $this->db = new PDO('mysql:host=localhost;dbname=libreria', 'root', '');
    }

    // Obtiene un listado de todos los libros de la base de datos
    public function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM libros');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Obtiene un libro por su ID
    public function getById($id)
    {
        $query = $this->db->prepare('SELECT * FROM libros WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Crea un nuevo libro en la base de datos
    public function create($titulo, $autor, $editorial, $isbn)
    {
        $query = $this->db->prepare('INSERT INTO libros (titulo, autor, editorial, isbn) VALUES (:titulo, :autor, :editorial, :isbn)');
        $query->execute([
            'titulo' => $titulo,
            'autor' => $autor,
            'editorial' => $editorial,
            'isbn' => $isbn
        ]);
    }

    // Actualiza un libro en la base de datos
    public function update($id, $titulo, $autor, $editorial, $isbn)
    {
        $query = $this->db->prepare('UPDATE libros SET titulo = :titulo, autor = :autor, editorial = :editorial, isbn = :isbn WHERE id = :id');
        $query->execute([
            'id' => $id,
            'titulo' => $titulo,
            'autor' => $autor,
            'editorial' => $editorial,
            'isbn' => $isbn
        ]);
    }

    // Elimina un libro de la base de datos
    public function delete($id)
    {
        $query = $this->db->prepare('DELETE FROM libros WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}
