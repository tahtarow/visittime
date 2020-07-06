<?php



if (isset($_POST['form'])){

    $logo = '';
    if (isset($_FILES['logo'])){
        if (in_text('image',$_FILES['logo']['type'])){
            $logo = file::from_post_save('logo', ROOT . '/data/logos')[0];
        }
    }



    $new_network_id = Networks::add_new(
        $user->data['id'],
        $_POST['network_name'],
        $_POST['address'],
        $_POST['phone'],
        $logo);


    if ($new_network_id){
        redirect('/network/time?network_id='.$new_network_id );
    }
}


include  VIEWS.'/network/new.php';

