<?php

if (isset($_POST['form'])){
    $user->login = $_POST['login'];
    $user->password = md5($_POST['password']);
    if($user->login()){
        redirect('/calendar');
    }
}


include  VIEWS.'/login.php';