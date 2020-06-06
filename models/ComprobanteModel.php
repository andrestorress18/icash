<?php
class ComprobanteModel extends Model {

    public function add($comp_data = array(),$tip) {
        foreach ($comp_data as $key => $value) {
            $$key = $value;
        }
        if ($tip==0) {
            $this->query = "INSERT INTO tbl_comprobante (comp_fec, comp_des,comp_val, comp_tipo_fk,comp_clpr_fk, comp_usua_fk) VALUES ('$comp_fec','$comp_des','$comp_val',$comp_tipo_fk,$comp_clpr_fk,$comp_usua_fk);";
        }else if($tip==1){
            $this->query = "INSERT INTO tbl_comprobante (comp_fec, comp_des,comp_val, comp_tipo_fk,comp_clpr_fk, comp_usua_fk,comp_comp_fk) VALUES ('$comp_fec','$comp_des','$comp_val',$comp_tipo_fk,$comp_clpr_fk,$comp_usua_fk,$comp_comp_fk);";
        }
        
        $id_reg = $this->set_query();
        return $id_reg;
    }
    public function add_detalle($comp_query) {
        $this->query = $comp_query;
        $this->set_query();
    }

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
            WHERE CD.code_prod_fk = $prod_cod ORDER BY C.comp_ref"
        : 'SELECT * FROM tbl_comprobante AS C
            INNER JOIN tbl_tipo AS T ON T.tipo_cod = C.comp_tipo_fk
            INNER JOIN tbl_comprobante_detalle AS CD ON CD.code_comp_fk = C.comp_ref
            INNER JOIN tbl_producto AS P ON P.prod_cod = CD.code_prod_fk ORDER BY C.comp_ref';
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    } 
    public function get_deta($comp_ref = '') {
        $this->query = ($comp_ref != '')
        ? "SELECT * FROM tbl_comprobante AS C
            INNER JOIN tbl_tipo AS T ON T.tipo_cod = C.comp_tipo_fk
            INNER JOIN tbl_comprobante_detalle AS CD ON CD.code_comp_fk = C.comp_ref
            INNER JOIN tbl_producto AS P ON P.prod_cod = CD.code_prod_fk
            WHERE C.comp_ref = $comp_ref ORDER BY C.comp_ref"
        : "SELECT * FROM tbl_comprobante AS C
            INNER JOIN tbl_tipo AS T ON T.tipo_cod = C.comp_tipo_fk
            INNER JOIN tbl_comprobante_detalle AS CD ON CD.code_comp_fk = C.comp_ref
            INNER JOIN tbl_producto AS P ON P.prod_cod = CD.code_prod_fk ORDER BY C.comp_ref";
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }  
    public function get_deta_prod($comp_ref ,$prod_cod) {
        $this->query = "SELECT * FROM tbl_comprobante AS C
            INNER JOIN tbl_tipo AS T ON T.tipo_cod = C.comp_tipo_fk
            INNER JOIN tbl_comprobante_detalle AS CD ON CD.code_comp_fk = C.comp_ref
            INNER JOIN tbl_producto AS P ON P.prod_cod = CD.code_prod_fk
            WHERE C.comp_ref = $comp_ref AND P.prod_cod = $prod_cod ORDER BY C.comp_ref";
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
            WHERE C.comp_ref = $comp_ref"
        : "SELECT * FROM tbl_comprobante AS C
            INNER JOIN tbl_tipo AS T ON T.tipo_cod = C.comp_tipo_fk
            LEFT JOIN tbl_cliente_proveedor AS CL ON CL.clpr_cod = C.comp_clpr_fk
            ORDER BY C.comp_ref";
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
