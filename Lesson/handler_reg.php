<?php 

include('db.php');

$login = mysqli_real_escape_string($link, $_POST['login']);
$pass1 = mysqli_real_escape_string($link, $_POST['pass1']);
$pass2 = mysqli_real_escape_string($link, $_POST['pass2']);

// Проверяем на пустоту данных
if (!empty($login) && !empty($pass1) && !empty($pass2)) {
    // Проверяем на соответствие паролей
    if ($pass1 == $pass2) {
        $query = "SELECT user_id FROM users WHERE login='$login'";
        $result = mysqli_query($link, $query);
        // Проверяем логин на уникальность
        if (mysqli_num_rows($result) == 0) {
            $query = "INSERT INTO users (login, pass, created_date, img)
                      VALUES ('$login', '$pass1', NOW(), 'default.jpg')";
            $result = mysqli_query($link, $query);
            if ($result) {
                header('Location: index.php');exit;
            } else {
                header('Location: form_reg.php?error=4');exit;
            }
        } else {
            header('Location: form_reg.php?error=3');exit;
        }
    } else {
        header('Location: form_reg.php?error=2');exit;
    }
} else {
    header('Location: form_reg.php?error=1');exit;
}