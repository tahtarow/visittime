<?php

class Services
{
    public
        $administrator_id,
        $categories,
        $services,
        $list;


    function __construct($administrator_id)
    {
        $this->administrator_id = $administrator_id;
        $this->load_services();
    }

    function load_services()
    {

        $categories = ORM::forTable('services_categories')
            ->where('administrator_id', $this->administrator_id)
            ->findArray();
        if (!empty($categories)) {
            $dataset = [];
            foreach ($categories as $cat) {
                $dataset[$cat['id']] = $cat;
            }
            $categories = $dataset;
        }
        $services = ORM::forTable('services')
            ->where('administrator_id', $this->administrator_id)
            ->findArray();

        if (!empty($services)) {
            foreach ($services as $id => $service) {
                $categories[$service['category']]['services'][$service['id']] = $service;
            }
        }


        if (!empty($categories)) {
            $tree = [];
            foreach ($categories as &$node) {
                if ($node['parent'] == 0 or !$node['parent']) {
                    $tree[$node['id']] = &$node;
                } else {
                    $categories[$node['parent']]['childs'][$node['id']] = &$node;
                }
            }
            $this->categories = $tree;
        }
    }

    public function add_category($array)
    {
        if (isset($array['active'])) {
            $array['active'] = 1;
        } else {
            $array['active'] = 0;
        }
        return ORM::forTable('services_categories')
            ->create()
            ->set('administrator_id', $this->administrator_id)
            ->set('name', $array['name'])
            ->set('parent', $array['parent'])
            ->set('active', $array['active'])
            ->save();
    }

}