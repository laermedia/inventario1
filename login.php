<?php
    include_once ('gestion.php');
    
    if (isset($_SESSION['user_id']))
    {
        header('Location: /inventario');
    }

    include_once ('TControl.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesión</title>
        <link rel="stylesheet" href="stil.css">
        <link rel="shortcut icon" href="#">
    </head>
    <body>
        <?php require 'nav.php'; ?>
        <main>
            <?php require 'mensaje.php'; ?>
                <section class="datosLogin">
                    <div>
                        <form action="gestion.php" method="POST">
                            <fieldset>
                                <legend>Datos de usuario <span>*</span></legend>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <input class="datoUser" type="email" name="email" placeholder="Correo" autofocus/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input class="datoUser" type="password" name="password" placeholder="Contraseña"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="btn" type="submit" name="enviar" value="Entrar">
                                            </td>
                                            <td>
                                                <input class="btn" type="reset" name="delete" value="Limpiar">
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="label" colspan="2">
                                                <label><span>*</span> Todos los campos son obligatorios.</label>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>                            
                            </fieldset>
                        </form>
                    </div>
                </section>
            <div class="back">
                <a href="index.php">Volver al inventario</a>
            </div>
        </main>
        <?php require 'footer.php';