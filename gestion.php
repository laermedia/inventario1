<?php
    session_start();
    header("Content-Type: text/html;charset=utf-8");

    include_once ("TControl.php");
    include_once ("alertas.php");
    
    if (isset($_SESSION['user_id']))
    {
        //echo('Sesión iniciada OK');
        $id_user = $_SESSION['user_id'];
        
        $c = new tControl();
        $admin = $c->datos_user($id_user);
    }

    if(isset($_POST["enviar"]))
    {
        $enviar = $_POST["enviar"];
        switch ($enviar)
        {
            case "Registrarse":
                if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
                {
                    $nombre = $_POST['name'];
                    $correo = $_POST['email'];
                    $contrasenya = sha1($_POST['password']);
                   
                    $c = new tControl();
                    $res = $c->user_creado($nombre, $correo, $contrasenya);

                    if($res)
                    {
                        header('Location: /inventario/login.php?signup=true');
                        //echo ($res);
                    }
                    else if($res === 0)
                    {
                        header('Location: /inventario/login.php?alert=true');
                    }
                    else
                    {
                        header('Location: /inventario/signup.php?error01=true');
                    }
                }
                else
                {
                    header('Location: /inventario/signup.php?error02=true');
                }
                break;

            case "Entrar":
                if(!empty($_POST["email"]) && !empty($_POST["password"]))
                {
                    $correo = $_POST['email'];
                    $contrasenya = sha1($_POST['password']);

                    $c = new tControl();
                    $res = $c->entrar_user($correo, $contrasenya);

                    if($res)
                    {
                        header('Location: /inventario');
                    }
                    else
                    {
                        header('Location: /inventario/login.php?error=true');
                        //echo ("Error al login");
                    }
                }
                else
                {
                    header('Location: /inventario/login.php?error02=true');
                }
                break;
            
            case "Crear Item":
                if(!empty($_POST['category']) && !empty($_POST['model']) && !empty($_POST['colour']) && !empty($_POST['price']) && !empty($_POST['stock']))
                {
                    $categoria = $_POST['category'];
                    $modelo = $_POST['model'];
                    $color = $_POST['colour'];
                    $precio = $_POST['price'];
                    $existencias = $_POST['stock'];
                    $fecha = date('Y-m-d H:i:s');

                    $c = new tControl();
                    $res = $c->item_creado($categoria, $modelo, $color, $precio, $existencias, $fecha);

                    if($res === 1)
                    {
                        header('Location: /inventario/index.php?update_item=true');
                    }
                    else if($res)
                    {
                        header('Location: /inventario/index.php?new_item=true');
                    }
                }
                else
                {
                    header('Location: /inventario/new_item.php?error02=true');
                }
                break;
            
            case "Eliminar":
                //echo("Eliminado OK");
                if(isset($_POST['item']))
                {
                    if(empty($_POST['numero']))
                    {
                        $id_item = $_POST['item'];
                        $numero = null;
                    }
                    else
                    {
                        $id_item = $_POST['item'];
                        $numero = $_POST['numero'];
                    }
                    //echo($id_item);
                    //echo($numero);

                    $c = new tControl();
                    $res = $c->item_eliminado($id_item, $numero);
                    //echo($res);

                    if($res)
                    {
                        header('Location: /inventario/index.php?delete=true');
                    }
                    else
                    {
                        header('Location: /inventario/index.php?error01=true');
                    }
                }
                break;
            
            case "Actualizar Perfil":
                //echo('actualizado de perfil OK');
                $id_user = $_SESSION['user_id'];
                $nombre = $_POST['name'];
                $apellidos = $_POST['lastname'];
                $cargo = $_POST['cargo'];
                $departamento = $_POST['departamento'];
                $correo = $_POST['email'];
                $nacimiento = $_POST['birth'];
                $contrasenya = $_POST['password'];

                //echo($id_user . '<br/>');
                
                $c = new tControl();
                $res = $c->actualiza_perfil($id_user, $cargo, $departamento, $nombre, $apellidos, $correo, $nacimiento, $contrasenya);

                if($res)
                {
                    header('Location: /inventario/profile.php?update_user=true');
                }
                else
                {
                    header('Location: /inventario/profile.php?error01=true');
                }

                break;
        }
    }