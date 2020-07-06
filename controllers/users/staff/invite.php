<?php

if (isset($_GET['key'])) {
    $new_staff = User::get_invited_stuff($_GET['key']);
    if ($new_staff) {
        $boss = User::get_user_on_id($new_staff['boss']);
        $spot = User::get_spots_on_user_id($new_staff['id']);
        if ($spot) {
            $network = new Network($spot['network_id']);
        }else{
            $network = Network::get_network_on_user_id($new_staff['id']);
        }
    }else{
        errors::$list[] = localisation::txt('Ошибка, приглашение устарело.');
    }

    if (isset($_POST['form'])){
        $avatar =  file::from_post_save('avatar', ROOT . '/data/images/avatars');
        $new_staff
            ->set('name',$_POST['name'])
            ->set('surname',$_POST['surname'])
            ->set('function',$_POST['function'])
            ->set('email_confirm_code',null)
            ->set('required',1);
        if ($avatar){
            $new_staff->set('avatar',$avatar[0]);
        }
        if ($new_staff->save()){
            redirect('/staff/invite-success');
        }else{
            errors::$list[] = localisation::txt('Ошибка сохранения профиля');
        }
    }
}





include_once VIEWS . '/staff/registration_on_invite.php';
