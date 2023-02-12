<?php
include_once __DIR__ . '/usersDB.php';

function existsUser($login) { 
    return in_array( $login, array_column( getUsersList(),'login' ) );  //in_array - проверяет, есть ли в масииве значение. array_column - возвращает массив из значений одного столбца входного массива.
}

function getUser($login) { 
    $users = getUsersList();
    foreach ($users as $user) {             
        if ($login == $user['login']) {
            return $user;
        }
    }
}

function checkPassword($login, $password) { 
    if ( true === existsUser($login) ) { 
        if ( password_verify( $password, getUser($login)['password'] ) ) { 
            return true;
        }
    }
    return false;
}

function getCurrentUser() { 
    if ( isset( $_SESSION['username'] ) ) { 
        if ( existsUser( $_SESSION['username'] ) ) {  
            return $_SESSION['username'];
        }
    }
}