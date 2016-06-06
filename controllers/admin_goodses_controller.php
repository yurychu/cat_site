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

    public function details(){
        if(!isset($_GET['id']))
            return call('pages', 'error');

        $goods = Goods::find($_GET['id']);
        require_once('views/goodses/admin/admin_details.php');
    }
    
    public function create_category(){
        if(!isset($_GET['id']))
            return call('pages', 'error');
        $categories = Category::all();
        $goods = Goods::find($_GET['id']);
        require_once('views/goodses/admin/create_category.php');
    }
    
    public function add_category(){
        $result = Goods::add_category(
            $_POST['goods_id'],
            $_POST['category_id']
        );
        require_once('views/goodses/admin/added_category.php');
    }
    
    public function other_goods(){
        if(!isset($_GET['category_id']))
            return call('pages', 'error');
        $goodses = Goods::other_goods($_GET['category_id']);
        require_once('views/goodses/admin/admin_list.php');
    }
}