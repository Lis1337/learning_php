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
    <form action="photo.php" method="get" enctype="text/plain">
        <button type="submit">return to main page</button>
    </form>

    <p>
    <form action="photo.php" method="get" enctype="text/plain">
        <button type="submit">download more images</button>
    </form>

    <?php
    function show_gallery() {
        $dir = __DIR__ . '/photos';
        $photoDir = new DirectoryIterator($dir);
        foreach ($photoDir as $photo) {
            if ($photo->isFile()) {
                echo "<img src=$photo alt='no_photo'>" . '<br>';
            }
        }
    }
    show_gallery();
    ?>
</body>
</html>
