<?php

class Spot
{
    public $data;



    function __construct($id)
    {
       return $this->data = ORM::forTable('spots')->findOne($id);
    }

    static function create($user, $network_id, $address, $phone='', $email='', $description='',$work_time='')
    {
        if ($user->check_role('director')) {
            if ($user->check_network_ownership($network_id)) {
                return self::create_spot($user, $network_id, $address, $phone, $email, $description,$work_time);
            } else {
                echobr('error, user cannot administer spot id=' . $network_id);
                exit();
            }
        } else {
            echobr('error, to add a spot, the user must be a director');
            exit();
        }
    }

    private static function create_spot($user, $network_id, $address, $phone, $email, $description,$work_time)
    {
        $setting = '';
        if (!empty($work_time)){
            $setting['work_time'] = $work_time;
        }

        $spot = ORM::forTable('spots')
            ->create();
        $spot->set('network_id', $network_id)
            ->set('address', $address)
            ->set('phone', $phone)
            ->set('email', $email)
            ->set('added_time', get_date_time_for_bd())
            ->set('description', $description)
            ->set('settings', json_encode($setting));
        $res1 = $spot->save();

        $res2 = ORM::forTable('z_user_spots')
            ->create()
            ->set('user_id', $user->data['id'])
            ->set('spot_id', $spot->id())
            ->save();
        if ($res1 and $res2) {
            return $spot->id();
        } else {
            return false;
        }


    }

    static function get_parent_network($spot_id){
        $network_id = ORM::forTable('spots')->find_one($spot_id)['network_id'];
        dumpex($network_id);

        return ORM::forTable('networks')
            ->where();
    }
}