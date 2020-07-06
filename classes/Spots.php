<?php


class Spots
{

    static function load($network_id)
    {
        return self::load_spots($network_id);
    }

    private static function load_spots($network_id)
    {
        return ORM::forTable('spots')
            ->where('network_id', $network_id)
            ->findMany();
    }


}