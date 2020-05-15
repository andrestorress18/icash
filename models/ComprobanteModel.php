<?php
class ComprobanteModel extends Model {

    public function set($prod_data = array()) {
        foreach ($prod_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_comprobante (comp_ref, prod_nom, prod_des) VALUES ($comp_ref, '$prod_nom', '$prod_des');";
        $id_reg = $this->set_query();
        return $id_reg;
    }
    public function get($prod_cod = '') {
        $this->query = ($prod_cod != '')
        ? "SELECT * FROM tbl_comprobante AS C
            INNER JOIN tbl_tipo AS T ON T.tipo_cod = C.comp_tipo_fk
            INNER JOIN tbl_comprobante_detalle AS CD ON CD.code_comp_fk = C.comp_ref
            INNER JOIN tbl_producto AS P ON P.prod_cod = CD.code_prod_fk
            WHERE CD.code_prod_fk = $prod_cod"
        : 'SELECT * FROM tbl_comprobante AS C
            INNER JOIN tbl_tipo AS T ON T.tipo_cod = C.comp_tipo_fk
            INNER JOIN tbl_comprobante_detalle AS CD ON CD.code_comp_fk = C.comp_ref
            INNER JOIN tbl_producto AS P ON P.prod_cod = CD.code_prod_fk';
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }  
    public function get_comp($comp_ref = '') {
        $this->query = ($comp_ref != '')
        ? "SELECT * FROM tbl_comprobante AS C
            INNER JOIN tbl_tipo AS T ON T.tipo_cod = C.comp_tipo_fk
            LEFT JOIN tbl_cliente_proveedor AS CL ON CL.clpr_cod = C.comp_clpr_fk
            WHERE CD.code_prod_fk = $comp_ref"
        : 'SELECT * FROM tbl_comprobante AS C
            INNER JOIN tbl_tipo AS T ON T.tipo_cod = C.comp_tipo_fk
            LEFT JOIN tbl_cliente_proveedor AS CL ON CL.clpr_cod = C.comp_clpr_fk';
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    } 

    public function del($comp_ref = '') {
        $this->query = "DELETE FROM tbl_comprobante WHERE comp_ref = $comp_ref";
        $this->set_query();
    }

}
