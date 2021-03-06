<?php
class Goods {
    public $id;
    public $name;
    public $short_description;
    public $full_description;
    public $active;
    public $in_stock;
    public $can_be_ordered;
    public $category;

    public function __construct($id, $name,
                                $short_description, $full_description,
                                $active, $in_stock, $can_be_ordered,
                                $category){
        $this->id = $id;
        $this->name = $name;
        $this->short_description = $short_description;
        $this->full_description = $full_description;
        $this->active = $active;
        $this->in_stock = $in_stock;
        $this->can_be_ordered = $can_be_ordered;
        $this->category = $category;
    }

    public static function all(){
        $list = [];
        $db = Database::get_instance();
        $req = $db->query(
            'SELECT goods.id, goods.name, goods.short_description,
             goods.full_description, goods.active, goods.in_stock,
             goods.can_be_ordered, GROUP_CONCAT(category.name) '.
            'FROM goods '.
            'INNER JOIN category_goods ON goods.id = category_goods.goods_id '.
            'LEFT JOIN category ON category_goods.category_id = category.id '.
            'GROUP BY goods.name');

        foreach ($req->fetchAll() as $goods){
            $list[] = new Goods(
                $goods['id'],
                $goods['name'],
                $goods['short_description'],
                $goods['full_description'],
                $goods['active'],
                $goods['in_stock'],
                $goods['can_be_ordered'],
                $goods['GROUP_CONCAT(category.name)']);
        }
        return $list;
    }

    public static function find($id){
        $db = Database::get_instance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM goods WHERE id = :id');
        $req->execute(array('id' => $id));
        $goods = $req->fetch();

        $req = $db->prepare(
            'SELECT * FROM category '.
            'WHERE id IN (SELECT category_id FROM category_goods WHERE goods_id = :id)'
        );
        $req->execute(array('id' => $id));
        $category = $req->fetchAll();

        return new Goods(
            $goods['id'],
            $goods['name'],
            $goods['short_description'],
            $goods['full_description'],
            $goods['active'],
            $goods['in_stock'],
            $goods['can_be_ordered'],
            $category);
    }

    public static function add($name, $short_description, $full_description, 
                               $active, $in_stock, $can_be_ordered, $categories_id){
        $db = Database::get_instance();
        $req = $db->prepare(
            'INSERT INTO goods (name, short_description, full_description, active, in_stock, can_be_ordered)'.
            'VALUES (:name, :short_description, :full_description, :active, :in_stock, :can_be_ordered)');
        $stm = $req->execute(array(
            'name' => $name,
            'short_description' => $short_description,
            'full_description' => $full_description,
            'active' => $active,
            'in_stock' => $in_stock,
            'can_be_ordered' => $can_be_ordered
        ));
        $goods_id = $db->lastInsertId();

        foreach ($categories_id as $category_id){
            $req = $db->prepare(
                'INSERT INTO category_goods (category_id, goods_id) '.
                'VALUES (:category_id, :goods_id)');
            $stm = $req->execute(array(
                'category_id' => $category_id,
                'goods_id' => $goods_id
            ));
        }
        return $stm;
    }

    public static function add_category($goods_id, $category_id){
        $db = Database::get_instance();
        $req = $db->prepare(
            'INSERT INTO category_goods (category_id, goods_id) '.
            'VALUES (:category_id, :goods_id)'
        );
        $stm = $req->execute(array(
            'category_id' => $category_id,
            'goods_id' => $goods_id
        ));
        return $stm;
    }
    
    public static function other_goods($id){
        $list = [];
        $db = Database::get_instance();
        $req = $db->prepare(
            'SELECT goods.id, goods.name, goods.short_description,
             goods.full_description, goods.active, goods.in_stock,
             goods.can_be_ordered, GROUP_CONCAT(category.name) '.
            'FROM goods '.
            'INNER JOIN category_goods ON goods.id = category_goods.goods_id '.
            'LEFT JOIN category ON category_goods.category_id = category.id '.
            'WHERE goods.id IN (SELECT goods_id FROM category_goods WHERE category_id = :id) '.
            'GROUP BY goods.name ');

        $req->execute(array('id' => $id));

        foreach ($req->fetchAll() as $goods){
            $list[] = new Goods(
                $goods['id'],
                $goods['name'],
                $goods['short_description'],
                $goods['full_description'],
                $goods['active'],
                $goods['in_stock'],
                $goods['can_be_ordered'],
                $goods['GROUP_CONCAT(category.name)']);
        }
        return $list;
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
