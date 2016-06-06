<?php
require_once('views/goodses/details.php');
?>
<a href="?controller=goodses&action=edit&id=<?= $goods->id ?>">Редактировать</a>
<a href="?controller=goodses&action=create_category&id=<?= $goods->id ?>">Добавить категорию для товара</a>