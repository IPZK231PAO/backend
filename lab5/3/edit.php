<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', '');

    $stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
    $stmt->execute([$id]);
    $employee = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Редагування працівника</title>
</head>
<body>
    <h2>Редагування працівника</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
        <label for="name">Ім'я:</label>
        <input type="text" id="name" name="name" value="<?php echo $employee['name']; ?>" required><br><br>
        <label for="position">Посада:</label>
        <input type="text" id="position" name="position" value="<?php echo $employee['position']; ?>" required><br><br>
        <label for="salary">Зарплата:</label>
        <input type="text" id="salary" name="salary" value="<?php echo $employee['salary']; ?>" required><br><br>
        <input type="submit" value="Оновити">
    </form>
</body>
