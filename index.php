<?php
session_start();

include_once __DIR__ . '/functions.php';

     if ( null !== getCurrentUser() ) {

?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Главная страница</title>
    </head>
    <body>
    <p>Здравствуйте, <?php echo getCurrentUser(); ?>!
    <button><a href="/logout.php">Выйти</a></button></p>
<?php
if(isset($_SESSION['time'])){
    $enterTime = new \DateTime($_SESSION['time']);// время авторизации пользователя на сайте
    $now = new \DateTime();// время сейчас
    $oneDay = $enterTime->add(new DateInterval('P1D'));//добавим 1 день на акцию
    $diff = $oneDay->diff($now);
    
    if($now < $oneDay){
    echo "Вам доступна персональная скидка - 10% на все услуги салона! <br/> До конца акции осталось: ";
    echo $diff->format('%H ч : %i мин : %s сек.    '); 
    echo 'Успейте воспользоваться предложением!';
    ?>
    <img src="img/skidka10.jpg" width="700" height="300" alt="Персональная скидка!">
    <?php
    }else{
    echo 'Вы не успели воспользоваться персональным предложением!';
    }
}else{
    $time = new \DateTime();
    $_SESSION['time'] = $time->format('Y-m-d H:i:s');
    echo 'Вам доступна персональная скидка - 10% на все услуги салона. Скидка доступна в течении 24 часов. Успейте воспользоваться предложением!';
    }
?>  
<br>

 <?php
if (empty($_GET)) {
    ?>
<form action="" method="get">
   Укажите дату Вашего рождения <input type="date" name="bd" max="2005-01-01">
    <input type="submit">
</form>    
<?php 
} else {   
     if (isset($_REQUEST['bd'])) {
    $cd = new \DateTime('today'); 
    $bd = new \DateTime($_REQUEST['bd']); 
    $bd->setDate($cd->format('Y'), $bd->format('m'), $bd->format('d')); 
     $tmp = $cd->diff($bd); 
     if($tmp->invert){ 
         $bd->modify('+1 year'); 
         $tmp = $cd->diff($bd); 
     }
     if($cd == $bd){
        
        echo'Поздравляем с днем рождения!!! Дарим вам скидку на все услуги - 5%!'; 
        ?>
        <br>
        <img src="img/birthday.jpg" width="700" height="300" alt="Персональная скидка!">
        <br>
        <?php
     } else{
     echo 'До Вашего дня рождения осталось: ';
     echo $tmp->days ;
     echo ' дн.'; 
     }
 }
}
?>
    </body>
    </html>
<?php
}else {
    header('Location: ../login.php');
}
?>