<?php
$spot_id = '';
$networks = Networks::lad_all_with_spots($user->data['id']);

if (isset($_POST['form'])) {
    if (in_text('_', $_POST['object'])) {
        $temp = explode('_', $_POST['object']);
        $network_id = $temp[0];
        $spot_id = $temp[1];
        $spot = new Spot($spot_id);
    }else{
        $network_id = $_POST['object'];
    }


    $spot_id=false;
    if (in_text('_', $_POST['object'])) {
        $temp = explode('_', $_POST['object']);
        $network_id = $temp[0];
        $spot_id = $temp[1];
    }else{
        $network_id = $_POST['object'];
    }
    
    if ($spot_id){
        if ($user->check_spot_ownership($spot_id)){
            $key =$user->create_invite_to_spot($_POST['email'],$spot_id);
        }
    }else{
        if ($user->check_network_ownership($network_id))
            $key =$user->create_invite_to_network($_POST['email'],$network_id);
    }
    errors::$list = $user->errors;


    $network = Network::load($network_id);




    $email->to = $_POST['email'];
    $email->subject = 'Приглашение от '.$network['name'];
    if (empty($spot_id)){
    $email->message = 'Пользователь <span style="font-weight: bold;color:green">' . $user->data['name'] . '</span><br> предоставляет вам доступ к сети <span style="font-weight: bold;color:orange">' . $network['name'] . "</span><br>" .
        '<br>для продолжения нажмите на кнопку ниже <br>' .
        '<a href="https://'.DOMAIN.'/staff/invite?key='.$key.'"><button style="padding:10px 20px;background-color: green;color:white">Продолжить</button></a>';
    }else{
        $email->message = 'Пользователь <span style="font-weight: bold;color:green">' . $user->data['name'] . '</span><br> предоставляет вам доступ к споту <span style="font-weight: bold;color:orange">' . $network['name'] . " (".$spot->data['address'].")</span><br>" .
            '<br>для продолжения нажмите на кнопку ниже <br>' .
            '<a href="https://'.DOMAIN.'/staff/invite?key='.$key.'"><button style="padding:10px 20px;background-color: green;color:white">Продолжить</button></a>';
    }
//    $email->send();


    dump($email->message);

    if (!empty(errors::$list)){
        include_once VIEWS . '/staff/new.php';
    }else{
        include_once VIEWS . '/staff/invitation_sent.php';
    }

}else{
    include_once VIEWS . '/staff/new.php';
}



