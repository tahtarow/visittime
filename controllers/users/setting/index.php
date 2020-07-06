<?php

//$networks = new Networks();
//$networks->admin_id = $user->data['id'];
//$networks->load();

$user->load_networks_with_spots();

//foreach ($user->data['networks'] as $network) {
//    dump($network['spots']);
//}
//exit();
//dumpex($user->data['networks']);

include  VIEWS.'/includes/header.php';
include  VIEWS.'/setting.php';
include  VIEWS.'/includes/footer.php';
