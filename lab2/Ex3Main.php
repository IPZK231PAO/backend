<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form enctype="multipart/form-data" method="post" action="Ex3GetForm.php">
        <label for="login">Логін::</label><br>
        <input type="text" id="login" name="login"><br><br>

        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <label for="passwordagain">Пароль(ще раз):</label><br>
        <input type="password" id="passwordagain" name="passwordagain"><br><br>

        <input type="radio" id="male" name="gender" value="Чоловік">
        <label for="male">Чоловік</label>
        <input type="radio" id="female" name="gender" value="Жінка">
        <label   label for="female">Жінка</label>
        <br>
        <label for="city">city</label>
        <select name="city" id="city">
            <option value="Zhytomir">Zhytomir</option>
            <option value="Kharkiv">Kharkiv</option>
            <option value="Kyiv">Kyiv</option>

        </select>
        <br>
        <label for="game">Ігри::</label> <br>
        <input type="checkbox" name="WOT" id="WOT">WOT <br>
        <input type="checkbox" name="WOW" id="WOW">WOW <br>
        <input type="checkbox" name="CS" id="CS">CS <br>
<br>
        <label for="about">Про себе</label>
        <textarea name="about" id="about" cols="30" rows="10"></textarea> <br>
        <label for="file">Photo</label>
        <input type="file" name="file" id="file"> <br>
        <input type="submit" value="Заруєструватись">
    </form>
    <a href="Ex3Main.php?lang=ukr"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Flag_of_Ukraine.svg/250px-Flag_of_Ukraine.svg.png"  width="40px" height="20px" alt="ukr"></a>
    <a href="Ex3Main.php?lang=eng"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg/640px-Flag_of_the_United_Kingdom_%283-5%29.svg.png"  width="40px" height="20px" alt="eng"></a>
    <?php
if(isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    setcookie('lang', $lang, time() + (6 * 30 * 24 * 60 * 60)); // Піврік
} else {
    if(isset($_COOKIE['lang'])) {
        $lang = $_COOKIE['lang'];
    } else {
        $lang = 'ukr';
    }
}


if($lang == 'ukr') {
    echo "Вибрана мова: Українська";
} elseif ($lang == 'eng') {
    echo "Selected language: English";
} 
?>
</body>
</html>