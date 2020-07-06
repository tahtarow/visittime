<?php

$days_names = Calendar::get_days_names();
$spot = new  Spot($_GET['spot_id']);

if (!isset($_GET['day'])) {
    $_GET['day'] = 1;
}

if (isset($_POST['back'])) {
    redirect('/setting/spot/work-time?spot_id=' . $_GET['spot_id'] . '&day=' . ($_GET['day'] - 2));
}

$setting = json_decode($spot->data['settings'], true);

if (isset($_POST['time'])) {
    $day = $_GET['day'] - 1;
    $setting['work_time'][$day] = $_POST['time'];
    $spot->data['settings'] = json_encode($setting);
    $spot->data->save();

    $setting = json_decode($spot->data['settings'], true);

}

if (isset($setting['work_time'][$_GET['day']])) {
    $_POST['time'] = $setting['work_time'][$_GET['day']];
}

include VIEWS . '/spots/work-time.php';