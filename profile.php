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
        <title><?php echo $admin['nombre']; ?></title>
        <link rel="stylesheet" href="stil.css">
        <link rel="shortcut icon" href="#">
    </head>
    <body>
        <?php require 'nav.php'; ?>
        <main>
            <?php require 'mensaje.php'; ?>            
            <section>
                <table>
                    <thead>
                        <tr>
                            <th class="campo" colspan="5">Datos de Usuario</th>
                        </tr>
                        <tr>
                            <th class="campo">ID de Usuario</th>
                            <!--Code by LÆRMEDIA © 2020-->
                            <th class="campo">Nombre</th>
                            <th class="campo">Cargo</th>
                            <th class="campo">Departamento</th>
                            <th class="campo">Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class='item'><?php echo $admin['id']; ?></td>
                            <td class='item'><?php echo $admin['nombre']; ?></td>
                            <td class='item'><?php echo $admin['cargo']; ?></td>
                            <td class='item'><?php echo $admin['departamento']; ?></td>
                            <td class='item'><?php echo $admin['correo']; ?></td>
                        </tr>
                    </tbody>
                </table>

                <table class="tablaB">
                    <thead>
                        <tr>
                            <th class="campo" colspan="2">Datos Personales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="campo">Nombre</td>
                            <td class='item'><?php echo $admin['nombre']; ?></td>
                        </tr>
                        <tr>
                            <td class="campo">Apellidos</td>
                            <td class='item'><?php echo $admin['apellidos']; ?></td>
                        </tr>
                        <tr>
                            <td class="campo">Nacimiento</td>
                            <td class='item'><?php echo $admin['nacimiento']; ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="item" colspan="5">
                                <a href="update_profile.php">Actualizar Datos</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </section>
            <div class="back">
                <a href="index.php">Volver al inventario</a>
            </div>
        </main>
        <?php require 'footer.php';