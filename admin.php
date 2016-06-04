<?php
include 'includes/main_menu_admin.php';

require_once 'classes/Database.php';

$database = new Database();

if(isset($_GET['show'])){
    if ($_GET['show'] = "category"){
        $result = $database->select();
        echo $result;
    }
}
