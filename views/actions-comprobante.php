<?php
$function = new FunctionModel();
$comprobante_controller = new ComprobanteController();
if(isset($_POST['crud'])){
    echo "Venta";
    if ($_POST['crud'] == 'add') {
        $new_prod = array(
            'prod_cod'  => 0,
            'prod_nom' => $_POST['prod_nom'],
            'prod_des' => $_POST['prod_des'],
            'prod_pve' => $_POST['prod_pve'],
            'prod_sto' =>0,
            'prod_cate_fk' => $_POST['prod_cate_fk']
        );
        //var_dump($new_prod);
        $comprobante_controller->add($new_prod);
        header('Location: ./comprobantes&success=comprobante guardado');
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
            $code_prod = $_POST['code_prod'];
            $code_prec = $_POST['code_prec'];
            $code_cant = $_POST['code_cant'];
            $code_subt = $_POST['code_subt'];
            $comp_clie = $_POST['comp_clie'];
            $comp_des = $_POST['comp_des'];
            if(!isset($_SESSION['clie'])){
                $_SESSION['clie'] = $comp_clie;
                $_SESSION['desc'] = $comp_des;
            }
            $resul_prod = $producto_controller->get($code_prod); 
            $prod_nom = $resul_prod[0]['prod_nom'];
            $_SESSION['detalle'][$code_prod] = array('code_prod'=>$code_prod, 'prod_nom'=>$prod_nom, 'code_prec'=>$code_prec, 'code_cant'=>$code_cant, 'code_subt'=>$code_subt);
            header('Location: ./comprobante');
                
        break;
        case 'compra':
            echo "Compra";
            break;
        
        default:
            echo "Ninguna opción";
            break;
        
    }
}
