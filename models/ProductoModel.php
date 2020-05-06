<?php
class ProductoModel extends Model {

    public function add($prod_data = array()) {
        foreach ($prod_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_producto (prod_nom, prod_des,prod_pve,prod_sto,prod_cate_fk) VALUES ('$prod_nom', '$prod_des','$prod_pve','$prod_sto',$prod_cate_fk);";
        $id_reg = $this->set_query();
        return $id_reg;
    }

    public function set($prod_data = array()) {
        foreach ($prod_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_producto (prod_cod, prod_nom, prod_des,prod_pve,prod_cate_fk) VALUES ($prod_cod, '$prod_nom', '$prod_des','$prod_pve',$prod_cate_fk);";
        $id_reg = $this->set_query();
        return $id_reg;
    }
    public function get($prod_cod = '') {
        $this->query = ($prod_cod != '')
        ? "SELECT E.* FROM tbl_producto AS E WHERE E.prod_cod = $prod_cod"
        : 'SELECT E.* FROM tbl_producto AS E';
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }  

    public function del($prod_cod = '') {
        $this->query = "DELETE FROM tbl_producto WHERE prod_cod = $prod_cod";
        $this->set_query();
    }

}
