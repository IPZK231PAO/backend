<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $record_id = $_POST['record_id'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM tov WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$record_id]);

        if ($stmt->rowCount() > 0) {
            echo "Запис успішно вилучено.";
        } else {
            echo "Запис з таким ID не знайдено.";
        }

    } catch (PDOException $e) {
        echo "Помилка: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Видалити запис</title>
</head>
<body>
    <h2>Видалити запис</h2>
    <form action="delete.php" method="post">
        <label for="record_id">№ запису:</label>
        <input type="text" id="record_id" name="record_id" required><br><br>
        <input type="submit" value="Вилучити">
    </form>
</body>
</html>
