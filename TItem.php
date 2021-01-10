<?php
    include_once ('TAccess.php');

    class TItem
    {
        private $id_item;
        private $categoria;
        private $modelo;
        private $color;
        private $precio;
        private $existencias;
        private $fecha;        
        private $numero;
        private $abd;

        function __construct($v_id_item, $v_categoria, $v_modelo, $v_color, $v_precio, $v_existencias, $v_fecha, $v_numero, $server, $user, $password, $db_name)
        {
            $this->id_item = $v_id_item;
            $this->categoria = $v_categoria;
            $this->modelo = $v_modelo;
            $this->color = $v_color;
            $this->precio = $v_precio;
            $this->existencias = $v_existencias;
            $this->fecha = $v_fecha;
            $this->numero = $v_numero;

            $var_abd = new TAccess($server, $user, $password, $db_name);
            $this->abd = $var_abd;
            $this->abd->conectar_BD();
        }

        function __destruct()
        {
            if(isset($this->adb))
            {
                unset($this->abd);
            }
        }

        public function restart_id()
        {
            $this->abd->consulta_SQL("SET @autoid := 0");
            $this->abd->consulta_SQL("UPDATE item SET id = @autoid := (@autoid + 1)");
            $this->abd->consulta_SQL("ALTER TABLE item Auto_Increment = 1");
        }

        public function tabla_items()
        {
            $res = false;

            $this->restart_id();

            $consulta = $this->abd->consulta_SQL("SELECT * FROM item ORDER BY categoria");

            if($consulta)
            {
                $fila = $this->abd->consulta_fila();

                if($fila)
                {
                    $res = "<tbody>";

                    while($fila != null)
                    {
                        $id_item = $this->abd->consulta_dato('id');
                        $categoria = $this->abd->consulta_dato('categoria');
                        $modelo = $this->abd->consulta_dato('modelo');
                        $color = $this->abd->consulta_dato('color');
                        $precio = $this->abd->consulta_dato('precio');
                        $existencias = $this->abd->consulta_dato('existencias');
                        $fecha = $this->abd->consulta_dato('fecha');

                        $res = $res . "<tr>
                                            <td class='item'>$id_item</td>
                                            <td class='item'>$categoria</td>
                                            <td class='item'>$modelo</td>
                                            <td class='item'>$color</td>
                                            <td class='item'>$precio &euro;</td>
                                            <td class='item'>$existencias</td>
                                            <td class='item'>$fecha</td>
                                        </tr>";
                        
                        $fila = $this->abd->consulta_fila();
                    }

                    $res = $res . "</tbody>";
                    $this->abd->cerrar_consulta();
                }
                else
                {
                    $res = '<tr><td colspan="7" class="item">No hay artículos que mostrar</td></tr>';
                }
            }

            return $res;
        }

        /*
            Code by LÆRMEDIA © 2020
        */

        public function existe_item()
        {
            $res = false;

            if($this->abd->consulta_SQL("SELECT count(*) as cuantos FROM item WHERE categoria = '" . $this->abd->escapar_dato($this->categoria) . "' AND modelo = '" . $this->abd->escapar_dato($this->modelo) . "' AND color = '" . $this->abd->escapar_dato($this->color) . "'"))
            {
                if($this->abd->consulta_fila())
                {
                    $res = ($this->abd->consulta_dato('cuantos') > 0);
                }
            }

            return $res;
        }
        
        public function crear_item()
        {
            $res = false;
            $existe = $this->existe_item();

            $categoria = $this->categoria;
            $modelo = $this->modelo;
            $color = $this->color;
            $precio = $this->precio;
            $existencias = $this->existencias;
            $fecha = $this->fecha;

            if(!$existe)
            {
                $consulta = $this->abd->consulta_SQL("INSERT INTO item (categoria, modelo, color, precio, existencias, fecha) VALUES ('" . $this->abd->escapar_dato($this->categoria) . "', '" . $this->abd->escapar_dato($this->modelo) . "', '" . $this->abd->escapar_dato($this->color) . "', '" . $this->abd->escapar_dato($this->precio) . "', '" . $this->abd->escapar_dato($this->existencias) . "', '" . $this->abd->escapar_dato($this->fecha) . "')");

                if($consulta)
                {
                    $res = true;
                }
                else
                {
                    $res = false;
                }
            }
            else
            {
                //$res = 'Existe el item';
                $consulta = $this->abd->consulta_SQL("UPDATE item SET existencias = existencias + " . $this->abd->escapar_dato($this->existencias) . " WHERE categoria = '" . $this->abd->escapar_dato($this->categoria) . "' AND modelo = '" . $this->abd->escapar_dato($this->modelo) . "' AND color = '" . $this->abd->escapar_dato($this->color) . "'");
                
                if($consulta)
                {
                    $res = 1;
                }
                else
                {
                    $res = false;
                }
            }

            return $res;
        }

        public function elegir_item()
        {
            $res = false;
            $consulta = $this->abd->consulta_SQL("SELECT * FROM item ORDER BY categoria");

            if($consulta)
            {
                $fila = $this->abd->consulta_fila();

                $res = "<select class='datoUser' name='item'>";
                while ($fila != null)
                {
                    $id_item = $this->abd->consulta_dato('id');
                    $categoria = $this->abd->consulta_dato('categoria');
                    $modelo = $this->abd->consulta_dato('modelo');
                    $color = $this->abd->consulta_dato('color');
                    $precio = $this->abd->consulta_dato('precio');
                    $existencias = $this->abd->consulta_dato('existencias');

                    $res = $res . "<option value='$id_item'>$categoria $modelo $color - $precio &euro; ($existencias unidades en almacén)</option>";

                    $fila = $this->abd->consulta_fila();
                }
                $res = $res . "</select>";
                $this->abd->cerrar_consulta();
            }
            else
            {
                $res = "<select class='datoUser' name='item'></select>";
            }
            return $res;
        }

        public function eliminar_item()
        {
            $res = false;
            $id_item = $this->id_item;
            $numero = $this->numero;

            if($numero === null)
            {
                //$res=$id_item . ', número nulo';
                //$res = 'Eliminación OK';

                $consulta = $this->abd->consulta_SQL("DELETE FROM item WHERE id = " . $this->abd->escapar_dato($this->id_item));

                if($consulta)
                {
                    $res = true;
                }
                else
                {
                    $res = false;
                }
            }
            else
            {
                //$res=$id_item . ', ' . $numero;

                $consulta = $this->abd->consulta_SQL("SELECT * FROM item WHERE id = " . $this->abd->escapar_dato($this->id_item));

                if($consulta)
                {
                    $fila = $this->abd->consulta_fila();

                    if($fila)
                    {
                        $existencias = $this->abd->consulta_dato('existencias');

                        if($existencias > $numero)
                        {
                            //$res='Existencias mayores que número';
                            $this->abd->consulta_SQL("UPDATE item SET existencias = existencias - " . $this->abd->escapar_dato($this->numero) . " WHERE id = " . $this->abd->escapar_dato($this->id_item));
                        }
                        else if($existencias <= $numero)
                        {
                            //$res='Existencias menores o igual que número';
                            $this->abd->consulta_SQL("DELETE FROM item WHERE id = " . $this->abd->escapar_dato($this->id_item));
                        }
                        $res = true;
                    }
                }
                else
                {
                    $res = false;
                }
            }

            return $res;
        }
    }