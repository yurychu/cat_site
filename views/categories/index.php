<p>Здесь будет список всех категорий</p>

<?php foreach ($categories as $category){?>
    <p>
        <?php echo $category->name; ?>
        <a href="?controller=categories&action=show&id=<?php echo $category->id;?>">Подробнее</a>
    </p>
<?php } ?>
