<?php

include('db.php');

$query = "SELECT user_id, login FROM users";
$result = mysqli_query($link, $query);

$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

foreach ($users as $user) {
    echo '<h3><a href="user.php?id='.$user['user_id'].'">'.$user['login'].'</a></h3>';
}

echo '<br><br><a href="form_reg.php">Регистрация нового пользователя</a>';
echo '<br><br><a href="form_auth.php">Авторизация</a>';