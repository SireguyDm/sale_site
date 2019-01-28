<?php 

include ('db.php');


$query_art = "SELECT * FROM article WHERE article_id = '5'";
$result_art = mysqli_query($link, $query_art);
$article = mysqli_fetch_assoc($result_art);

$currect_article = $article['article_name'];

$query_dis = "SELECT * FROM descriptions LEFT JOIN article ON descriptions.article_name = article.article_name WHERE article.article_name = '$currect_article'";
$result_dis = mysqli_query($link, $query_dis);
$description = mysqli_fetch_assoc($result_dis);

echo $description['country'];
echo $article['article_name'];

?>