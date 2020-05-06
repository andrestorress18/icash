<?php
class EmpresaModel extends Model {
	
	public function set($empr_data= array()){
       
    }

	public function get($empr_cod = '') {
		$this->query = ($empr_cod != '')
		?"SELECT * FROM tbl_empresa WHERE empr_cod = $empr_cod"
    	:"SELECT * FROM tbl_empresa";
		$this->get_query();
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		//var_dump($data);
		return $data;
	}
	public function del(){}
}

