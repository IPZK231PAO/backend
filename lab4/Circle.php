<?php

class Circle {
    private float $x; // координата X центру кола
    private float $y; // координата Y центру кола
    private float $radius; // радіус кола
    
    // Конструктор класу
    public function __construct(float $x, float $y, float $radius) {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }
    
    // Метод для отримання рядкового представлення об'єкта
    public function __toString(): string {
        return "Коло з центром в ($this->x, $this->y) і радіусом $this->radius";
    }
    
    // Методи GET для отримання значень полів
    public function getX(): float {
        return $this->x;
    }
    
    public function getY(): float {
        return $this->y;
    }
    
    public function getRadius(): float {
        return $this->radius;
    }
    
    // Методи SET для встановлення значень полів
    public function setX(float $x): void {
        $this->x = $x;
    }
    
    public function setY(float $y): void {
        $this->y = $y;
    }
    
    public function setRadius(float $radius): void {
        $this->radius = $radius;
    }
    
    // Метод для перевірки перетину кола з іншим колом
    public function intersect(Circle $otherCircle): bool {
        // Відстань між центрами кол із координатами (x1, y1) та (x2, y2)
        $distance = sqrt(($this->x - $otherCircle->getX())**2 + ($this->y - $otherCircle->getY())**2);
        
        // Радіуси кол
        $radius1 = $this->radius;
        $radius2 = $otherCircle->getRadius();
        
        // Якщо відстань між центрами менше за суму радіусів, то кола перетинаються
        return $distance < ($radius1 + $radius2);
    }
}

// Створення об'єктів та перевірка методу intersect()
$circle1 = new Circle(3, 4, 5);
$circle2 = new Circle(6, 8, 4);

echo $circle1 . "<br>"; // Виведе: Коло з центром в (3, 4) і радіусом 5
echo $circle2 . "<br>"; // Виведе: Коло з центром в (6, 8) і радіусом 4

if ($circle1->intersect($circle2)) {
    echo "Кола перетинаються";
} else {
    echo "Кола не перетинаються";
}

?>
