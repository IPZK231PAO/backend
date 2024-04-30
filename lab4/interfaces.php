<?php

// Інтерфейс "Прибирання будинку"
interface HouseCleaning {
    public function cleanRoom();
    public function cleanKitchen();
}

// Клас Human з інтерфейсом "Прибирання будинку"
class Human implements HouseCleaning {
    // Реалізація методів інтерфейсу "Прибирання будинку" для класу Human
    public function cleanRoom() {
        echo "Людина прибирає кімнату<br>";
    }

    public function cleanKitchen() {
        echo "Людина прибирає кухню<br>";
    }
}

// Клас Student успадковує клас Human та реалізує інтерфейс "Прибирання будинку"
class Student extends Human {
    // Перевизначення методів інтерфейсу "Прибирання будинку" для класу Student
    public function cleanRoom() {
        echo "Студент прибирає кімнату<br>";
    }

    public function cleanKitchen() {
        echo "Студент прибирає кухню<br>";
    }
}

// Клас Programmer успадковує клас Human та реалізує інтерфейс "Прибирання будинку"
class Programmer extends Human {
    // Перевизначення методів інтерфейсу "Прибирання будинку" для класу Programmer
    public function cleanRoom() {
        echo "Програміст прибирає кімнату<br>";
    }

    public function cleanKitchen() {
        echo "Програміст прибирає кухню<br>";
    }
}

// Перевірка роботи методів прибирання в обох класах
$student = new Student();
$student->cleanRoom(); // Виведе: Студент прибирає кімнату
$student->cleanKitchen(); // Виведе: Студент прибирає кухню

$programmer = new Programmer();
$programmer->cleanRoom(); // Виведе: Програміст прибирає кімнату
$programmer->cleanKitchen(); // Виведе: Програміст прибирає кухню

?>
