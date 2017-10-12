<?php
require_once '../php/connection.php';

$user = filter_input(INPUT_POST, 'user');
$pass = filter_input(INPUT_POST, 'pass');

if ($user === '' && $pass === ''){
    $alerta = '<script name="accion">alert("Los campos están vacíos, por completar datos");</script>';
    echo $alerta;
} else {
    $query = mysqli_query(connection::getInstance()->conectar(), "SELECT * FROM proventa.usuario WHERE usuario.n_usuario  LIKE '%" . $user . "%' AND usuario.contraseña LIKE  '%" . $pass . "%'");
    $redirect = '<script type="text/javascript"> window.location.remplace("views/prueba.php");</script>';
    echo $redirect;
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

