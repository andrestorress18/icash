<?php
class ComprobanteModel extends Model {

    public function set($prod_data = array()) {
        foreach ($prod_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_comprobante (prod_cod, prod_nom, prod_des) VALUES ($prod_cod, '$prod_nom', '$prod_des');";
        $id_reg = $this->set_query();
        return $id_reg;
    }
    public function get($prod_cod = '') {
        $this->query = ($prod_cod != '')
        ? "SELECT E.* FROM tbl_comprobante AS E WHERE E.prod_cod = $prod_cod"
        : 'SELECT E.* FROM tbl_comprobante AS E';
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }  

    public function del($prod_cod = '') {
        $this->query = "DELETE FROM tbl_comprobante WHERE prod_cod = $prod_cod";
        $this->set_query();
    }

}
