<?php
class AdminGoodsesController {
    public function list_()
    {
        $goodses = Goods::all();
        require_once('views/goodses/admin/admin_list.php');
    }
}