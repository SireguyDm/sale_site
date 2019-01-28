<?php 
$custom_wrapper = 'page2wrapper';
$nav_custom = 'page2nav';
$title = 'Вопросы';
?>
      

<?php include('templates/header.php') ?>

       
        <h2 class="anszag">Наиболее часто задаваемые вопросы:</h2>
        <hr>

        <div class="questions">
            <?php include('php/answerData.php') ?>
        </div>
        
        

<script src="js/button_answ.js"></script>

<?php include('templates/footer.php') ?>
