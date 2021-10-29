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
    <form action="login.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="username">Username
                <input type="text" required name="username" size="20">
            </label>
        </p>
        <p>
            <label for="password">Password
                <input type="password" required name="password" size="20">
            </label>
        </p>
        <button>Login</button>
    </form>

    <?php
    if (getCurrentUser() !== null) {
        header('Location: http://localhost:63342/learning_php/project/auth/index.php');
    } elseif ($_POST != null) {
        if (existsUser($_POST['username']) &&
            checkPassword($_POST['username'], $_POST['password'])
            ) {
            $_SESSION['username'] = $_POST['username'];
            $tmp1 = $_SESSION['username'];
            setcookie('username', $_SESSION['username'], time()+3600);
            header('Location: http://localhost:63342/learning_php/project/auth/index.php');
        } else {echo 'input data error';}
    }
    ?>

</body>
</html>