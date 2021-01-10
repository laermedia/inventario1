<?php
    if(isset($_GET['update']))
    {
        $message = 'Tabla actualizada correctamente';
    }
    
    if(isset($_GET['hack']))
    {
        $messageFail = 'Debes iniciar sesión';
    }

    if(isset($_GET['signup']))
    {
        $message = "Usuario creado con éxito";
    }

    if(isset($_GET['new_item']))
    {
        $message = "Item creado con éxito";
    }

    if(isset($_GET['update_item']))
    {
        $message = "Item actualizado con éxito";
    }

    /*
        Code by LÆRMEDIA © 2020
    */

    if(isset($_GET['update_user']))
    {
        $message = "Datos de usuario actualizados con éxito";
    }

    if(isset($_GET['delete']))
    {
        $message = "Item eliminado con éxito";
    }
    
    if(isset($_GET['alert']))
    {
        $messageFail = "El correo ya existe, inicie sesión";
    }
    
    if(isset($_GET['error']))
    {
        $messageFail = "Datos de usuario incorrectos";
    }

    if(isset($_GET['error01']))
    {
        $messageFail = 'Ha ocurrido un error';
    }
    
    if(isset($_GET['error02']))
    {
        $messageFail = "Todos los campos son obligatorios";
    }