<?php


// Подключение к базе данных
$servername = "test";
$username = "root";  
$password = ""; 
$dbname = "countries"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Обработка данных из формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Какая-никакая защита от SQL-инъекций 
    $sql = $conn->prepare("INSERT INTO countries (name, population, capital, area) VALUES (?, ?, ?, ?)");
    $sql->bind_param("sdsd", $name, $population, $capital, $area);

    $name = $_POST["name"];
    $population = $_POST["population"];
    $capital = $_POST["capital"];
    $area = $_POST["area"];
    
    // // Запрос на вставку данных в таблицу
    if ($sql->execute()) {
        
        header("Location: table.php");
        exit;
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
    
}

$conn->close();
