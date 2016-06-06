<form action="?controller=goodses&action=edited" method="POST">
    <p>
        <label for="name">Название товара</label>
        <input type="text" id="name" name="name" value="<?= $goods->name ?>">
    </p>
    <p>
        <label for="short_description">Сокращенное описание</label>
        <textarea id="short_description" name="short_description"><?= $goods->short_description ?></textarea>
    </p>
    <p>
        <label for="full_description">Полное описание</label>
        <textarea id="full_description" name="full_description"><?= $goods->full_description ?></textarea>
    </p>
    <p>
        <label for="active">Активность</label>
        <input type="number" id="active" name="active" value="<?= $goods->active ?>">
    </p>
    <p>
        <label for="in_stock">Наличие в магазине</label>
        <input type="number" id="in_stock" name="in_stock" value="<?= $goods->in_stock?>">
    </p>
    <p>
        <label for="can_be_ordered">Возомжно заказать</label>
        <input type="number" id="can_be_ordered" name="can_be_ordered" value="<?= $goods->can_be_ordered?>">
    </p>
    <p>
        <label for="category">Категория</label>
        <select id="category" name="category" multiple>
            <option disabled selected>Выберите категорию</option>
            <?php foreach ($categories as $category){?>
                <option value="<?=$category->id?>">
                    <?= $category->name; ?>
                </option>
            <?php } ?>
        </select>
    </p>
    <input type="submit">
</form>
