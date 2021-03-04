<?php 

    //2 Si el usuario no existe lo enviamos al login
    function usuario_autenticado() {
        if(!revisar_usuario() ){
            header('location:../index.php');
            exit();
        }
    }

    //1 verifico si el usuario existe
    function revisar_usuario() {
        return isset($_SESSION['usuario']);
    }
    //3 Inicio sesion
    session_start();
    usuario_autenticado();
?>