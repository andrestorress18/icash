<?php
class PersonaController {
	private $model;

	public function __construct() {
		$this->model = new PersonaModel();
	}
	public function add($clpr_data = array()) {
		return $this->model->add($clpr_data);
	}
	public function set($clpr_data = array()) {
		return $this->model->set($clpr_data);
	}
	public function get($clpr_tip = '') {
		return $this->model->get($clpr_tip);
	}
	public function del($clpr_cod = '') {
		return $this->model->del($clpr_cod);
	}
}