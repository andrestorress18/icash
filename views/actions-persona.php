<?php
$function = new FunctionModel();
$persona_controller = new PersonaController();
if(isset($_POST['crud'])){
    if ($_POST['crud'] == 'add-cliente') {
        $new_clpr = array(
            'clpr_cod'  => 0,
            'clpr_nom' => $_POST['clpr_nom'],
            'clpr_doc' => $_POST['clpr_doc'],
            'clpr_tip' => $_POST['clpr_tip'],
            'clpr_cel' => $_POST['clpr_cel'],
            'clpr_cor' => $_POST['clpr_cor'],
            'clpr_emp' => '',
            'clpr_nit' => ''
        );
        var_dump($new_clpr);
        $persona_controller->add($new_clpr);
        header('Location: ./clientes-proveedores&success=Cliente guardado');
    } if ($_POST['crud'] == 'add-proveedor') {
        $new_clpr = array(
            'clpr_cod'  => 0,
            'clpr_nom' => $_POST['clpr_nom'],
            'clpr_doc' => $_POST['clpr_doc'],
            'clpr_tip' => $_POST['clpr_tip'],
            'clpr_cel' => $_POST['clpr_cel'],
            'clpr_cor' => $_POST['clpr_cor'],
            'clpr_emp' => $_POST['clpr_emp'],
            'clpr_nit' => $_POST['clpr_nit']
        );
        var_dump($new_clpr);
        $persona_controller->add($new_clpr);
        header('Location: ./clientes-proveedores&success=Proveedor guardado');
    } else if ($_POST['crud'] == 'del') {
        $persona_controller->del($_POST['clpr_id']);
        header('Location: ./clientes-proveedores&success=Cliente eliminado');
    } else if ($_POST['crud'] == 'edi') {
        $act_clpr = array(
            'clpr_tit' => $_POST['clpr_tit'],
            'clpr_id'  => $_POST['clpr_id'],
        );
        $persona_controller->set($act_clpr);
        header('Location: ./clientes-proveedores&success=Cliente actualizada');
    }
}