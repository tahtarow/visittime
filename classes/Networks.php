<?php

class Networks
{
    public
        $admin_id,
        $list;

    public static function add_new($admin_id, $network_name, $address, $phone, $logo)
    {
        $res = ORM::forTable('networks')
            ->create();
        $res->set('administrator_id', $admin_id)
            ->set('name', $network_name)
            ->set('address', $address)
            ->set('phone', $phone)
            ->set('logo', $logo)
            ->save();

        ORM::forTable('z_user_network')
            ->create()
            ->set('user_id', $admin_id)
            ->set('network_id', $res->id())
            ->save();


        return $res->id();
    }

    function load()
    {
        if (!empty($this->admin_id)) {
            $this->list = self::lad_all_with_spots($this->admin_id);
            return true;
        } else {
            return false;
        }
    }

    static function lad_all_with_spots($admin_id)
    {
        $networks = ORM::forTable('networks')
            ->where('administrator_id', $admin_id)
            ->findMany();
        foreach ($networks as &$network) {
            $network['spots'] = ORM::forTable('spots')
                ->where('network_id', $network['id'])
                ->findMany();
        }
        return $networks;
    }
}