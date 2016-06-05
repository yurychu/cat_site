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
}