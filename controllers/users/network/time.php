<?php
$days_names = Calendar::get_days_names();
$network = new  Network($_GET['network_id']);

if (!isset($_GET['day'])){
    $_GET['day'] = 1;
}

if(isset($_POST['back'])){
    redirect('/network/time?network_id=' . $_GET['network_id'] . '&day=' . ($_GET['day'] - 2));
}

$setting = json_decode($network->data['settings'],true);
//    dumpex($setting['work_time'][$_GET['day']] );

if (isset($_POST['time'])){

    $day = $_GET['day']-1;

//    dump($day);
//    dump($_POST['time']);



    $setting['work_time'][$day ] = $_POST['time'];
    $network->data['settings'] = json_encode($setting);
    $network->data->save();

    $setting = json_decode($network->data['settings'],true);
//    dumpex($setting);

}


//dump($setting );

if (isset($setting['work_time'][$_GET['day']])){
    $_POST['time'] = $setting['work_time'][$_GET['day']];
}
//dump($setting['work_time'][$_GET['day']]);
//dump($_POST['time']);
//dumpex($setting);


include  VIEWS.'/network/work-time.php';
