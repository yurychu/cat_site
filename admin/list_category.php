<h1>Список категорий</h1>
<?php
require_once '../classes/Database.php';
$database = new Database();
$result = $database->show_categories();
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        echo "<h2>".$row['name']."</h2>".
        "Краткое описание: ". $row['short_description']. "<br>".
        "Полное описание: " . $row['full_description']. "<br>" .
        "Активность категории: ". $row['active']. "<br>";
    }
} else {
    echo "Результаты не найдены";
}
include '../includes/footer_admin.php';
