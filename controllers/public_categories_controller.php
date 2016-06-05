<?php
class PublicCategoriesController{
    public function list_(){
        $categories = Category::all();
        require_once('views/categories/public/public_list.php');
    }
    
    public function details(){
        if(!isset($_GET['id']))
            return call('pages', 'error');
        
        $category = Category::find($_GET['id']);
        require_once('views/categories/public/public_details.php');
    }
}