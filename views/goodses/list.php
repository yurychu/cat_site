<?php foreach ($goodses as $goods){?>
    <p>
        <?php 
            echo $goods->name; 
            echo $goods->category;
        ?>
        <a href="?controller=categories&action=details&id=<?php echo $category->id;?>">Подробнее</a>
    </p>
<?php } ?>
