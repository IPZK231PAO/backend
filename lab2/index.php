<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2</title>
</head>
<body>
   <!-- 1 -->
    <form method="post" action="">
        <label for="text">Текст:</label><br>
        <input type="text" id="text" name="text"><br><br>

        <label for="find">Знайти:</label><br>
        <input type="text" id="find" name="find"><br><br>

        <label for="replace">Замінити на:</label><br>
        <input type="text" id="replace" name="replace"><br><br>

        <input type="submit" value="Замінити">
    </form>

    <h2>Результат:</h2>
    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST['text'];
        $find = $_POST['find'];
        $replace = $_POST['replace'];
        $result = str_replace($find, $replace, $text);
        echo $result;
     }
    ?>
<!-- 2 -->
<h2>назви міст через пробіл:</h2>
    <form method="post" action="">
        <input type="text" name="cities" placeholder="Введіть назви міст"><br><br>
        <input type="submit" value="Сортувати">
    </form>

    <h2>Відсортовані міста:</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['cities'];

        $cities_array = explode(" ", $input);

        sort($cities_array);

        foreach ($cities_array as $city) {
            echo $city . "<br>";
        }
    }
    ?>
    <!-- 3 -->
    <?php
// Заданий рядок з повним шляхом до файлу
$string = 'D:\\wamp64\\domains\\lab2\\path.txt';

// Отримуємо тільки ім'я файлу без шляху
$filename = basename($string);

// Виділяємо ім'я файлу без розширення
$filename_without_extension = pathinfo($filename, PATHINFO_FILENAME);

// Виводимо результат
echo "Ім'я файлу без розширення: " . $filename_without_extension."<br>";
?>
<!-- 4 -->
<?php 
$date1 = '10-02-2015';
$date2 = '15-02-2015';

// Створення об'єктів DateTime для кожної дати
$dateObj1 = DateTime::createFromFormat('d-m-Y', $date1);
$dateObj2 = DateTime::createFromFormat('d-m-Y', $date2);

// Визначення різниці між датами у днях
$interval = $dateObj1->diff($dateObj2);
$daysDifference = $interval->days;

echo "Кількість днів між датами: " . $daysDifference."<br>";
?>
<!-- 5 -->
<br>
<br>
<?php

function generatePassword($length = 10) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_';

    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }

    return $password;
}


function checkPasswordStrength($password) {

    if (strlen($password) < 8) {
        return false;
    }

 
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }

 
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }

   
    if (!preg_match('/\d/', $password)) {
        return false;
    }

 
    if (!preg_match('/[!@#$%^&*()-_]/', $password)) {
        return false;
    }

    return true;
}


$password = generatePassword();
echo "Згенерований пароль: $password <br>";


if (checkPasswordStrength($password)) {
    echo "Пароль є достатньо міцним!";
} else {
    echo "Пароль не є достатньо міцним!";
}
echo "<br><br><br>"
?>

<!-- 2 module -->
<?php
// Функція для виведення елементів масиву, що повторюються
function findDuplicates($array) {
  
    $duplicates = array_count_values($array);
    foreach ($duplicates as $key => $value) {
        if ($value > 1) {
            echo "$key повторюється $value раз(ів)<br>";
        }
    }
}

// Функція-генератор імен тваринок
function generateAnimalName($components) {
    $animal = '';
    foreach ($components as $component) {
        $animal .= $component[rand(0, count($component) - 1)];
    }
    return ucfirst($animal); // Перша літера велика
}

// Функція для створення масиву з випадковою довжиною та значеннями
function createArray() {
    $length = rand(3, 7);
    $array = [];
    for ($i = 0; $i < $length; $i++) {
        $array[] = rand(10, 20);
    }
    return $array;
}

// Функція для об'єднання, видалення дублікатів та сортування масивів
function processArrays($array1, $array2) {
    $mergedArray = array_merge($array1, $array2);
    $uniqueArray = array_unique($mergedArray);
    sort($uniqueArray);
    return $uniqueArray;
}

// використання

// 1. Знаходження дублікатів у масиві
$array = [1, 2, 3, 4, 1, 2, 5, 6, 3];
echo "Дублікати:<br>";
findDuplicates($array);
echo "<br>";

// 2. Генерація імен тваринок
$animalComponents = [
    ['fluffy', 'furry', 'sunny', 'shadow'],
    ['paws', 'tail', 'whiskers', 'nose'],
    ['cat', 'dog', 'hamster', 'rabbit']
];
echo "Згенеровані імена тваринок:<br>";
for ($i = 0; $i < 5; $i++) {
    echo generateAnimalName($animalComponents) . "<br>";
}
echo "<br>";

// 3. Обробка масивів
$array1 = createArray();
$array2 = createArray();
echo "Масив 1: " . implode(', ', $array1) . "<br>";
echo "Масив 2: " . implode(', ', $array2) . "<br>";
echo "Результат після обробки:<br>";
$resultArray = processArrays($array1, $array2);
echo implode(', ', $resultArray) . "<br>";

// 4. Сортування асоціативного масиву
$users = [
    'John' => 30,
    'Alice' => 25,
    'Bob' => 35
];

function sortUsers($users, $by) {
    if ($by == 'age') {
        asort($users);
    } elseif ($by == 'name') {
        ksort($users);
    }
    return $users;
}

echo "<br>Сортування за віком:<br>";
print_r(sortUsers($users, 'age'));
echo "<br>Сортування за ім'ям:<br>";
print_r(sortUsers($users, 'name'));
?>
<!-- 3 -->
<a href="/Ex3Main.php">Ex3</a>
<!-- 4 -->
<form action="calculate.php"  method="post">
        <label for="x">Enter value for x:</label>
        <input type="text" id="x" name="x"><br><br>
        <label for="y">Enter value for y:</label>
        <input type="text" id="y" name="y"><br><br>
        <input type="submit" value="Calculate">
    </form>

</body>
</html>