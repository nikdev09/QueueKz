<?php
// Переменные с формы
date_default_timezone_set('Asia/Almaty');
$name = $_POST['name'];
$date = date('Y-m-d H:i:s');
$datenow = date('H:i');

// Параметры для подключения
$db_host = "localhost"; 
$db_user = "root"; // Логин БД
$db_password = ""; // Пароль БД
$db_base = 'queuekz'; // Имя БД
$db_table = "list"; // Имя Таблицы БД

try {
    // Подключение к базе данных
    $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
    // Устанавливаем корректную кодировку
    $db->exec("set names utf8_general_ci");
} catch (PDOException $e) {
    // Если есть ошибка соединения, выводим её
    print "Ошибка!: " . $e->getMessage() . "<br/>";
}
// Собираем данные для запроса
$data = array( 'name' => $name, 'date' => $date, 'datenow' => $datenow ); 
// Подготавливаем SQL-запрос
$query = $db->prepare("INSERT INTO $db_table (name, date, datenow) values (:name, :date, :datenow)");
// Выполняем запрос с данными
$query->execute($data);
header("Location: /");
?>
