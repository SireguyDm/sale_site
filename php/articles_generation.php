<?php 

include('db.php');

$query = "SELECT * FROM article";
$result = mysqli_query($link, $query);

$articles = [];
$old_cost = '';
while ($row = mysqli_fetch_assoc($result)){
    $articles[] = $row;
}

foreach ($articles as $article){
    if ($article['article_old_cost'] == '0'){
        $old_cost = '';
    } else {
        $old_cost = $article['article_old_cost'].' руб.';
    }
    if ($article['article_type'] == $php_selector || $article['article_type'] == $php_selector2) {
        echo '
        
            <div class="offers-item">
            <a href="article.php?id='.$article['article_id'].'">
                <img src="pics/tovar/'.$article['article_img_path'].'/'.$article['article_img_path'].'1.jpg">
                <div class="offers-item-disc">
                    <p class="offers-before">'.$article['article_name'].'</p>
                    <p>'.$article['article_type'].'</p>
                </div>
                <div class="offers-cost">
                    <p class="cost">'.$article['article_cost'].' руб.</p>
                    <p class="old-cost">'.$old_cost.'</p>
                </div>
            </a>
            </div>
        ';
    }   
}
?>