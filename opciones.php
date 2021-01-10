<?php
    header("Content-Type: text/html;charset=utf-8");

    if(isset($_POST['option']))
    {
        $option = $_POST['option'];

        switch($option)
        {
            case "Actualizar":
                header('Location: /inventario/index.php?update=true');
                break;

            case "Iniciar Sesión":
                include_once ("login.php");
                break;

            case "Registrarse":
                include_once ("signup.php");
                break;
            
            case "Mi Perfil":
                include_once ("profile.php");
                break;
            
            case "Nuevo Item":
                include_once ("new_item.php");
                break;

            case "Borrar Item":
                include_once ("delete_item.php");
                break;

            case "Cerrar Sesión":
                include_once ("logout.php");            
        }
    }