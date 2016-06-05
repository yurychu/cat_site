<?php
function call($controller, $action){
    require_once('controllers/public_'. $controller . '_controller.php');

    switch ($controller){
        case 'pages':
            $controller = new PublicPagesController();
            break;
        case 'categories':
            require_once('models/category.php');
            $controller = new PublicCategoriesController();
            break;
    }

    $controller->{ $action }();
}

$controllers = array(
    'pages' => ['home', 'error'],
    'categories' => ['list_', 'details']
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
