<?php
class AdminCategoriesController{
    public function list_(){
        $categories = Category::all();
        require_once('views/categories/admin/admin_list.php');
    }

    public function details(){
        if(!isset($_GET['id']))
            return call('pages', 'error');

        $category = Category::find($_GET['id']);
        require_once('views/categories/admin/admin_details.php');
    }

    public function create(){
        require_once('views/categories/admin/create.php');
    }

    public function add(){
        $result = Category::add(
            $_POST['name'],
            $_POST['short_desription'],
            $_POST['full_description'],
            $_POST['active']);
        require_once('views/categories/admin/added.php');
    }

    public function edit(){
        if(!isset($_GET['id']))
            return call('pages', 'error');

        $category = Category::find($_GET['id']);
        require_once('views/categories/admin/edit.php');
    }

    public function edited(){
        $result = Category::edit(
            $_POST['id'],
            $_POST['name'],
            $_POST['short_description'],
            $_POST['full_description'],
            $_POST['active']);
        require_once('views/categories/admin/edited.php');
    }
}