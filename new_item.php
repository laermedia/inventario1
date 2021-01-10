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
        <title>Nuevo Item</title>
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
                                <legend>Datos del nuevo artículo <span>*</span></legend>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <select class="datoUser" name='category'>
                                                    <option>Seleccionar categoría</option>
                                                    <option value="Camiseta">Camiseta</option>
                                                    <option value="Chapa">Chapa</option>
                                                    <option value="Gorra">Gorra</option>
                                                    <option value="Mascarilla">Mascarilla</option>
                                                    <option value="Mochila">Mochila</option>
                                                    <option value="Óptica">Óptica</option>
                                                    <option value="Vaso">Vaso</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input class="datoUser" type="text" name="model" placeholder="Modelo"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <select class="datoUser" name='colour'>
                                                    <option>Seleccionar color</option>
                                                    <option value="Blanco">Blanco</option>
                                                    <option value="Negro">Negro</option>
                                                    <option value="Azul">Azul</option>
                                                    <option value="Rojo">Rojo</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input class="datoUser" type="text" name="price" placeholder="Precio"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input class="datoUser" type="number" name="stock" placeholder="Cantidad"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="btn" type="submit" name="enviar" value="Crear Item">
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