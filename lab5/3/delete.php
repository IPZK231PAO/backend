<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', '');

    // Видалення запису з бази даних
    $stmt = $pdo->prepare("DELETE FROM employees WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit();
}
?>
