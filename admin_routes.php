<?php
function call($controller, $action){
    // подключим нужный контроллер
    require_once('controllers/admin_'. $controller . '_controller.php');

    switch ($controller){
        case 'pages':
            $controller = new AdminPagesController();
            break;
        case 'categories':
            require_once('models/category.php');
            $controller = new AdminCategoriesController();
            break;
        case 'goodses':
            require_once('models/category.php');
            require_once('models/goods.php');
            $controller = new AdminGoodsesController();
            break;
    }

    $controller->{ $action }();
}

$controllers = array(
    'pages' => ['home', 'error'],
    'categories' => ['list_', 'details', 'create', 'add', 'edit', 'edited'],
    'goodses' => ['list_', 'create', 'add', 'details', 'create_category', 'add_category', 'other_goods', 'edit']
);

// обработка допустимости запроса
if (array_key_exists($controller, $controllers)){
    if (in_array($action, $controllers[$controller])){
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}
