<?php 

$error = isset($_GET['error']) ? $_GET['error'] : '0';

switch ($error) {
    case '0': break;
    case '1': echo 'Пустой логин или пароль'; break;
    case '2': echo 'Пароли не совпадают'; break;
    case '3': echo 'Пользователь с таким логином уже существует'; break;
    case '4': echo 'Ошибка базы данных'; break;
    default: echo 'Неизвестная ошибка'; 
}

?>

<form action="handler_reg.php" method="POST">
    Логин: <input type="text" name="login"><br><br>
    Пароль: <input type="password" name="pass1"><br><br>
    Подтвердить: <input type="password" name="pass2"><br><br>
    <input type="submit">
</form>