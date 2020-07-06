<?php

class Network
{
    public
        $id,
        $data;

    function __construct($id=false)
    {
        if ($id){
            $this->id = $id;
            $this->data = self::load($id);
        }
    }

    static function load($id){
            return ORM::forTable('networks')->findOne($id);
    }

    public static function get_network_on_user_id($id)
    {
        $r = ORM::forTable('z_user_network')
            ->where('user_id', $id)
            ->findArray();


        if (!empty($r)) {
           return new self($r[0]['network_id']);
        } else {
            return false;
        }
    }


    function get_spots_ids(){
        $spots = ORM::forTable('spots')
            ->select('id')
            ->where('network_id',$this->id)
            ->findArray();

        $spots_ids = '';
        foreach ($spots as $spot) {
            $spots_ids[]= $spot['id'];
        }

        return $spots_ids;
    }




}