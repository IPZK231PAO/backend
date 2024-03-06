<?php



require_once "Function/func.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = $_POST["x"];
    $y = $_POST["y"];
    
    $operations = ["sin(x)", "cos(x)", "tan(x)", "x^y", "x!"];

    // Масив для збереження результатів
    $results = [];

    // Виконати кожну операцію і зберегти результат
    foreach ($operations as $operation) {
        switch ($operation) {
            case "sin(x)":
                $results[] = Function\my_sin($x);
                break;
            case "cos(x)":
                $results[] = Function\my_cos($x);
                break;
            case "tan(x)":
                $results[] = Function\my_tan($x);
                break;
            case "x^y":
                $results[] = Function\my_pow($x, $y);
                break;
            case "x!":
                $results[] = Function\my_factorial($x);
                break;
            default:
                $results[] = "Invalid operation";
        }
    }

    // Вивести результати у вигляді таблиці
    echo "<table  style='border-collapse: collapse' >";
    echo "<tr style='background-color: yellow; '>";
    foreach ($operations as $operation) {
        echo "<th  style='font-size:30px;font-weight:bold;border:1px solid black'>$operation</th>";
    }
    echo "</tr>";
    echo "<tr>";
    foreach ($results as $result) {
        echo "<td style='border:1px solid black'>$result</td>";
    }
    echo "</tr>";
    echo "</table>";
}

?>