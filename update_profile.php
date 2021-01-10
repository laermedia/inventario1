<?php
    include_once ('gestion.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar Perfil</title>
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
                                                <input class="datoUser" type="text" name="name" placeholder="Nombre" autofocus/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input class="datoUser" type="text" name="lastname" placeholder="Apellidos"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input class="datoUser" type="text" name="cargo" placeholder="Cargo"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input class="datoUser" type="text" name="departamento" placeholder="Departamento"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input class="datoUser" type="email" name="email" placeholder="Nuevo correo"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <label for="nacimiento">Fecha de Nacimiento</label>
                                                <input class="datoUser" type="date" name="birth"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input class="datoUser" type="password" name="password" placeholder="Nueva contraseña"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="btn" type="submit" name="enviar" value="Actualizar Perfil">
                                            </td>
                                            <td>
                                                <input class="btn" type="reset" name="delete" value="Limpiar">
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="label" colspan="2">
                                                <label><span>*</span> Rellenar sólo los datos que se quieren cambiar.</label>
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