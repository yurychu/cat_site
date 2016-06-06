<h2>Добавление категории для товара <?= $goods->name?></h2>

<form action="?controller=goodses&action=add_category" method="POST">
    <input type="hidden" name="goods_id" value="<?= $goods->id ?>">
    <p>
        <label for="category">Категория</label>
        <select id="category" name="category_id">
            <option disabled selected>Выберите категорию</option>
            <?php foreach ($categories as $category){?>
                <option value="<?=$category->id?>">
                    <?= $category->name; ?>
                </option>
            <?php } ?>
        </select>
    </p>
    <input type="submit" value="Добавить">
</form>
