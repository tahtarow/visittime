<?php

//$date = '2020-06-04';
//alert( strftime("%u", strtotime($date)));

//dumpex(date("d.m.Y w", mktime(0, 0, 0, $selected_month+2, 0, $selected_year)));

//echo mktime(12, 43, 00, 01, 31, 2020);
//
//exit();


$networks = new Networks();
$networks->admin_id = $user->data['id'];
$networks->load();
$user->load_networks();


if (empty($networks->list)) {
    redirect('/setting');
} else {


    //region get/set defaults option
    if (!isset($_COOKIE['calendar_state'])) cookies::set('calendar_state', 0);
    if (!isset($_COOKIE['day_plan_state'])) cookies::set('day_plan_state', 0);
    if (!isset($_GET['spot'])) {
        if (isset($_COOKIE['last_selected_spot_on_calendar'])) {
            $_GET['spot'] = $_COOKIE['last_selected_spot_on_calendar'];
        } else {
            $_GET['spot'] = 'all';
        }
    } else {
        cookies::set('last_selected_spot_on_calendar', $_GET['spot']);
    }
    if (!isset($_GET['network'])) {
        if (isset($_COOKIE['last_selected_spot_on_calendar'])) {
            $_GET['network'] = $_COOKIE['last_selected_network_on_calendar'];
        } else {
            $_GET['network'] = 'all';
        }
    } else {
        cookies::set('last_selected_network_on_calendar', $_GET['network']);
    }

//region load spots
    if (isset($_GET['network']) and $_GET['network'] <> 'all') {
        if ($user->check_network_ownership($_GET['network'])) {
            $spots = Spots::load($_GET['network']);
        }
    } else {
        $_GET['network'] = 'all';
        $_GET['spot'] = 'all';
        $spots = '';
    }
//endregion load spots

//endregion defaults value

    //region load rec
    if (isset($_GET['rec'])) {
        $record = new Record($_GET['rec']);
    }
//endregion

    //region set up calendar
    $days_names = Calendar::get_days_names();
    $month_names = Calendar::get_month_names();

    $_GET['year'] = isset($_GET['year']) ? $_GET['year'] : Calendar::get_current_year();
    $_GET['month'] = isset($_GET['month']) ? $_GET['month'] : Calendar::get_current_month();
    $_GET['day'] = isset($_GET['day']) ? $_GET['day'] : Calendar::get_current_day();
    $_GET['hour'] = isset($_GET['hour']) ? $_GET['hour'] : Calendar::get_current_hour();
    $_GET['min'] = isset($_GET['min']) ? $_GET['min'] : Calendar::get_current_min();

    $current_day = Calendar::get_current_day();
    $current_hour = Calendar::get_current_hour();
    $current_min = Calendar::get_current_min();

    $calendar_page = Calendar::get_calendar_page($_GET['month'], $_GET['year']);

    foreach ($calendar_page as &$cel) {
        $from_time = mktime(00, 00, 00, $cel['month'], $cel['day'], $cel['year']);

        if ($_GET['network'] <> 'all') {
            if ($_GET['spot'] <> 'all') {
                $spots_ids = $_GET['spot'];
            } else {
                $spots_ids = (new Network($_GET['network']))->get_spots_ids();
            }
        } else {
            $spots_ids = $user->get_all_spots_ids();
        }
        $cel['count_records'] = Records::get_count_records($from_time, $from_time + 86400, $spots_ids);
    }


//endregion set up calendar

    //region get records list
    $records = [];
    if ($_GET['network'] <> 'all') {
        if ($_GET['spot'] <> 'all') {
            $records = Records::load_from_spots(
                $_GET['spot'],
                $_GET['year'], $_GET['month'], $_GET['day'], 0,
                $_GET['year'], $_GET['month'], $_GET['day'], 24);
        } else {
            $records = Records::load_from_network(
                $_GET['network'],
                $_GET['year'], $_GET['month'], $_GET['day'], 0,
                $_GET['year'], $_GET['month'], $_GET['day'], 24);
        }
    } else {
        $records = Records::load_from_all_network_curr_user(
            $_GET['year'], $_GET['month'], $_GET['day'], 0,
            $_GET['year'], $_GET['month'], $_GET['day'], 24);
    }
//endregion  get records list

    //region get work time
    $min_time = '';
    $max_time = '';
    foreach ($networks->list as $t) {
        $w_t = (json_decode($t['settings'], 1)['work_time']);

        if (empty($min_time) and empty($max_time)) {
            $min_time = explode(':', $w_t[1][0]);
            $max_time = explode(':', $w_t[1][count($w_t)])[0];
        } else {
            $t2 = explode(':', $w_t[1][0])[0];
            if ($min_time > $t2 and !empty($t2)) {
                $min_time = $t2;
            }

            $t2 = explode(':', $w_t[1][count($w_t)])[0];
            if ($max_time < $t2 and !empty($t2)) {
                $max_time = $t2;
            }
        }
    }
//endregion get work time

    //region add record
    if (isset($_POST['new_record'])) {
        if (empty($_POST['spot_id']) or !isset($_POST['spot_id'])) {
            echobr('error, spot_id empty or not isset');
            exit();
        }

        if ($user->check_spot_ownership($_POST['spot_id'])) {
            Records::create_record(
                $_POST['spot_id'],
                $user->data['id'],
                mktime($_GET['hour'], $_GET['min'], 00, $_GET['month'], $_GET['day'], $_GET['year']),
                $_POST['name'],
                $_POST['surname'],
                $_POST['phone'],
                $_POST['procedure'],
                $_POST['extra'],
                $_POST['cost'],
                $_POST['currency']
            );

            refresh();

        } else {
            echobr('error, current user does not have permission to edit the spot_id=' . $_POST['spot_id']);
            exit();
        }
    }
//endregion add record

    //region delete record
    if (isset($_POST['delete'])) {
        $record = new Record($_POST['id']);
        if ($user->check_spot_ownership($record->get_spot())){
            $record->data->delete();
            redirect('/calendar?year='.$_GET['year'].'&month='.$_GET['month'].'&day='.$_GET['day'].'&hour='.$_GET['hour'].'&min='.$_GET['min'].'&spot='.$_GET['spot']);
        }else{
            echobr('error, you do not have permission to edit this spot. ');
            exit();
        }

//        $user->check_spot_ownership($_POST['spot_id']
    }
    //endregion


    include VIEWS . '/includes/header.php';
    include VIEWS . '/calendar.php';
    include VIEWS . '/includes/footer.php';

}