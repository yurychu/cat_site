<?php
    require_once('connection.php');

    if (isset($_GET['controller']) && isset($_GET['action'])){
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    } else {
        $controller = 'admins';
        $action = 'home';
    }

    require_once('views/layout_admin.php');
