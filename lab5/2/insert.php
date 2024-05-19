<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Додати запис</title>
</head>
<body>
    <h2>Додати новий запис</h2>
    <form action="insert.php" method="post">
        <label for="name">Назва:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="description">Опис:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        <label for="price">Ціна:</label>
        <input type="text" id="price" name="price" required><br><br>
        <label for="quantity">Кількість:</label>
        <input type="number" id="quantity" name="quantity" required><br><br>
        <input type="submit" value="Додати">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            $sql = "INSERT INTO tov (name, description, price, quantity) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $description, $price, $quantity]);

            echo "Запис успішно додано.";

        } catch (PDOException $e) {
            echo "Помилка: " . $e->getMessage();
        }
    }
    ?>
</body>
</html>
