<?php
session_start();

include_once __DIR__ . '/functions.php'; 

if ( null !== getCurrentUser() ) { 
    header('Location: /index.php');
    exit;
}

if ( isset( $_POST['login'] ) ) {
    if ( isset( $_POST['password'] ) ) { 
        if ( checkPassword( $_POST['login'], $_POST['password'] ) ) { 
            $_SESSION['username'] = $_POST['login']; 
            header('Location: /index.php'); 
            exit;
        }
    }
}


?>
<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="style.css">
    <title>Авторизация</title>
</head>
    <body>
        <h4>Авторизация</h4>
        <form action="/login.php" method="post">
            Логин: <input type="text" name="login">
            Пароль: <input type="password" name="password">
    
            <button type="submit">Войти</button>
        </form>
        <p>Введите логин и пароль</p>
        <br>
        
        <table width="100%">
  <tr>
      <td><h1>Услуги SPA-салона</h1>
<p>
  <ul>
    <li>Массаж горячими камнями</li>
    <li>Молочная ванна</li>
    <li>Парафинотерапия</li>
    <li>Маски для тела</li>
    <li>Бразильская эпиляция</li>
    <li>Воздействие паром</li>
    <li>Маникюр и педикюр</li>
    <li>Грязевая ванна</li>
    <li>Обертывание</li>
    <li>Антицеллюлитный массаж</li>
  </ul>
</p> </td>
<td><img src="img/massage.jpeg" width="500" height="300" alt="Акция массаж в подарок!"> </td>
</tr>
<tr>
  <td></td>
  <td><b>АКЦИЯ для ВСЕХ!!! При покупке абонемента - массаж в подарок!</b></td>
</tr>
</table>
    </body>
</html>