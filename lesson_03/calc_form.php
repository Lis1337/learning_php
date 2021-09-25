<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="calc_form.php" method="get">
    <p>
        <label>Введите числа в нужном порядке через пробел
            <input type="text" name="nums" size="40">
        </label>
    </p>
    <p>Выберите процедуру <input type="radio" id="+" name="procedure" value="+">
        <label for="+">+</label>
    <input type="radio" id="-" name="procedure" value="-">
        <label for="-">-</label>
    <input type="radio" id="*" name="procedure" value="*">
        <label for="*">*</label>
    <input type="radio" id="/" name="procedure" value="/">
        <label for="/">/</label>
    <p><input type="submit"></p>
</form>
<?php
if (isset($_GET['nums'])) {
    $nums = $_GET['nums'];
} else {
    $nums = null;
}
if ($nums != null) {
    $nums_array = explode(' ', $_GET['nums']);
    $procedure = $_GET['procedure'];
    $first_num = (float)$nums_array[array_key_first($nums_array)];
    $second_num = (float)$nums_array[array_key_last($nums_array)];

    if ($procedure == '+') {
        $answer = $first_num + $second_num;
    } elseif ($procedure == '-') {
        $answer = $first_num - $second_num;
    } elseif ($procedure == '*') {
        $answer = $first_num * $second_num;
    } else {$answer = $first_num / $second_num;
    } echo 'Результат: ' . ($answer);
}
?>
</body>
</html>