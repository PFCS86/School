<?php
require "db.php";
require "functions.php";
require "roles.php";

/*
$errors = array();

if (isset($_POST['do_login'])) {

    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        if ($login == '') {
            unset($login);
        }
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        if ($password == '') {
            unset($password);
        }
    }

    if (empty($login) || empty($password))
    {
        $errors[] = 'Заполните все поля';

    }
*/

$errorsOfForm = array('login', 'password');

if (isset ($_POST['do_login'])) {
    foreach ($errorsOfForm as $varName) {
        if (isset($_POST[$varName])) {
            if (!empty($_POST[$varName])) {
                $$varName = $_POST[$varName];
            }
        }
    }

    foreach ($errorsOfForm as $varName) {
        if (!isset($$varName)) {
            echo '<div style = "color: red">' . 'Заполните поле: ' . $varName ;
        }
    }


    $user = mysqli_query($db, "SELECT * FROM users WHERE login = '$login'");
    if (mysqli_num_rows($user) == 1) {

        $visitor = mysqli_fetch_assoc($user);

        if (empty($visitor)) {
            $errors[] = 'Введённый вами login - неверный';
        }


        if (md5(md5($password) . $visitor['salt']) == $visitor['password']) {
            $_SESSION['id'] = $visitor['id'];

            @setcookie("login", $visitor['login'], time() + 50000);
            @setcookie("password", md5($visitor['login'] . $visitor['password']), time() + 50000);

            $result = mysqli_query($db, "SELECT * FROM users WHERE login = '$login'");

            if (mysqli_num_rows($result) > 0) {
                while ($check_db = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    mysqli_query($db, "UPDATE users SET counter = counter+1, last_act = NOW() WHERE login = '$login' ");
                }
            } else {
                mysqli_query("INSERT INTO users VALUES ('$_COOKIE[login]',NOW())");
            }

            echo '<div style = "color: green;">' . "Добро пожаловать на сайт! Пройдите на <a href = '/'> главную </a> страницу! " . '</div><hr>';

            pageForDirector($db, $visitor);

        } else {
            $errors[] = 'Введённый вами пароль - неверный';
        }
    }
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '<div style = "color: red;">' . $error . '</div><hr>';
    }
}

echo '<pre>';
print_r($errors);
echo '</pre>';

if (isset($_SESSION['id'])) {

    if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
        @SetCookie("login", "", time() - 1);
        @SetCookie("password", "", time() - 1);

        @setcookie("login", $_COOKIE['login'], time() + 50000);
        @setcookie("password", $_COOKIE['password'], time() + 50000);

        $id = $_SESSION['id'];
    }
} else {

    $rez = mysqli_query($db, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");

    if (mysqli_num_rows($rez) == 1) {
        $row = mysqli_fetch_assoc($rez);

        setcookie("login", $visitor['login'], time() + 50000);
        setcookie("password", md5($visitor['login'] . $visitor['password']), time() + 50000);

        $id = $_SESSION['id'];

        $update_time = mysqli_query($db, "UPDATE users SET  last_act = NOW() WHERE id='$id'");

        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {

            $rez = mysqli_query($db, "SELECT * FROM users WHERE login='{$_COOKIE['login']}'");
            @$visitor = mysqli_fetch_assoc($rez);

            if (@mysqli_num_rows($rez) == 1 && md5($visitor['login'] . $visitor['password']) == $_COOKIE['password']) {
                $_SESSION['id'] = $visitor['id'];
                $id = $_SESSION['id'];

                $update_time = mysqli_query($db, "UPDATE users SET last_act = NOW() WHERE id='$id'");

            } else {
                SetCookie("login", "", time() - 360000, '/');
                SetCookie("password", "", time() - 360000, '/');
            }
        }
    }

    checkStatistic();
}

?>

<form action="login.php" method="POST">

    <p>
    <p>Логин:</p>
    <input id="login" type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>

    <p>
    <p>Пароль:</p>
    <input id="pass" type="password" name="password" value="<?php echo @$data['login']; ?>">
    </p>

    <p>
        <input type="submit" name="do_login" value="Войти">
    </p>

</form>
