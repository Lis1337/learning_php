<?php
session_start();
?>
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
    echo 'Welcome to the main page, ' . $_SESSION['username'] . '!' . "<br>";
    ?>

    <p>
    <form action="../photo/show_gallery.php" method="get">
        <button type="submit">
            <label>Show gallery</label>
        </button>
    </form>

</body>
</html>