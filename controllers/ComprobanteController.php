<?php 
class ComprobanteController {
	private $model;

	public function __construct() {
		$this->model = new ComprobanteModel();
	}
	public function set($comp_data = array()) {
		return $this->model->set($comp_data);
	}
	public function get($prod_cod = '') {
		return $this->model->get($prod_cod);
	}
	public function get_comp($comp_ref = '') {
		return $this->model->get_comp($comp_ref);
	}
	
	public function del($comp_ref = '') {
		return $this->model->del($comp_ref);
	}
}