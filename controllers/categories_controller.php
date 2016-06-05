<?php
class CategoriesController{
    public function index(){
        $categories = Category::all();
        require_once('views/categories/index.php');
    }
    
    public function show(){
        if(!isset($_GET['id']))
            return call('pages', 'error');
        
        $category = Category::find($_GET['id']);
        require_once('views/categories/show.php');
    }
    
    public function create(){
        require_once('views/categories/create.php');
    }
    
    public function add(){
        if(!isset($_POST['name']))
            return call('pages', 'error');

        $result = Category::add(
            $_POST['name'],
            $_POST['short_desription'],
            $_POST['full_description'],
            $_POST['active']);
        require_once('views/categories/added.php');
    }
}