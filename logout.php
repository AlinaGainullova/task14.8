<?php
session_start();

include_once __DIR__ . '/functions.php';  

if ( null !== getCurrentUser() ) {  
    session_destroy();
}

header('Location: /login.php');
?>