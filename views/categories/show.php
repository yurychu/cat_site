<p>Подробное описание категории</p>

<p>
    Название: <br>
    <?php echo $category->name;?>
</p>
<p>
    Краткое описание: <br>
    <?php echo $category->short_description;?>
</p>
<p>
    Полное описание: <br>
    <?php echo $category->full_description;?>
</p>
<p>
    Активность: <br>
    <?php echo $category->action;?>
</p>

<a href="?controller=categories&action=edit&id=<?= $category->id ?>">Редактировать</a>