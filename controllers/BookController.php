<!-- controladores de la aplicación, que se encargarán de procesar 
las solicitudes de los usuarios y llamar a los modelos necesarios 
para realizar las operaciones correspondientes (MVC)-->

<?php

// Incluimos los modelos
require_once 'models/BookModel.php';

/*clase BookController encargada de proporcionar los métodos 
necesarios para enlazar las vistas con los modelos*/
class BookController
{
    // Muestra el listado de libros
    public function list()
    {
        // Obtenemos todos los libros

        //Inclusion del modelo de libro
        require_once './models/BookModel.php';
        //variable del modelo libro
        $modelos = new BookModel();
        //Traer el metodo del modelo
        $libros = $modelos->getAll();
        //variable para guardar datos de la tabla
        $table = null;
        //Para cada libro, iremos imprimir los valores y añadirlos en la tabla. Utilizamos un array tipo clave/valor
        foreach ($libros as $clave) {
            //DE Object para Array
            $libro = get_object_vars($clave);
            $fila = "<tr><td>" . $libro['id'] . "</td><td>" . $libro['titulo'] . "</td><td>" . $libro['autor'] .
                "</td><td>" . $libro['editorial'] . "</td><td>" . $libro['isbn'] . "<td>
            <a href='index.php?action=edit&id=" . $libro['id'] . "'>Editar</a> <a href='index.php?action=delete&id=" . $libro['id'] . "'>Eliminar</a></td>" .
                "</tr>";
            $table = $table . $fila;
        }

        // Incluimos la vista de Listado
        require_once 'views/book/list.php';
    }


    // Muestra el formulario Crear nuevo libro
    public function create()
    {
        //Iniciamos las variables
        $titulo = $autor = $editorial = $isbn = null;

        // Incluimos la vista de Creación
        require_once 'views/book/create.php';

    }


    // Procesa el formulario para crear un nuevo libro
    public function store()
    {
        // Obtenemos el ID del libro a editar
        if (isset($_POST['crear'])) {

            $titulo = addslashes($_POST['titulo']);
            $autor = addslashes($_POST['autor']);
            $editorial = addslashes($_POST['editorial']);
            $isbn = addslashes($_POST['isbn']);

            // Validamos los campos
            if (empty($titulo)) {
                echo "Titulo obligatorio<br>";
            } elseif (empty($autor)) {
                echo "Autor obligatorio<br>";
            } elseif (empty($editorial)) {
                echo "Editorial obligatorio<br>";
            } elseif (empty($isbn)) {
                echo "isbn obligatorio<br>";
            } else {
                //Inclusion del modelo de libro
                require_once './models/BookModel.php';

                //variable del modelo libro
                $modelos = new BookModel();

                //Traer el libro seleccionado
                $modelos->create($titulo, $autor, $editorial, $isbn);

                // para redirigir al listado usaremos la función header('location: ... ')
                header('Location: index.php');
            }
        }
    }


    // Muestra el formulario para editar un libro existente
    public function edit()
    {
        // Obtenemos el ID del libro a editar
        if (isset($_GET['id'])) {

            $id = addslashes($_GET['id']);
            // Validamos el ID
            if (empty($id)) {
                $id = "ID obligatorio<br>";
            } else {
                //Inclusion del modelo de libro
                require_once './models/BookModel.php';
                //variable del modelo libro
                $modelos = new BookModel();

                //Traer el libro seleccionado
                $modelo = $modelos->getById($id);

                //Pasamos el objeto a un array
                $libro = get_object_vars($modelo);

                // Incluimos la vista de Listado
                require_once 'views/book/edit.php';
            }
        }
    }


    // Procesa el formulario para editar un libro existente
    public function update()
    {
        // Obtenemos el ID y los datos del formulario
        if (isset($_POST['actualizar'])) {

            //Recuperar los datos del usuario
            $id = addslashes($_POST['id']);
            $titulo = addslashes($_POST['titulo']);
            $autor = addslashes($_POST['autor']);
            $editorial = addslashes($_POST['editorial']);
            $isbn = addslashes($_POST['isbn']);

            // Validamos los datos
            if (empty($id)) {
                echo "ID obligatorio<br>";
            } elseif (empty($titulo)) {
                echo "Titulo obligatorio<br>";
            } elseif (empty($autor)) {
                echo "Autor obligatorio<br>";
            } elseif (empty($editorial)) {
                echo "Editorial obligatorio<br>";
            } elseif (empty($isbn)) {
                echo "ISBN obligatorio<br>";
            } else {
                //Inclusion del modelo de libro
                require_once './models/BookModel.php';
                //variable del modelo libro
                $modelos = new BookModel();
                //Ejecutar el metodo del modelo
                $modelos->update($id,$titulo, $autor, $editorial, $isbn);
                // para redirigir al listado usaremos la función header('location: ... ')
                header('Location: index.php');
            }
        }
    }


    // Elimina un libro existente
    public function delete()
    {
        // Obtenemos el ID del libro a eliminar
        if (isset($_GET['id'])) {
            // Validamos el ID - Eliminamos el libro y Redirigimos al listado de libros
            $id = addslashes($_GET['id']);

            if (empty($id)) {
                $id = "ID obligatorio<br>";
            } else {
                //Inclusion del modelo de libro
                require_once './models/BookModel.php';
                //variable del modelo libro
                $modelos = new BookModel();
                //Ejecutar el metodo del modelo
                $modelos->delete($id);
                // para redirigir al listado usaremos la función header('location: ... ')
                header('Location: index.php');
            }
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}