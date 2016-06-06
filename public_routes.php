<?php
function call($controller, $action){
    // подключим нужный контроллер
    require_once('controllers/public_'. $controller . '_controller.php');

    switch ($controller){
        case 'pages':
            $controller = new PublicPagesController();
            break;
        case 'categories':
            require_once('models/category.php');
            $controller = new PublicCategoriesController();
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
    'categories' => ['list_', 'details'],
    'goodses' => ['list_', 'details', 'other_goods']
);
// Обработка допустимых и недопустимых запросов
if (array_key_exists($controller, $controllers)){
    if (in_array($action, $controllers[$controller])){
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}
