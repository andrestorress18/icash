<?php
class CategoriaModel extends Model {
    public function add($cate_data = array()) {
        foreach ($cate_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_categoria (cate_nom,cate_des) VALUES ('$cate_nom','$cate_des')";
         return $this->set_query();
    }
    public function set($cate_data = array()) {
        foreach ($cate_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_categoria (cate_cod, cate_nom, cate_des) VALUES ($cate_cod, '$cate_nom', '$cate_des');";
        $id_reg = $this->set_query();
        return $id_reg;
    }
    public function get($cate_cod = '') {
        $this->query = ($cate_cod != '')
        ? "SELECT * FROM tbl_categoria WHERE cate_cod = $cate_cod"
        : 'SELECT * FROM tbl_categoria';
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }  

    public function del($cate_cod = '') {
        $this->query = "DELETE FROM tbl_categoria WHERE cate_cod = $cate_cod";
        $this->set_query();
    }

}
