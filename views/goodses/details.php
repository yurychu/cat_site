<p>Подробное описание категории</p>

<p>
    Название: <br>
    <?php echo $goods->name;?>
</p>
<p>
    Краткое описание: <br>
    <?php echo $goods->short_description;?>
</p>
<p>
    Полное описание: <br>
    <?php echo $goods->full_description;?>
</p>
<p>
    Активность: <br>
    <?php echo $goods->active;?>
</p>
<p>
    Наличие: <br>
    <?php echo $goods->in_stock;?>
</p>
<p>
    Возможность заказать: <br>
    <?php echo $goods->can_be_ordered;?>
</p>
<p>
    Категории: <br>
    <?php
        foreach ($goods->category as $category){
            echo $category['name'];
            ?>
                <a href="?controller=goodses&action=other_goods&category_id=<?= $category['id'] ?>">Посмотреть другие товары в этой категории</a><br>
            <?php
        }
    ;?>
</p>