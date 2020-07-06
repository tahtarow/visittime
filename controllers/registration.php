<?php

$email_sent = false;

    if (isset($_GET['email_confirm_code'])){
        errors::$list = User::check_email_confirm_code($_GET['email_confirm_code']);
    if(empty(errors::$list)){
        $id = User::get_id_user_on_email_confirm_code($_GET['email_confirm_code']);
        $user = new User($id);
        $user->login_on_id($id);
    }
}
if (isset($_POST['form'])){
    if ($_POST['password1']<>$_POST['password2']){
        errors::$list[] = 'Die Passwörter stimmen nicht überein';
    }

    if(empty(errors::$list)){
        errors::$list =   User::registration($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password1']);
        if (empty(errors::$list)) {
            $email_sent= true;
        }
    }
}



include  VIEWS.'/registration.php';