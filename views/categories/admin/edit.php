<form action="?controller=categories&action=edited" method="POST">
        <input type="hidden" name="id" value="<?= $category->id ?>">
    <p>
        <label for="name">Название категории</label>
        <input type="text" id="name" name="name" value="<?= $category->name ?>">
    </p>
    <p>
        <label for="short_description">Сокращенное описание</label>
        <textarea id="short_description" name="short_description"><?= $category->short_description ?></textarea>
    </p>
    <p>
        <label for="full_description">Полное описание</label>
        <textarea id="full_description" name="full_description"><?= $category->full_description ?></textarea>
    </p>
    <p>
        <label for="active">Активность</label>
        <input type="number" id="active" name="active" value="<?= $category->active ?>">
    </p>
    <input type="submit">
</form>
