<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div>
            <a href="/">Домой</a>
            <a href="?controller=categories&action=list_">Категории товаров</a>
            <a href="?controller=goodses&action=list_">Товары</a>
        </div>
        <?php require_once('public_routes.php'); // там связываем нужный функционал с контроллерами ?>
        <div>
            <hr>
        </div>
    </body>
</html>
