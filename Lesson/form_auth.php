<?php 

$error = isset($_GET['error']) ? $_GET['error'] : '0';

switch ($error) {
    case '0': break;
    case '1': echo 'Пустой логин или пароль'; break;
    case '2': echo 'Не верный логин или пароль'; break;
    default: echo 'Неизвестная ошибка'; 
}

?>

<form action="handler_auth.php" method="POST">
    Логин: <input type="text" name="login"><br><br>
    Пароль: <input type="password" name="pass"><br><br>
    <input type="submit">
</form>