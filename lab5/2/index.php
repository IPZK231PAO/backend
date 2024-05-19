
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tov";
    $result = $pdo->query($sql);
    
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Назва</th><th>Опис</th><th>Ціна</th><th>Кількість</th></tr>";
    while ($row = $result->fetch()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
        echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
} catch (PDOException $e) {
    echo "Помилка підключення: " . $e->getMessage();
}
?>

<br>
<form action="insert.php" method="post">
    <button type="submit">Додати запис</button>
</form>
<br>
<form action="delete.php" method="post">
    <input type="text" name="record_id" placeholder="№ запису">
    <button type="submit">Вилучити запис</button>
</form>
