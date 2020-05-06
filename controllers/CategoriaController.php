<?php
class CategoriaController {
    private $model;

    public function __construct() {
        $this->model = new CategoriaModel();
    }
    
    public function set($cate_data = array()) {
        return $this->model->set($cate_data);
    }

    public function get($cate_cod = '') {
        return $this->model->get($cate_cod);
    }
    
    public function del($cate_cod = '') {
        return $this->model->del($cate_cod);
    }
    
}
