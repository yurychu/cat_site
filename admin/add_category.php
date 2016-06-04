<h1>Добавление новой категории</h1>

<?php if ($_SERVER['REQUEST_METHOD'] == "GET"):?>
    <form action="" method="POST">
        <p>
            <label for="name">Название категории</label>
            <input type="text" id="name" name="name" autofocus>
        </p>
        <p>
            <label for="short_description">Сокращенное описание</label>
            <textarea id="short_description" name="short_description"></textarea>
        </p>
        <p>
            <label for="full_description">Полное описание</label>
            <textarea id="full_description" name="full_description"></textarea>
        </p>
        <p>
            <label for="active">Активность</label>
            <input type="number" id="active" name="active">
        </p>
        <input type="submit">
    </form>
<?php else:
    require_once '../classes/Database.php';
    $database = new Database();
    $database->add_category($_POST);
    
endif;

include '../includes/footer_admin.php';
?>
