<?php
    include_once ('gestion.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inventario</title>
        <link rel="stylesheet" href="stil.css">
        <link rel="shortcut icon" href="#">
    </head>
    <body>
        <?php require 'nav.php'; ?>
        <main>
            <?php require 'mensaje.php'; ?>
            <table>
                <thead>
                    <tr>
                        <th class="campo" colspan="7">
                            <?php if(!empty($admin)): ?>
                                Bienvenido <?php echo $admin['nombre']; ?>
                            <?php else: ?>
                                Inventario LÆRMEDIA
                            <?php endif; ?>
                        </th>
                    </tr>
                    <tr>
                        <th class="campo">ID de Producto</th>
                        <th class="campo">Categoría</th>
                        <th class="campo">Modelo</th>
                        <!--Code by LÆRMEDIA © 2020-->
                        <th class="campo">Color</th>
                        <th class="campo">Precio (und)</th>
                        <th class="campo">Existencias</th>
                        <th class="campo">Fecha de entrada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $c = new tControl();
                        $res = $c->listados();
                        if($res)
                        {
                            echo($res);
                        }
                        else
                        {
                            $messageFail = 'Ha ocurrido un error con la tabla';
                        }
                        //echo('Mensaje de prueba');
                    ?>
                </tbody>
            </table>
        </main>
        <?php require 'footer.php';