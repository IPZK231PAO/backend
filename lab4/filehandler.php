<?php

class FileHandler {
    // Статичне поле для директорії
    public static $dir = "text";

    // Статичний метод для читання з файлу
    public static function readFromFile($filename) {
        $filePath = self::$dir . '/' . $filename;
        if (file_exists($filePath)) {
            $content = file_get_contents($filePath);
            return $content;
        } else {
            return "Файл '$filename' не існує.";
        }
    }

    // Статичний метод для запису в файл
    public static function writeToFIle($filename, $content) {
        $filePath = self::$dir . '/' . $filename;
        if (file_exists($filePath)) {
            file_put_contents($filePath, $content, FILE_APPEND);
            return "Дані успішно записано у файл '$filename'.";
        } else {
            return "Файл '$filename' не існує.";
        }
    }

    // Статичний метод для очищення вмісту файлу
    public static function clearFile($filename) {
        $filePath = self::$dir . '/' . $filename;
        if (file_exists($filePath)) {
            file_put_contents($filePath, "");
            return "Вміст файлу '$filename' успішно очищено.";
        } else {
            return "Файл '$filename' не існує.";
        }
    }
}

// Створення директорії та файлів
if (!is_dir(FileHandler::$dir)) {
    mkdir(FileHandler::$dir);
}
file_put_contents(FileHandler::$dir . '/file1.txt', "Content of file1.txt\n");
file_put_contents(FileHandler::$dir . '/file2.txt', "Content of file2.txt\n");
file_put_contents(FileHandler::$dir . '/file3.txt', "Content of file3.txt\n");

// Перевірка роботи методів
echo FileHandler::readFromFile('file1.txt') . "<br>"; // Виведе вміст file1.txt
echo FileHandler::readFromFile('file4.txt') . "<br>"; // Виведе повідомлення про відсутність файлу

echo FileHandler::writeToFIle('file2.txt', "New content for file2.txt\n"); // Додає новий вміст у file2.txt
echo FileHandler::writeToFIle('file4.txt', "New content for file4.txt\n"); // Виведе повідомлення про відсутність файлу

echo FileHandler::readFromFile('file2.txt') . "<br>"; // Виведе оновлений вміст file2.txt

echo FileHandler::clearFile('file3.txt') . "<br>"; // Очищує вміст file3.txt
echo FileHandler::readFromFile('file3.txt') . "<br>"; // Виведе порожній вміст file3.txt

?>
