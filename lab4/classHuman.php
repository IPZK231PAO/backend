<?php
// 8
class Human {
    protected $height;
    protected $weight;
    protected $age;

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }
}

class Student extends Human {
    private $university;
    private $course;

    public function getUniversity() {
        return $this->university;
    }

    public function setUniversity($university) {
        $this->university = $university;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    public function promoteToNextCourse() {
        $this->course++;
    }
}

class Programmer extends Human {
    private $programmingLanguages = [];
    private $experience;

    public function getProgrammingLanguages() {
        return $this->programmingLanguages;
    }

    public function setProgrammingLanguages($programmingLanguages) {
        $this->programmingLanguages = $programmingLanguages;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function setExperience($experience) {
        $this->experience = $experience;
    }

    public function addProgrammingLanguage($language) {
        $this->programmingLanguages[] = $language;
    }
}

// Перевірка роботи класів і методів

$student = new Student();
$student->setHeight(180);
$student->setWeight(70);
$student->setAge(20);
$student->setUniversity("Harvard");
$student->setCourse(2);

echo "Student's height: " . $student->getHeight() . "<br>"; // Виведе: 180
echo "Student's weight: " . $student->getWeight() . "<br>"; // Виведе: 70
echo "Student's age: " . $student->getAge() . "<br>"; // Виведе: 20
echo "Student's university: " . $student->getUniversity() . "<br>"; // Виведе: Harvard
echo "Student's course: " . $student->getCourse() . "<br>"; // Виведе: 2

$student->promoteToNextCourse();
echo "Student promoted to course: " . $student->getCourse() . "<br>"; // Виведе: 3

$programmer = new Programmer();
$programmer->setHeight(175);
$programmer->setWeight(65);
$programmer->setAge(25);
$programmer->setExperience(3);
$programmer->addProgrammingLanguage("PHP");
$programmer->addProgrammingLanguage("JavaScript");
$programmer->addProgrammingLanguage("Python");

echo "Programmer's height: " . $programmer->getHeight() . "<br>"; // Виведе: 175
echo "Programmer's weight: " . $programmer->getWeight() . "<br>"; // Виведе: 65
echo "Programmer's age: " . $programmer->getAge() . "<br>"; // Виведе: 25
echo "Programmer's experience: " . $programmer->getExperience() . "<br>"; // Виведе: 3
echo "Programmer's programming languages: " . implode(", ", $programmer->getProgrammingLanguages()) . "<br>"; // Виведе: PHP, JavaScript, Python

?>
<!-- 9 -->
<?php

abstract class Human {
    protected $height;
    protected $weight;
    protected $age;

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    // Абстрактний метод "Повідомлення при народженні дитини"
    abstract protected function birthMessage();
    
    // Метод "Народження дитини"
    public function giveBirth() {
        $this->birthMessage();
    }
}

class Student extends Human {
    private $university;
    private $course;

    public function getUniversity() {
        return $this->university;
    }

    public function setUniversity($university) {
        $this->university = $university;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    // Реалізація абстрактного методу "Повідомлення при народженні дитини" для класу Student
    protected function birthMessage() {
        echo "Студентна народила дитину!";
    }
}

class Programmer extends Human {
    private $programmingLanguages = [];
    private $experience;

    public function getProgrammingLanguages() {
        return $this->programmingLanguages;
    }

    public function setProgrammingLanguages($programmingLanguages) {
        $this->programmingLanguages = $programmingLanguages;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function setExperience($experience) {
        $this->experience = $experience;
    }

    // Реалізація абстрактного методу "Повідомлення при народженні дитини" для класу Programmer
    protected function birthMessage() {
        echo "Програміст народив дитину!";
    }
}

// Перевірка роботи методів "народження"
$student = new Student();
$student->giveBirth(); // Виведе: Студентна народила дитину!

$programmer = new Programmer();
$programmer->giveBirth(); // Виведе: Програміст народив дитину!

?>

