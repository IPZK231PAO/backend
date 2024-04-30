<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//1ex
if(isset($_GET['fontsize'])) {
    $fontsize = $_GET['fontsize']; 
    setcookie('fontsize', $fontsize, time() + (30 * 24 * 60 * 60), '/');
} else {
    $fontsize = isset($_COOKIE['fontsize']) ? $_COOKIE['fontsize'] : 'medium'; 
}

echo "<style>body { font-size: $fontsize; }</style>";
?>


<a href="?fontsize=large">Великий шрифт</a> |
<a href="?fontsize=medium">Середній шрифт</a> |
<a href="?fontsize=small">Маленький шрифт</a>
<h1>ex2</h1>
<?php

session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echo "Добрий день, Admin!";
} else {
    if(isset($_POST['login']) && isset($_POST['password'])) {
        if($_POST['login'] === 'Admin' && $_POST['password'] === 'password') {
            $_SESSION['logged_in'] = true;
            echo "Добрий день, Admin!";
        } else {
            echo "Невірний логін або пароль!";
        }
    } else {
        echo '
        <form method="post" action="">
            <label for="login">Логін:</label>
            <input type="text" id="login" name="login"><br>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Увійти">
        </form>
        ';
    }
}

?>
<!-- ex 3 -->
<form method="post" action="">
        <label for="name">Ім'я:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="comment">Коментар:</label><br>
        <textarea id="comment" name="comment"></textarea><br><br>
        <input type="submit" value="Відправити">
    </form>
    
    <h2>Поточні коментарі</h2>
    <table border="1">
        <tr>
            <th>Ім'я</th>
            <th>Коментар</th>
        </tr>
        <?php
     
        if(isset($_POST['name']) && isset($_POST['comment'])) {
     
            $name = $_POST['name'];
            $comment = $_POST['comment'];
            
         
            $file = fopen("comments.txt", "a");
            
            /
            fwrite($file, "$name: $comment\n");
            

            fclose($file);
        }
        
        $file = fopen("comments.txt", "r");
        if ($file) {
            while (($line = fgets($file)) !== false) {
                // Розділяємо рядок на ім'я та коментар
                list($name, $comment) = explode(':', $line, 2);
                echo "<tr><td>$name</td><td>$comment</td></tr>";
            }
            fclose($file);
        }
        ?>
    </table>
    <!-- 3.2 -->
    <?php
// Зчитуємо слова з файлів
$file1 = file_get_contents('file1.txt');
$file2 = file_get_contents('file2.txt');

// Розділяємо слова на масиви
$words1 = explode(' ', $file1);
$words2 = explode(' ', $file2);

// Рядки тільки в першому файлі
$unique_to_file1 = array_diff($words1, $words2);
file_put_contents('unique_to_file1.txt', implode(' ', $unique_to_file1));

// Рядки в обох файлах
$common_to_both = array_intersect($words1, $words2);
file_put_contents('common_to_both.txt', implode(' ', $common_to_both));

// Рядки в кожному файлі більше двох разів
$words_count1 = array_count_values($words1);
$words_count2 = array_count_values($words2);

$common_twice_or_more = [];
foreach ($words_count1 as $word => $count) {
    if ($count >= 2 && isset($words_count2[$word]) && $words_count2[$word] >= 2) {
        $common_twice_or_more[] = $word;
    }
}
file_put_contents('common_twice_or_more.txt', implode(' ', $common_twice_or_more));


if(isset($_POST['filename'])) {
    $filename = $_POST['filename'];
    unlink($filename);
    echo "Файл $filename був видалений.";
}
?>
<form method="post" action="">
        <label for="filename">Ім'я файлу для видалення:</label><br>
        <input type="text" id="filename" name="filename"><br><br>
        <input type="submit" value="Видалити файл">
    </form>
    <!-- 3.3 -->
    <?php
// Зчитуємо слова з файлу
$words = file_get_contents('words.txt');

// Розділяємо слова на масив
$words_array = explode(' ', $words);

// Сортуємо слова за алфавітом
sort($words_array);

file_put_contents('sorted_words.txt', implode(' ', $words_array));

echo "Слова були впорядковані за алфавітом";
?>
<!-- 4 -->
<h2>Upload Image</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="image">
        <button type="submit" name="submit">Upload</button>
    </form>
    <?php
// Перевірка, чи було надіслано файл
if(isset($_POST["submit"])) {
    $targetDirectory = "uploads/"; // Каталог для збереження завантажених зображень

    // Отримання інформації про завантажений файл
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Перевірка чи файл є зображенням
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        // Завантаження файлу на сервер
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
            echo "Файл ".$fileName. " було успішно завантажено.";
        } else {
            echo "Помилка під час завантаження файлу.";
        }
    } else {
        echo "Дозволені формати файлів: JPG, JPEG, PNG, GIF.";
    }
}
?>
<!-- 5 -->
<h2>Create Folder</h2>
    <form action="create_folder.php" method="post">
        <label for="login">Логін:</label>
        <input type="text" name="login" id="login" required><br><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required><br><br>
        <button type="submit" name="submit">Створити папку</button>
    </form>
    <?php
if(isset($_POST["submit"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    // Перевірка вірності пароля (можна використовувати більш складні методи перевірки)
    if ($password === '123') {
        $userFolder = 'users/' . $login;
        // Перевірка наявності папки
        if (!file_exists($userFolder)) {
            // Створення основної папки користувача
            mkdir($userFolder, 0777, true);
            
            // Створення підпапок
            $subFolders = ['video', 'music', 'photo'];
            foreach ($subFolders as $folder) {
                mkdir($userFolder . '/' . $folder, 0777, true);
            }
            
            // Створення декількох файлів у кожній підпапці
            $filesCount = 3; // Кількість файлів для створення
            foreach ($subFolders as $folder) {
                for ($i = 1; $i <= $filesCount; $i++) {
                    $filePath = $userFolder . '/' . $folder . '/file' . $i . '.txt';
                    file_put_contents($filePath, 'Content of file ' . $i);
                }
            }
            
            echo "Папка з ім'ям \"$login\" успішно створена.";
        } else {
            echo "Папка з ім'ям \"$login\" вже існує.";
        }
    } else {
        echo "Неправильний пароль.";
    }
}
?>
</body>
</html>