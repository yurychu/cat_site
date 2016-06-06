<?php
    require_once('connection.php');
    // ловим параметры из строки запроса, или летим на домашнюю
    if (isset($_GET['controller']) && isset($_GET['action'])){
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    } else {
        $controller = 'pages';
        $action = 'home';
    }

    require_once('views/layout_public.php');  // Нужный нам функционал
