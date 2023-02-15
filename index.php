<!-- archivo principal de la aplicación, que se encargará de redirigir a los 
usuarios a la vista y controlador adecuados según la acción solicitada -->

<?php
// Incluimos los archivos necesarios
require_once 'controllers/BookController.php';

// Obtenemos la acción solicitada por el usuario, metodo GET
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Redirigimos al controlador y vista adecuados según la acción solicitada
switch ($action) {
    case 'list':
        // require_once 'views/book/list.php';
        $controller = new BookController();
        $controller->list();
        break;
    case 'create':
        // require_once 'views/book/create.php';
        $controller = new BookController();
        $controller->create();
        break;
    case 'edit':
        // require_once 'views/book/edit.php';
        $controller = new BookController();
        $controller->edit();
        break;
    case 'delete':
        $controller = new BookController();
        $controller->delete();
        break;
    case 'store':
        $controller = new BookController();
        $controller->store();
        break;
    case 'update':
        $controller = new BookController();
        $controller->update();
        break;
    default:
        // Acción no válida, mostramos un error
        die('Acción no válida');
}
