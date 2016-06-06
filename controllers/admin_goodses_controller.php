<?php
class AdminGoodsesController {
    public function list_(){
        $goodses = Goods::all();
        require_once('views/goodses/admin/admin_list.php');
    }

    public function create(){
        $categories = Category::all();
        require_once('views/goodses/admin/create.php');
    }
    public function add(){
        $result = Goods::add(
            $_POST['name'],
            $_POST['short_desription'],
            $_POST['full_description'],
            $_POST['active'],
            $_POST['in_stock'],
            $_POST['can_be_ordered'],
            $_POST['category']);
        require_once('views/goodses/admin/added.php');
    }
}