<?php
function call($controller, $action){
    require_once('controllers/admin_'. $controller . '_controller.php');

    switch ($controller){
        case 'pages':
            $controller = new AdminPagesController();
            break;
        case 'categories':
            require_once('models/category.php');
            $controller = new AdminCategoriesController();
            break;
    }

    $controller->{ $action }();
}

$controllers = array(
    'pages' => ['home', 'error'],
    'categories' => ['list_', 'details', 'create', 'add', 'edit', 'edited']
);

if (array_key_exists($controller, $controllers)){
    if (in_array($action, $controllers[$controller])){
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}
