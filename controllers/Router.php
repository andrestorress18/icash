<?php
class Router{
    public $route;

    public function __construct($route){
        $session_options = array(
            'use_only_cookies' => 1,
            'read_and_close'   => true,
        );
        if (!isset($_SESSION)) {
            session_start($session_options);
            $_SESSION['Sesion'] = false;
        }
        if (!isset($_SESSION['Sesion'])) $_SESSION['Sesion'] = false;
        if ($_SESSION['Sesion'] == true) {
            $this->route = isset($_GET['r']) ? $_GET['r'] : 'inicio';
            $controller  = new ViewController();
            switch ($this->route) {
                case 'login':
                    $controller->load_page('login');
                    break;
                case 'inicio':
                    $controller->load_view('inicio');
                    break;
                case 'kardex':
                    if (!isset($_POST['crud'])) $controller->load_view_user('kardex');
                    else if ($_POST['crud'] == 'add') $controller->load_page('actions-kardex');
                    else if ($_POST['crud'] == 'del') $controller->load_page('actions-kardex');
                    else if ($_POST['crud'] == 'edi') $controller->load_page('actions-kardex');
                    break;
                case 'cierre-inventario':
                    if (!isset($_POST['crud'])) $controller->load_view_user('cierre-inventario');
                    else if ($_POST['crud'] == 'add') $controller->load_page('actions-inventario');
                    else if ($_POST['crud'] == 'del') $controller->load_page('actions-inventario');
                    else if ($_POST['crud'] == 'edi') $controller->load_page('actions-inventario');
                    break;
                case 'registro':
                    if (!isset($_POST['crud']) AND !isset($_POST['comp'])) $controller->load_view_user('registro');
                    else if (isset($_POST['comp'])) $controller->load_view_user('comprobante');
                    else if ($_POST['crud'] == 'add') $controller->load_page('actions-comprobante');
                    else if ($_POST['crud'] == 'del') $controller->load_page('actions-comprobante');
                    else if ($_POST['crud'] == 'edi') $controller->load_page('actions-comprobante');
                    break;
                case 'comprobante':
                    if (!isset($_POST['crud']) AND !isset($_POST['deta'])) $controller->load_view_user('comprobante');
                    else if (isset($_POST['crud'])) $controller->load_page('actions-comprobante');
                    else if (isset($_POST['deta'])) $controller->load_page('actions-comprobante');
                    break;
                case 'productos':
                    if (!isset($_POST['crud'])) $controller->load_view_user('productos');
                    else if ($_POST['crud'] == 'add') $controller->load_page('actions-producto');
                    else if ($_POST['crud'] == 'del') $controller->load_page('actions-producto');
                    else if ($_POST['crud'] == 'edi') $controller->load_page('actions-producto');
                    else if ($_POST['crud'] == 'add-cate') $controller->load_page('actions-categoria');
                    else if ($_POST['crud'] == 'del-cate') $controller->load_page('actions-categoria');
                    else if ($_POST['crud'] == 'edi-cate') $controller->load_page('actions-categoria');
                    break;
                case 'usuarios':
                    if (!isset($_POST['crud'])) $controller->load_view_user('usuarios');
                    else if ($_POST['crud'] == 'add') $controller->load_page('actions-usuario');
                    else if ($_POST['crud'] == 'del') $controller->load_page('actions-usuario');
                    else if ($_POST['crud'] == 'edi') $controller->load_page('actions-usuario');
                    else if ($_POST['crud'] == 'edit-pass') $controller->load_page('actions-usuario');
                    break;
                case 'clientes-proveedores':
                    if (!isset($_POST['crud'])) $controller->load_view_user('clientes-proveedores');
                    else if ($_POST['crud'] == 'add-cliente') $controller->load_page('actions-persona');
                    else if ($_POST['crud'] == 'del-cliente') $controller->load_page('actions-persona');
                    else if ($_POST['crud'] == 'edi-cliente') $controller->load_page('actions-persona');
                    else if ($_POST['crud'] == 'add-proveedor') $controller->load_page('actions-persona');
                    else if ($_POST['crud'] == 'del-proveedor') $controller->load_page('actions-persona');
                    else if ($_POST['crud'] == 'edi-proveedor') $controller->load_page('actions-persona');
                    else if ($_POST['crud'] == 'edit-pass') $controller->load_page('actions-usuario');
                    break;
                case 'cerrar':
                    $user_session = new SessionController();
                    $user_session->logout();
                    break;
                default:
                    $controller->load_view('error404');
                    break;
            }
        } else {
            $this->route = isset($_GET['r']) ? $_GET['r'] : 'inicio';
                $controller  = new ViewController();
                switch ($this->route) {
                    case 'login':
                        
                        if (!isset($_POST['email']) && !isset($_POST['pass'])) {
                            $controller->load_page('login');
                        } else {
                            
                            
                            $user_session = new SessionController();
                            $session      = $user_session->login($_POST['email'], $_POST['pass']);
                            if (empty($session)) {
                                header('Location: ./login&error=El usuario ' . $_POST['email'] . ' y el password proporcionados no coinciden.');
                            }else {
                                $_SESSION['Sesion']   = true;
                                $_SESSION['usua_id'] = $session[0]['usua_cod'];
                                $_SESSION['usua_ced'] = $session[0]['usua_ced'];
                                $_SESSION['usua_ema'] = $session[0]['usua_cor'];
                                $_SESSION['usua_pas'] = $session[0]['usua_pas'];
                                $_SESSION['usua_img'] = $session[0]['usua_fot'];
                                $_SESSION['usua_nom'] = $session[0]['usua_nom'];
                                $_SESSION['usua_dir'] = $session[0]['usua_dir'];
                                $_SESSION['usua_rol'] = $session[0]['usua_rol'];
                                $_SESSION['empr_nom'] = $session[0]['empr_nom'];
                                $_SESSION['empr_des'] = $session[0]['empr_des'];
                                $_SESSION['empr_log'] = $session[0]['empr_log'];
                                $_SESSION['empr_nit'] = $session[0]['empr_nit'];
                                header('Location: ./kardex');
                            }
                        }
                        break;
                    default: 
                        $controller->load_view('inicio');
                        break;
                    }
            
        }
    }
}
