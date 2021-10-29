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
<p>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="photo">
        <button type="submit">Upload</button>
    </form>
<p>
    <form action="show_gallery.php" method="get" enctype="text/plain">
        <button type="submit">Show gallery</button>
    </form>
</body>
</html>