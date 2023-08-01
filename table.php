<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylestable.css">
    <title>Список стран</title>
</head>
<body>
    <h1>Список стран:</h1>
    <?php

    
    // Подключение к базе данных
    $servername = "test"; 
    $username = "root";  
    $password = "";  
    $dbname = "countries";    

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }

    // Запрос на получение данных из таблицы
    $sql = "SELECT * FROM countries";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>
            <th>Название страны</th>
            <th>Численность населения</th>
            <th>Столица</th>
            <th>Площадь</th>
        </tr>";

        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['population'] . "</td>";
            echo "<td>" . $row['capital'] . "</td>";
            echo "<td>" . $row['area'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
    } else {
        echo "Нет данных.";
    }
    

    $conn->close();
    ?>
    <a href="index.html">Внести страну в список</a>
</body>
</html>

