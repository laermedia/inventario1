<?php
    include_once ('TAccess.php');

    class TUser
    {
        private $id_user;
        private $cargo;
        private $departamento;
        private $nombre;
        private $apellidos;
        private $correo;
        private $nacimiento;
        private $contrasenya;
        private $abd;

        function __construct($v_id_user, $v_cargo, $v_departamento, $v_nombre, $v_apellidos, $v_correo, $v_nacimiento, $v_contrasenya, $server, $user, $password, $db_name)
        {
            $this->id_user = $v_id_user;
            $this->cargo = $v_cargo;
            $this->departamento = $v_departamento;
            $this->nombre = $v_nombre;
            $this->apellidos = $v_apellidos;
            $this->correo = $v_correo;
            $this->nacimiento = $v_nacimiento;
            $this->contrasenya = $v_contrasenya;

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

        public function existe_user()
        {
            $res = false;

            if($this->abd->consulta_SQL("SELECT count(*) as cuantos FROM usuario WHERE correo = '" . $this->abd->escapar_dato($this->correo) . "'"))
            {
                if($this->abd->consulta_fila())
                {
                    $res = ($this->abd->consulta_dato('cuantos') > 0);
                }
            }

            return $res;
        }
        /*
            Code by LÆRMEDIA © 2020
        */

        public function crear_user()
        {
            $res = false;
            $existe = $this->existe_user();

            if(!$existe)
            {
                $nombre = $this->nombre;
                $correo = $this->correo;
                $contrasenya = $this->contrasenya;

                $consulta = $this->abd->consulta_SQL("INSERT INTO usuario(nombre, correo, contrasenya) VALUES('" . $this->abd->escapar_dato($this->nombre) . "', '" . $this->abd->escapar_dato($this->correo) . "', '" . $this->abd->escapar_dato($this->contrasenya) . "')");

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
                $res = 0;
            }

            //$res = "Todo OK hasta aquí";

            return $res;
        }

        public function ingresar()
        {
            $res = false;

            $correo = $this->correo;
            $contrasenya = $this->contrasenya;

            //$res = 'Conección a TUser OK';

            $consulta = $this->abd->consulta_SQL("SELECT id FROM usuario WHERE correo = '" . $this->abd->escapar_dato($this->correo) . "' AND contrasenya = '" . $this->abd->escapar_dato($this->contrasenya) . "'");
            
            if($consulta)
            {
                $fila = $this->abd->consulta_fila();

                $id = $this->abd->consulta_dato('id');

                //$res = 'Login OK';

                if(!empty($id))
                {
                    $_SESSION['user_id'] = $id;
                    $res = $id;
                }
                else
                {
                    $res = false;
                }
            }

            return $res;
        }

        public function identifica_user()
        {
            $admin = false;

            //$admin = 'Usuario identificado';

            $id_user = $this->id_user;

            if($this->abd->consulta_SQL("SELECT * FROM usuario WHERE id = '" . $this->abd->escapar_dato($this->id_user) . "'"))
            {
                $fila = $this->abd->consulta_fila();

                $id = $this->abd->consulta_dato('id');
                $cargo = $this->abd->consulta_dato('cargo');
                $departamento = $this->abd->consulta_dato('departamento');
                $nombre = $this->abd->consulta_dato('nombre');
                $apellidos = $this->abd->consulta_dato('apellidos');
                $correo = $this->abd->consulta_dato('correo');
                $nacimiento = $this->abd->consulta_dato('nacimiento');
                $contrasenya = $this->abd->consulta_dato('contrasenya');
                
                if(!empty($id) && !empty($nombre) && !empty($correo) && !empty($contrasenya))
                {
                    $admin = array(
                        'id' => $id,
                        'cargo' => $cargo,
                        'departamento' => $departamento,
                        'nombre' => $nombre,
                        'apellidos' => $apellidos,
                        'correo' => $correo,
                        'nacimiento' => $nacimiento,
                        'contrasenya' => $contrasenya);
                }
                else
                {
                    $admin = false;
                }
            }

            return $admin;
        }

        public function actualiza_datos()
        {
            $res = false;

            $id = $this->id_user;
            $cargo = $this->cargo;
            $departamento = $this->departamento;
            $nombre = $this->nombre;
            $apellidos = $this->apellidos;
            $correo = $this->correo;
            $nacimiento = $this->nacimiento;
            $contrasenya = $this->contrasenya;

            //$res = 'actualización TUser.php OK hasta aquí';
            

            if(!empty($cargo))
            {
                $consulta = $this->abd->consulta_SQL("UPDATE usuario SET cargo = '" . $this->abd->escapar_dato($this->cargo) . "' WHERE id = '" . $this->abd->escapar_dato($this->id_user) . "'");
            }
            if(!empty($departamento))
            {
                $consulta = $this->abd->consulta_SQL("UPDATE usuario SET departamento = '" . $this->abd->escapar_dato($this->departamento) . "' WHERE id = '" . $this->abd->escapar_dato($this->id_user) . "'");
            }
            if(!empty($nombre))
            {
                $consulta = $this->abd->consulta_SQL("UPDATE usuario SET nombre = '" . $this->abd->escapar_dato($this->nombre) . "' WHERE id = '" . $this->abd->escapar_dato($this->id_user) . "'");
            }
            if(!empty($apellidos))
            {
                $consulta = $this->abd->consulta_SQL("UPDATE usuario SET apellidos = '" . $this->abd->escapar_dato($this->apellidos) . "' WHERE id = '" . $this->abd->escapar_dato($this->id_user) . "'");
            }
            if(!empty($correo))
            {
                $consulta = $this->abd->consulta_SQL("UPDATE usuario SET correo = '" . $this->abd->escapar_dato($this->correo) . "' WHERE id = '" . $this->abd->escapar_dato($this->id_user) . "'");
            }
            if(!empty($nacimiento))
            {
                $consulta = $this->abd->consulta_SQL("UPDATE usuario SET nacimiento = '" . $this->abd->escapar_dato($this->nacimiento) . "' WHERE id = '" . $this->abd->escapar_dato($this->id_user) . "'");
            }
            if(!empty($contrasenya))
            {
                $consulta = $this->abd->consulta_SQL("UPDATE usuario SET contrasenya = '" . $this->abd->escapar_dato(sha1($this->contrasenya)) . "' WHERE id = '" . $this->abd->escapar_dato($this->id_user) . "'");
            }
            
            if($consulta)
            {
                $res = true;
            }

            return $res;
        }
    }