<?php
require "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;

    if (isset ($data['do_signup'])) {
        $errors = array();
        if ($data['login'] == '') {
            $errors[] = "Введите логин!";
        }

        if ($data['email'] == '') {
            $errors[] = "Введите email!";
        }

        if ($data['password'] == '') {
            $errors[] = "Введите пароль!";
        }

        if ($data['password'] != $data['password2']) {
            $errors[] = "Повторный пароль был введен не верно !";
        }

        if (strlen($data['password']) < 6) {
            $errors[] = "Пароль не должен быть меньше, чем 6 символов";
        }

        if ($data['name'] == '') {
            $errors[] = "Введите ваше имя!";
        }

        if ($data['role'] == '') {
            $errors[] = "Введите вашу роль(должность)!";
        }

        if ($data['lic'] != "ok") {

            $errors[] = "Подтвердите, что Вы приняли соглашение с правилами сайта!";
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<div style = "color: red;">' . $error . '</div><hr>';
            }
        } else {

            $login = htmlspecialchars($data['login']);
            $passwordOnPage = $data['password'];
            $salt = mt_rand(100, 999);
            $name = $data['name'];
            $role = $data['role'];
            $mail = htmlspecialchars($data['email']);
            $tm = date("Y F d H:i:s");
            $password = md5(md5($passwordOnPage) . $salt);

            $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'");
            $id_user = mysqli_fetch_array($result);

            if (!empty($id_user['id'])) {
                echo '<div style = "color: red;">' . "Введённый вами логин уже существует - введите другой логин!" . '</div><hr>';
            } else {

                echo '<div style = "color: green;">' . "Вы успешно зарегестрированны! Пройдите на страницу <a href = '/'> авторизации </a> " . '</div><hr>';

                $sql_insert = mysqli_query($db, "INSERT INTO users (login, password, salt , name, role, mail_reg, mail, last_act) 
VALUES ('$login', '$password','$salt', '$name', '$role', '$mail','$mail','$tm')");
            }
        }
    }
}
?>

<form method="POST" action="signup.php">

    <p>
        Логин: <input id="login" type="text" name="login" value='<?php echo @$data['login']; ?>'>
    </p>

    <p>
        Пароль: <input id="pass" type="password" name="password" value='<?php echo @$data['password']; ?>'>
    </p>

    <p>
        Подтверждение: <input id="re_pass" type="password" name="password2" value='<?php echo @$data['password2']; ?>'>
    </p>

    <p>
        Имя: <input id="name" type="text" name="name" value='<?php echo @$data['name']; ?>'>
    </p>

    <p>
        Роль: <input id="role" type="text" name="role" value='<?php echo @$data['role']; ?>'>
    </p>

    <p>
        Email: <input id="email" type="text" name="email" value='<?php echo @$data['email']; ?>'>
    </p>

    <p>
        <label><input id="no_xyz" type="checkbox" name="lic" value="ok"/> Согласен с правилами сайта!<br/></label>
    </p>

    <p>
        <input type="submit" name="do_signup" value="Регистрация">
    </p>

</form>

