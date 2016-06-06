<?php
class AdminGoodsesController {
    public function list_(){
        $goodses = Goods::all();
        require_once('views/goodses/public/public_list.php');
    }
    
    public function details(){
        if(!isset($_GET['id']))
            return call('pages', 'error');

        $goods = Goods::find($_GET['id']);
        require_once('views/goodses/public/public_details.php');
    }
    
    
    public function other_goods(){
        if(!isset($_GET['category_id']))
            return call('pages', 'error');
        $goodses = Goods::other_goods($_GET['category_id']);
        require_once('views/goodses/public/public_list.php');
    }
}
