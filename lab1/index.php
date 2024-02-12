<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        echo '<p>Полину в мріях в купель океану,</p>
        <p>Відчую <b>шовковистість</b> глибини,</p>
        <pstyle="text-indent:5px">Чарівні мушлі з дна собі дістану,</p>
        <p style="text-indent:15px">Щоб <b>взимку</b>
        <p style="text-indent:30px"><u>тішили</u></p>
        <p style="text-indent:45px">мене</p>
        <p style="text-indent:60px">вони…
        </p>';
    
    ?>
   <?php 
   $uah=1500;
   $usd=$uah/37.6;
   echo $uah.'грн. '.'можна обміняти на '.round($usd,1).' долар';
   ?>
   <?php 
   echo '<br>';
        $seasonNum=1;
        $season=0;
        if($seasonNum==1) {$season= 'Січень';}
       else if($seasonNum==2) { $season= 'Лютий' ;}
       else if($seasonNum==3)  {$season= 'Березень'; }
       else if($seasonNum==4){  $season='Квітень';} 
       else if( $seasonNum==5 ) {$season= 'Травень' ;}
       else if($seasonNum==6 ) {$season= 'Червень'; }
       else if($seasonNum==7) { $season= 'Липень';} 
       else if( $seasonNum==8)  {$season= 'Серпень'; }
       else if($seasonNum==9)  {$season='Вересень' ;}
       else if($seasonNum==10 ) {$season= 'Жовтень' ;}
       else if($seasonNum==11) {$season='Листопад' ;}
       elseif($seasonNum==12)  {$season= 'Грудень';}
        else {$season='Введіть число менше за 12 й більше за 0';}
        echo $season;
   ?>
   

<?php
echo '<br>';
function letters($letter) {
    switch(strtolower($letter)) {
        
        case 'a':
        case 'e':
        case 'i':
        case 'o':
        case 'u':
            return "Голосна літера";
            break;
        default:
            return "Приголосна літера";
            break;
        
    }
}

$char = 'B'; 
$result=letters($char);
echo "$char' є $result <br>";

?>
<?php 
    echo '<br>';
    $randomNum=mt_rand(100,300);
    echo $randomNum;
    
    $randomNumSum = array_sum(str_split($randomNum));
    echo "<br>Сума  : $randomNumSum<br>";

    $reverseNum = strrev($randomNum);
    echo "Число, отримане в зворотному порядку цифр: $reverseNum<br>";

    $arrayOfNums = str_split($randomNum);
    rsort($arrayOfNums);
    
    $biggestNum = implode('', $arrayOfNums);
    echo "Найбільше число з можливих  : $biggestNum<br>";
?>

<?php


function createTable($rows, $cols) {
    echo "<table border='1px solid black'>";
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $cols; $j++) {
            $color = 'rgb('.mt_rand(0, 255).','.mt_rand(0, 255).','.mt_rand(0, 255).')';
            echo "<td style='background-color: $color;'>$color</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function randomPosSquares($n) {
    echo "<div style='position: relative; width: 700px; height: 700px; background-color: black;'>";
    for ($i = 0; $i < $n; $i++) {
  
        $size = mt_rand(20, 100).'px';
        $top = mt_rand(0, 600).'px';
        $left = mt_rand(0, 600).'px';
        echo "<div style='z-index:$i; position: absolute; width: $size; height: $size; top: $top; left: $left; background-color: red;'></div>";
    }
    echo "</div>";
}


$rows = 3;
$columns = 4;
createTable($rows, $columns);

$n = 10;
randomPosSquares($n);

?>
</body>
</html>