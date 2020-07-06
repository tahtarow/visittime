<?php
$errors = [];
if (isset($_POST['form'])) {
    if (empty($_POST['address']) or !isset($_POST['address']) or strlen($_POST['address'])<3){
        errors::$list[] = 'длина адреса должна быть длинее 3 символов';
    }


    if (empty(errors::$list)){

        $network = new Network($_GET['id_network']);
        $work_time = json_decode($network->data['settings'],1)['work_time'];
        $spot_id = Spot::create($user, $_GET['id_network'], $_POST['address'], $_POST['phone'], $_POST['email'], $_POST['description'],$work_time);
        if ($spot_id){
            redirect('/setting/spot/work-time?spot_id='.$spot_id);
        }else{
            echobr('error creating spot');
            exit();
        }
    }

}

include VIEWS . '/spots/new.php';