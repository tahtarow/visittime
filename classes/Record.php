<?php

class Record{
    public $data;

    function __construct($id=false)
    {
        $this->data = self::load($id);
    }

    static function load($id){
        return ORM::forTable('records')->find_one($id);
    }

    public function get_spot()
    {
        return $this->data['spot_id'];
    }

}
