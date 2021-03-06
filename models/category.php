<?php
class Category {
    public $id;
    public $name;
    public $short_description;
    public $full_description;
    public $active;

    public function __construct($id, $name, $short_description, $full_description, $active){
        $this->id = $id;
        $this->name = $name;
        $this->short_description = $short_description;
        $this->full_description = $full_description;
        $this->active = $active;
    }

    public static function all(){
        $list = [];
        $db = Database::get_instance();
        $req = $db->query('SELECT * FROM category');

        foreach ($req->fetchAll() as $category){
            $list[] = new Category(
                $category['id'],
                $category['name'],
                $category['short_description'],
                $category['full_description'],
                $category['active']
                );
        }
        return $list;
    }
    
    public static function find($id){
        $db = Database::get_instance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM category WHERE id = :id');
        $req->execute(array('id' => $id));
        $category = $req->fetch();
        
        return new Category(
            $category['id'],
            $category['name'],
            $category['short_description'],
            $category['full_description'],
            $category['active']);
    }

    public static function add($name, $short_description, $full_description, $active){
        $db = Database::get_instance();
        $req = $db->prepare(
            'INSERT INTO category (name, short_description, full_description, active)'.
            'VALUES (:name, :short_description, :full_description, :active)');
        $stm = $req->execute(array(
            'name' => $name,
            'short_description' => $short_description,
            'full_description' => $full_description,
            'active' => $active
            ));
        
        return $stm;
    }

    public static function edit($id, $name, $short_description, $full_description, $active){
        $db = Database::get_instance();
        $req = $db->prepare(
            'UPDATE category ' .
            'SET name=:name, short_description=:short_description, ' .
            'full_description=:full_description, active=:active ' .
            'WHERE id=:id');

        $stm = $req->execute(array(
            'id' => $id,
            'name' => $name,
            'short_description' => $short_description,
            'full_description' => $full_description,
            'active' => $active
        ));

        return $stm;
    }
}
