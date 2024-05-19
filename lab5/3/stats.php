<?php
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', '');

$stmt = $pdo->query("SELECT AVG(salary) AS average_salary FROM employees");
$row = $stmt->fetch();
$average_salary = $row['average_salary'];

$stmt = $pdo->query("SELECT position, COUNT(*) AS count FROM employees GROUP BY position");
$positions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Статистика</title>
</head>
<body>
    <h2>Статистика</h2>

    <h3>Середня зарплата всіх працівників: $<?php echo number_format($average_salary, 2); ?></h3>

    <h3>Кількість працівників на кожній посаді:</h3>
    <ul>
        <?php foreach ($positions as $position): ?>
            <li><?php echo $position['position']; ?>: <?php echo $position['count']; ?> працівників</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
