<?php
require "db.php";

if (isset($_SESSION['id'])) {
    ?>

    <p style="color: orange; font-family: 'Times New Roman';"> "Поздравляю вас! Ваша авторизация прошла успешна!"</p>
    <p><a href="/logout.php"> Выйти </a></p>

<?php } else { ?>

    <p style="color: orange; font-family: 'Times New Roman';"> "Пройдите авторизацию или зарегестрируйтесь"</p>
    <a href="/login.php"> Авторизоваться</a>
    <br><a href="/signup.php">Зарегестрироваться</a>
<?php }

require "html_mt.php";
?>