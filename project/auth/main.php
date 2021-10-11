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
    $_SESSION['username'] = null;

    function getUsersList(): array {
        return [
            'asd'=>password_hash('09.09.1999', PASSWORD_DEFAULT),
            'qwe'=>password_hash('12.02.2000', PASSWORD_DEFAULT),
            'zxc'=>password_hash('07.12.1980', PASSWORD_DEFAULT)
        ];
    }

    function existsUser($username): bool {
        return in_array($username, array_keys(getUsersList()));
    }

    function checkPassword($username, $password): bool {
        return in_array($username, array_keys(getUsersList()))
            && password_verify($password, getUsersList()[$username]);
    }

    function getCurrentUser() {
        if ($_SESSION['username'] !== null) {
            return $_SESSION['username'];
        } else {
            return null;
        }
    }
    ?>
</body>
</html>
