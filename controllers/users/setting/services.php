<?php

$services = new Services($user->get_boss_id());

if (isset($_POST['form'])) {

    if ($user->check_role('director')){
        if ($_POST['category_name']){
            if (!isset($_POST['category_active']))$_POST['category_active']=null;
            dump_to_file(ROOT . '/post.txt', $_POST);
            if ($services->add_category([
                'name'=>$_POST['category_name'],
                'parent'=>$_POST['parent_category'],
                'active'=>$_POST['category_active'],
            ])){
                echo json_encode(['success' => '1']);
            }
        }
    }


}else{
    dump($services->categories);
    include VIEWS . '/includes/header.php';
    include VIEWS . '/setting/services.php';
    include VIEWS . '/includes/footer.php';
}


