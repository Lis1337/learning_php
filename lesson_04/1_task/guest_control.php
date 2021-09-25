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
<?php
function read_guest_book() {
    $path = __DIR__ . '/guest_book.txt';
    $read_file = fopen($path, 'r');
    while (!feof($read_file)) {
        $line = fgets($read_file);
        echo $line . '<br/>';
    }
    fclose($read_file);
}
?>
<form action="read_gb.php" method="get" enctype="text/plain">
    <button>read guest book</button>
</form>


<?php
function add_record_guest_book($line_num) {
    $path = __DIR__ . '/guest_book.txt';
    $write_file = fopen($path, 'a');
    $record_text = $line_num . '. ' . $_POST['nickname'] . ', ' . $_POST['record_text'] . ';' . "\n";

    if (is_writeable('guest_book.txt')) {
        fwrite($write_file, $record_text);
        $line_num = $line_num + 1;
        fclose($write_file);
        echo 'record successfully added';
    } else {
        echo 'error';
    }
}
?>
<form action="save_new_line.php" method="post" enctype="multipart/form-data">
    <p>
        <label for="nickname">Enter your nickname
            <input type="text" name="nickname" size="20">
        </label>
    </p>
    <p>
        <label for="record_text">Record text
            <input type="text" name="record_text" size="100">
        </label>
    </p>
    <button>add new record</button>
</form>
</body>
</html>