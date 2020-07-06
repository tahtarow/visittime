<?php


class Records
{

    public static function create_record($spot_id, $author, $mktime, $name, $surname, $phone, $procedure_id, $extra, $cost, $currency)
    {
        return ORM::forTable('records')
            ->create()
            ->set('spot_id', $spot_id)
            ->set('author_id', $author)
            ->set('name', $name)
            ->set('surname', $surname)
            ->set('phone', $phone)
            ->set('mktime', $mktime)
            ->set('extra', $extra)
            ->set('cost', $cost)
            ->set('currency_id', $currency)
            ->set('procedure_id', $procedure_id)
            ->set('accepted', 1)
            ->save();
    }

    public static function load_from_spots($spot, $f_year, $f_month, $f_day, $f_hour, $to_year, $to_month, $to_day, $to_hour)
    {
        $from = mktime($f_hour, 00, 00, $f_month, $f_day, $f_year);
        $to = mktime($to_hour, 00, 00, $to_month, $to_day, $to_year);
        if (!is_array($spot)) {
            return ORM::forTable('records')
                ->where('spot_id', $spot)
                ->where_gt('mktime', $from)
                ->where_lt('mktime', $to)
                ->findMany();
        } else {
            return ORM::forTable('records')
                ->whereIn('spot_id', $spot)
                ->where_gt('mktime', $from)
                ->where_lt('mktime', $to)
                ->findMany();
        }

    }

    public static function load_from_network($network, $f_year, $f_month, $f_day, $f_hour, $to_year, $to_month, $to_day, $to_hour)
    {
        $from = mktime($f_hour, 00, 00, $f_month, $f_day, $f_year);
        $to = mktime($to_hour, 00, 00, $to_month, $to_day, $to_year);

        $spots_numbers = (new Network($network))->get_spots_ids();
        return ORM::forTable('records')
            ->whereIn('spot_id', $spots_numbers)
            ->where_gt('mktime', $from)
            ->where_lt('mktime', $to)
            ->findMany();
    }

    public static function load_from_all_network_curr_user($f_year, $f_month, $f_day, $f_hour, $to_year, $to_month, $to_day, $to_hour)
    {
        global $user;
        $spots_ids = $user->get_all_spots_ids();
        return self::load_from_spots($spots_ids, $f_year, $f_month, $f_day, $f_hour, $to_year, $to_month, $to_day, $to_hour);

    }

    static function get_count_records($from_mk_time,$to_mk_time,$spot_ids){

        if (!is_array($spot_ids)){
            $ids = $spot_ids;
            $spot_ids = [];
            $spot_ids[]=$ids;
        }

        return ORM::forTable('records')
            ->where_gt('mktime', $from_mk_time)
            ->where_lt('mktime', $to_mk_time)
            ->whereIn('spot_id',$spot_ids)
            ->count();
    }


}
