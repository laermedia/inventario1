<?php
    header("Content-Type: text/html;charset=utf-8");

    include_once ("TItem.php");
    include_once ("TUser.php");

    class tControl
    {
        private $server;
        private $user;
        private $password;
        private $db_name;

        function __construct()
        {
            $this->server = "localhost";
            $this->user = "root";
            $this->password = "root";
            $this->db_name = "inventario";
        }

        public function listados()
        {
            $p = new TItem("", "", "", "", "", "", "", "", $this->server, $this->user, $this->password, $this->db_name);
            $res = $p->tabla_items();
            return $res;
        }

        public function user_creado($nombre, $correo, $contrasenya)
        {
            $p = new TUser("", "", "", $nombre, "", $correo, "", $contrasenya, $this->server, $this->user, $this->password, $this->db_name);
            $res = $p->crear_user();
            //$res = "Todo OK hasta aquí";
            return $res;
        }

        public function entrar_user($correo, $contrasenya)
        {
            $p = new TUser("", "", "", "", "", $correo, "", $contrasenya, $this->server, $this->user, $this->password, $this->db_name);
            $res = $p->ingresar();
            //$res = "Todo OK hasta aquí";
            return $res;
        }

        /*
        while(!$victory)
        {
            fight();
        }
        */

        public function datos_user($id_user)
        {
            $p = new TUser($id_user, "", "", "", "", "", "", "", $this->server, $this->user, $this->password, $this->db_name);
            $admin = $p->identifica_user();
            //$admin = $id_user;
            return $admin;
        }

        public function item_creado($categoria, $modelo, $color, $precio, $existencias, $fecha)
        {
            $p = new TItem("", $categoria, $modelo, $color, $precio, $existencias, $fecha, "", $this->server, $this->user, $this->password, $this->db_name);
            $res = $p->crear_item();
            return $res;
        }

        public function listar_items()
        {
            $p = new TItem("", "", "", "", "", "", "", "", $this->server, $this->user, $this->password, $this->db_name);
            $res = $p->elegir_item();
            return $res;
        }

        /*
            Code by LÆRMEDIA © 2020
        */

        public function item_eliminado($id_item, $numero)
        {
            $p = new TItem($id_item, "", "", "", "", "", "", $numero, $this->server, $this->user, $this->password, $this->db_name);
            $res = $p->eliminar_item();
            //$res = 'Eliminación en tControl OK';
            return $res;
        }

        public function actualiza_perfil($id_user, $cargo, $departamento, $nombre, $apellidos, $correo, $nacimiento, $contrasenya)
        {
            $p = new TUser($id_user, $cargo, $departamento, $nombre, $apellidos, $correo, $nacimiento, $contrasenya, $this->server, $this->user, $this->password, $this->db_name);
            $res = $p->actualiza_datos();            
            //$res = 'actualización TControl.php OK hasta aquí';
            return $res;
        }
    }