<?php 

include('db.php');

$query = "SELECT * FROM hotels";
$result = mysqli_query($link, $query);

$hotels = [];
while ($row = mysqli_fetch_assoc($result)){
    $hotels[] = $row;
}

//echo '<pre>';
//var_dump($hotels);



foreach ($hotels as $hotel){
    echo '
            <div class="tour_block">
                <img src="img/Tours/'.$hotel['img'].'" alt="'.$hotel['img'].'" id="hotel">
                <div class="description">
                    <p class="stars">
                        <img src="icons_img/star.png" alt="star">
                        <img src="icons_img/star.png" alt="star">
                        <img src="icons_img/star.png" alt="star">
                        <img src="icons_img/star.png" alt="star">
                        <img src="icons_img/star.png" alt="star">
                    </p>
                    <p class="Name_hotel">'.$hotel['hotel_name'].'</p>
                    <p class="Hotel_country">'.$hotel['hotel_city'].', <span id ="country_span_'.$hotel['hotel_id'].'">'.$hotel['hotel_country'].'</span></p>
                    <p class="Hotel_description">Хороший отель в своей категории, уютная зеленная территория. Домашняя атмосфера, вежливы персонал. Есть детская пощадка и собственная танцплощадка на берегу.</p>
                </div>
                <p class="rating">'.$hotel['rating'].'</p>
                <p class="tour_stoim">'.$hotel['cost'].' руб.</p>
                <button>Подробнее</button>
            </div>';
}
?>