<?php
class ProductoController {
    private $model;

    public function __construct() {
        $this->model = new ProductoModel();
    }
    public function add($prod_data = array()) {
        return $this->model->add($prod_data);
    }
    public function set($prod_data = array()) {
        return $this->model->set($prod_data);
    }
    public function set_producto($prod_cod,$prod_val,$prod_can,$comp_tipo,$devo) {
        return $this->model->set_producto($prod_cod,$prod_val,$prod_can,$comp_tipo,$devo);
    }
    public function get($prod_cod = '') {
        return $this->model->get($prod_cod);
    }
    
    public function del($prod_cod = '') {
        return $this->model->del($prod_cod);
    }
    
}
