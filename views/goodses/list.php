<?php foreach ($goodses as $goods){?>
    <p>
        <?php 
            echo $goods->name; 
            echo $goods->category;
        ?>
        <a href="?controller=goodses&action=details&id=<?php echo $goods->id;?>">Подробнее</a>
    </p>
<?php } ?>
