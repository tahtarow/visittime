<?php

if($user->check_spot_ownership($_GET['id'])){
    $spot = new Spot($_GET['id']);
}else{
    echobr('error,not have permission to change this spot');
    exit();
}
include VIEWS . '/setting/spot/index.php';