<?php foreach ($categories as $category){?>
    <p>
        <?php echo $category->name; ?>
        <a href="?controller=categories&action=details&id=<?php echo $category->id;?>">Подробнее</a>
    </p>
<?php } ?>
