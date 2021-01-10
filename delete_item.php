<?php
    include_once ('gestion.php');
    
    if (!isset($_SESSION['user_id']))
    {
        header('Location: /inventario/index.php?hack=true');
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Borrar Item</title>
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
                                <legend>Seleccionar Item <span>*</span></legend>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label" colspan="2">
                                                <?php
                                                    $c = new tControl();
                                                    $res = $c->listar_items();
                                                    //echo ("mensaje de exito!");
                                                    echo ($res);
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label" colspan="2">
                                                <input  class="datoUser"  type="number" name="numero" placeholder="Cantidad a eliminar">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="btn" type="submit" name="enviar" value="Eliminar">
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="label" colspan="2">
                                                <label><span>*</span> Si no indica un número, se eliminarán todas las existencias del item.</label>
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