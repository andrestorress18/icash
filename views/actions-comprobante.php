<?php
$function = new FunctionModel();
$comprobante_controller = new ComprobanteController();
if(isset($_POST['crud'])){
    if ($_POST['crud'] == 'add-comp') {
        //echo "Compra";
        $new_comp = array(
            'comp_des' => $_POST['comp_des'],
            'comp_fec' => $_POST['comp_fec'],
            'comp_val' => $_SESSION['comp-total'],
            'comp_tipo_fk' => 2,
            'comp_clpr_fk' => $_POST['comp_clpr_fk'],
            'comp_usua_fk' => $_SESSION['usua_id']
        );
        $comp_ref = $comprobante_controller->add($new_comp,0);
        $detalle_compra = $_SESSION['comp-detalle'];
        $producto_controller = new ProductoController();
        $template_query = "INSERT INTO tbl_comprobante_detalle (code_can, code_prt, code_comp_fk, code_prod_fk)";
        $template_query .= " VALUES ";
        foreach($detalle_compra as $k => $deta){
            $template_query .= "('".$deta['code_can']."', '".$deta['code_sub']."',".$comp_ref.",".$deta['code_prod_fk']." ),";
            $producto_controller->set_producto($deta['code_prod_fk'],$deta['code_pre'],$deta['code_can'],2,false);
        }
        $template_query = substr($template_query, 0, -1);
        $comprobante_controller->add_detalle($template_query);
        unset($_SESSION['comp-desc']);
        unset($_SESSION['comp-clie']);
        unset($_SESSION['comp-total']);
        unset($_SESSION['comp-detalle']);
        header('Location: ./registro&success=Compra guardada correctamente');
    } else if ($_POST['crud'] == 'add-vent') {
        //echo "Venta";
        $new_vent = array(
            'comp_des' => $_POST['comp_des'],
            'comp_fec' => $_POST['comp_fec'],
            'comp_val' => $_SESSION['vent-total'],
            'comp_tipo_fk' => 3,
            'comp_clpr_fk' => $_POST['comp_clpr_fk'],
            'comp_usua_fk' => $_SESSION['usua_id']
        );
        $comp_ref = $comprobante_controller->add($new_vent,0);
        $detalle_venta = $_SESSION['vent-detalle'];
        $producto_controller = new ProductoController();
        $template_query = "INSERT INTO tbl_comprobante_detalle (code_can, code_prt, code_comp_fk, code_prod_fk)";
        $template_query .= " VALUES ";
        foreach($detalle_venta as $k => $deta){
            $template_query .= "('".$deta['code_can']."', '".$deta['code_sub']."',".$comp_ref.",".$deta['code_prod_fk']." ),";
            $producto_controller->set_producto($deta['code_prod_fk'],'',$deta['code_can'],3,false);
        }
        $template_query = substr($template_query, 0, -1);
        $comprobante_controller->add_detalle($template_query);
        unset($_SESSION['vent-desc']);
        unset($_SESSION['vent-clie']);
        unset($_SESSION['vent-total']);
        unset($_SESSION['vent-detalle']);
        header('Location: ./registro&success=Venta guardada correctamente');
    }  else if ($_POST['crud'] == 'add-devo') {
        //echo "Devolucion: ";
        $new_devo = array(
            'comp_des' => $_POST['comp_des'],
            'comp_fec' => $_POST['comp_fec'],
            'comp_val' => $_POST['comp_val'],
            'comp_tipo_fk' => 4,
            'comp_clpr_fk' => $_POST['comp_clpr_fk'],
            'comp_usua_fk' => $_SESSION['usua_id'],
            'comp_comp_fk' => $_POST['comp_ref']
        );
        //var_dump($new_devo);
        $comp_ref = $comprobante_controller->add($new_devo,1);
        $num_devo = count($_POST['code_can']);
        $producto_controller = new ProductoController();
        $template_query = "INSERT INTO tbl_comprobante_detalle (code_can, code_prt, code_comp_fk, code_prod_fk)";
        $template_query .= " VALUES ";
        for ($i=0; $i < $num_devo; $i++) {
            if($_POST['code_can'][$i] <>0){
                $template_query .= "('".$_POST['code_can'][$i]."', '".$_POST['code_prt'][$i]."',".$comp_ref.",".$_POST['code_prod_fk'][$i]." ),";
                $producto_controller->set_producto($_POST['code_prod_fk'][$i],'',$_POST['code_can'][$i],$_POST['comp_tipo_fk'],true);
            }
        }
        $template_query = substr($template_query, 0, -1);
        $comprobante_controller->add_detalle($template_query);
        header('Location: ./registro&success=Devolución guardada correctamente');
    } else if ($_POST['crud'] == 'del') {
        $comprobante_controller->del($_POST['prod_id']);
        header('Location: ./comprobantes&success=comprobante eliminado');
    } else if ($_POST['crud'] == 'edi') {
        $act_prod = array(
            'prod_tit' => $_POST['prod_tit'],
            'prod_id'  => $_POST['prod_id'],
        );
        $comprobante_controller->set($act_prod);
        header('Location: ./comprobantes&success=comprobante actualizada');
    }
}else if(isset($_POST['deta'])){
    $producto_controller = new ProductoController();
    switch ($_POST['deta']) {
        case 'venta':
            $code_prod_fk = $_POST['code_prod_fk'];
            $code_pre = $_POST['code_pre'];
            $code_can = $_POST['code_can'];
            $code_sub = $_POST['code_sub'];
            $comp_clie_fk = $_POST['comp_clie_fk'];
            $comp_des = $_POST['comp_des1'];
            $_SESSION['vent-clie'] = $comp_clie_fk;
            $_SESSION['vent-desc'] = $comp_des;

            $resul_prod = $producto_controller->get($code_prod_fk); 
            $prod_nom = $resul_prod[0]['prod_nom'];
            $_SESSION['vent-detalle'][$code_prod_fk] = array('code_prod_fk'=>$code_prod_fk, 'prod_nom'=>$prod_nom, 'code_pre'=>$code_pre, 'code_can'=>$code_can, 'code_sub'=>$code_sub);
            header('Location: ./comprobante');
                
        break;
        case 'compra':
            $code_prod_fk = $_POST['code_prod_fk'];
            $code_pre = $_POST['code_pre'];
            $code_can = $_POST['code_can'];
            $code_sub = $_POST['code_sub'];
            $comp_clie_fk = $_POST['comp_clie_fk'];
            $comp_des = $_POST['comp_des1'];
            $_SESSION['comp-clie'] = $comp_clie_fk;
            $_SESSION['comp-desc'] = $comp_des;

            $resul_prod = $producto_controller->get($code_prod_fk); 
            $prod_nom = $resul_prod[0]['prod_nom'];
            $_SESSION['comp-detalle'][$code_prod_fk] = array('code_prod_fk'=>$code_prod_fk, 'prod_nom'=>$prod_nom, 'code_pre'=>$code_pre, 'code_can'=>$code_can, 'code_sub'=>$code_sub);
            header('Location: ./comprobante');
            break;
        
        default:
            echo "Ninguna opción";
            break;
        
    }
}else if(isset($_POST['search'])){
    if ($_POST['search'] == 'devo-sear') {
        $_SESSION['search'] = $_POST['comp_sear'];
        header('Location: ./comprobante');
    }
}
