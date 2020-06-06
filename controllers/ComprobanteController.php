<?php 
class ComprobanteController {
	private $model;

	public function __construct() {
		$this->model = new ComprobanteModel();
	}
	public function add($comp_data = array(),$tip) {
		return $this->model->add($comp_data,$tip);
	}
	public function add_detalle($deta_query) {
		return $this->model->add_detalle($deta_query);
	}
	public function set($comp_data = array()) {
		return $this->model->set($comp_data);
	}
	public function get($prod_cod = '') {
		return $this->model->get($prod_cod);
	}
	public function get_deta_prod($comp_ref,$prod_cod) {
		return $this->model->get_deta_prod($comp_ref,$prod_cod);
	}
	public function get_deta($comp_ref = '') {
		return $this->model->get_deta($comp_ref);
	}
	
	public function get_comp($comp_ref = '') {
		return $this->model->get_comp($comp_ref);
	}
	
	public function del($comp_ref = '') {
		return $this->model->del($comp_ref);
	}
}