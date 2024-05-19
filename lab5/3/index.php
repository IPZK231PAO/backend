<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Список працівників</title>
</head>
<body>
    <h2>Список працівників</h2>

    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', '');

    // Виведення записів
    $stmt = $pdo->query("SELECT * FROM employees");
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Ім'я</th>
                <th>Посада</th>
                <th>Зарплата</th>
                <th>Дії</th>
            </tr>";
    while ($row = $stmt->fetch()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['position']}</td>
                <td>{$row['salary']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Редагувати</a>
                    <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Ви впевнені?\")'>Видалити</a>
                </td>
              </tr>";
    }
    echo "</table>";
    ?>

    <h2>Додати працівника</h2>
    <form action="insert.php" method="post">
        <label for="name">Ім'я:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="position">Посада:</label>
        <input type="text" id="position" name="position" required><br><br>
        <label for="salary">Зарплата:</label>
        <input type="text" id="salary" name="salary" required><br><br>
        <input type="submit" value="Додати">
    </form>
</body>
</html>
