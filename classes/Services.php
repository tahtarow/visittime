<?php

class Services
{
    public
        $administrator_id,
        $list,
        $services;


    function __construct($administrator_id)
    {
        $this->administrator_id = $administrator_id;
        $this->load_services();
    }

    function load_services()
    {

        $categories = ORM::forTable('services_categories')
            ->where('administrator_id', $this->administrator_id)
            ->orderByAsc('position')
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
            ->orderByAsc('position')
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
            $this->list = $tree;
        }
    }

    public function add_category($array)
    {
        if (isset($array['active'])) {
            $array['active'] = 1;
        } else {
            $array['active'] = 0;
        }
        if (!empty($_POST['parent_category'])){
            $so_categories = ORM::forTable('services_categories')->where('parent', $_POST['parent_category'])->count();
            $position = $so_categories + 1;
        }else{
            $so_categories = ORM::forTable('services_categories')->where('parent', 0)->count();
            $position = $so_categories + 1;
        }
        return ORM::forTable('services_categories')
            ->create()
            ->set('administrator_id', $this->administrator_id)
            ->set('name', $array['name'])
            ->set('parent', $array['parent'])
            ->set('active', $array['active'])
            ->set('position', $position)
            ->save();
    }

    public function get_cat_info($cat_id)
    {
        return ORM::forTable('services_categories')
                ->where('administrator_id', $this->administrator_id)
                ->where('id', $cat_id)
                ->findArray()[0];

    }

    public function edit_category($data)
    {
        return ORM::forTable('services_categories')
            ->find_one($data['id'])
            ->set('name',$data['name'])
            ->set('parent',$data['parent'])
            ->set('active',$data['active'])
            ->save();
    }

}