<form action="" method="post">
    <p>
        <label for="server">Адрес сервера БД</label>
        <input type="text" id="server" name="server" autofocus placeholder="напр. localhost">
    </p>
    <p>
        <label for="user">Имя пользователя БД</label>
        <input type="text" id="user" name="user">
    </p>

    <p>
        <label for="password">Пароль доступа к БД</label>
        <input type="password" id="password" name="password">
    </p>
    <input type="submit" value="Создать БД для приложения">
</form>

<?php
// тут сразу создаем бд и нужные таблицы
    if (!empty($_POST["server"]) &&
        !empty($_POST['user']) &&
        !empty($_POST['password'])){

        $server = $_POST["server"];
        $user = $_POST['user'];
        $password = $_POST['password'];

        $connection = new mysqli($server, $user, $password);

        // обработка неудачи соединения с БД
        if ($connection->connect_error){
            die("Не удалось соединиться с БД -- " . $connection->connect_error);
        } else {
            echo "Соединение установлено <br>";
        }

        // создаем базу данных
        $sql = "CREATE DATABASE catalog_site;";
        if ($connection->query($sql) === TRUE){
            echo "База данных успешно создана";
        } else {
            echo "Ошибка создания базы данных -- " . $connection->error . "<br>";
        }

        $connection->close();

    }
?>