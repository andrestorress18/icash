<?php
class PersonaModel extends Model{

    public function add($persona_data = array()) {
        foreach ($persona_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_cliente_proveedor (clpr_doc, clpr_nom, clpr_nit, clpr_emp, clpr_cel, clpr_cor, clpr_tip) VALUES ('$clpr_doc', '$clpr_nom', '$clpr_nit', '$clpr_emp', '$clpr_cel', '$clpr_cor', '$clpr_tip')";
         return $this->set_query();
    }

    public function set($persona_data = array()) {
        foreach ($persona_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_cliente_proveedor SET clpr_ced = '$clpr_ced', clpr_nom = '$clpr_nom', clpr_cor = '$clpr_cor', clpr_rol = '$clpr_rol', clpr_est = '$clpr_est', clpr_enti_fk = $clpr_enti_fk";
        $this->query .= isset($clpr_pas) ? ", clpr_pas = MD5('$clpr_pas')" : "";
        $this->query .= isset($clpr_img) ? ", clpr_img = '$clpr_img'" : "";
        $this->query .= " WHERE clpr_cod = $clpr_cod;";
        return $this->set_query();
    }

    public function get($clpr_tip = '') {
        $this->query = ($clpr_tip != '') ? "SELECT * FROM tbl_cliente_proveedor WHERE clpr_tip = '$clpr_tip'"
        :"SELECT * FROM tbl_cliente_proveedor";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    
    public function del($user = '') {
        $this->query = "DELETE FROM tbl_cliente_proveedor WHERE clpr_cod = $user";
        $this->set_query();
    }

}
