<?php
require "db.php";

if(isset($_SESSION['id'] )){

    echo '<div style = "color: orange;">' . "Поздравляю вас, гость! Ваша авторизация прошла успешна!" . '</div><hr>';
    ?>
    <p><a href = "/logout.php"> Выйти </a></p>

<?php } else {
    echo '<div style = "color: orange;">' . "Пройдите авторизацию или зарегестрируйтесь!" . '</div><hr>';
    ?>

    <a href="/login.php"> Авторизоваться</a>
    <br><a href="/signup.php">Зарегестрироваться</a>
<?php }

require "html_mt.php";
?>