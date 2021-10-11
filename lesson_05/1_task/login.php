<?php
include 'main.php';
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
    <form action="index.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="username">Username
                <input type="text" name="username" size="20">
            </label>
        </p>
        <p>
            <label for="password">Password
                <input type="password" name="password" size="20">
            </label>
        </p>
        <button>Login</button>
    </form>

    <?php
    if (getCurrentUser() !== null) {
        header('Location: http://localhost:63342/learning_php/lesson_05/1_task/index.php');
    } else {
        if (existsUser($_POST['username']) && checkPassword($_POST['username'], $_POST['password'])) {
            $_SESSION['username'] = $_POST['username'];
        }
    }
    ?>

</body>
</html>