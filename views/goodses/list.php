<?php foreach ($goodses as $goods){?>
    <p><span>Товар:</span>
        <?php 
            echo $goods->name . '. '; ?>
        <span>В наличии: </span>
        <?php
            echo $goods->in_stock . '. '; ?>
        <span>Возможно заказать: </span>
        <?php
            echo $goods->can_be_ordered . '. '; ?>
        <span>В категориях: </span>
        <?php
            echo $goods->category;
        ?>
        <a href="?controller=goodses&action=details&id=<?php echo $goods->id;?>">Подробнее</a>
    </p>
<?php } ?>
