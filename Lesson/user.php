<?php

include('db.php');

$user_id = $_GET['id'];

$query = "SELECT login, created_date, img FROM users WHERE user_id=$user_id";
$result = mysqli_query($link, $query);

$user = mysqli_fetch_assoc($result);


echo '<h3>'.$user['login'].'</h3>';
echo '<i>'.$user['created_date'].'</i><br>';
echo '<img src="'.$user['img'].'" alt="'.$user['img'].'"><br>';
echo '<a href="index.php">Вернуться к списку пользователей</a>';

echo '';