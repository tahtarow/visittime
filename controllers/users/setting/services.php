<?php
//            dump_to_file($_POST);

$services = new Services($user->get_boss_id());



if (isset($_POST['form'])) {
    if ($user->check_role('director')){
        if ($_POST['new_category_name']){
            if (!isset($_POST['category_active']))$_POST['category_active']=null;
            if ($services->add_category([
                'name'=>$_POST['new_category_name'],
                'parent'=>$_POST['parent_category'],
                'active'=>$_POST['category_active'],
            ])){
                echo json_encode(['success' => '1']);
            }
        }
    }


}elseif (isset($_POST['get_cat_info'])){
    echo json_encode([
        'success' => '1',
        'category'=>$services->get_cat_info($_POST['get_cat_info']),
        'categories'=>$services->list,
    ]);
}else{
    include VIEWS . '/includes/header.php';
    include VIEWS . '/setting/services.php';
    include VIEWS . '/includes/footer.php';
}


