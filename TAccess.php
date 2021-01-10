<?php
    class TAccess
    {
        private $bd;
        private $host;
        private $user;
        private $pass;
        
        private $conexion;
        private $datos;
        private $fila;
        
        function __construct($host , $user , $pass, $bd)
        {
            $this->bd = $bd;
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
        }
        
        public function conectar_BD()
        {
            $res = true;
            $this->conexion = @mysqli_connect ($this->host, $this->user, $this->pass, $this->bd);
            mysqli_set_charset($this->conexion,"utf8");
            if (!$this->conexion)
            {
                $res = false;
                die("<p><b>|ES|</b> Falló la conexión a las bases de datos.
                <b>|EN|</b> Connection to databases failed.
                <b>|NO|</b> Tilkoblingen til databaser mislyktes.
                <b>|FI|</b> Yhteys tietokantoihin epäonnistui.
                <b>|NL|</b> Verbinding met databases is mislukt.
                <b>|RU|</b> Не удалось подключиться к базам данных.</p>. ERROR:" .mysqli_conect_error());
            }
            return $res;
        }
        
        public function desconectarBd()
        {
            if (isset($this->conexion))
            {
                mysqli_close($this->conexion);
            }
        }
        
        public function escapar_dato ($dato)
        {
            return mysqli_real_escape_string($this->conexion,$dato);
        }
        
        public function consulta_SQL ($consulta)
        {
            $this->datos = mysqli_query ($this->conexion, $consulta);
            if (mysqli_errno($this->conexion) != 0)
            {
                $res = false;
            }
            else
            {
                $res = true;
            }
            return $res;
        }
        
        public function consulta_fila ()
        {
            $this->fila = null;
            if ($this->datos != null)
            {
                $this->fila = mysqli_fetch_assoc($this->datos);
            }
            return $this->fila;
        }
        
        public function consulta_dato ($campo)
        {
            $res = null;
            if ($this->fila != null)
            {
                $res = $this->fila[$campo];
            }
            return $res;
        }
        
        public function filas_afectadas ()
        {
            $res = 0;
            if ($this->conexion != null)
            {
                $res = mysqli_affected_rows($this->conexion);
            }
            return ($res);
        }
        
        public function cerrar_consulta ()
        {
            mysqli_free_result($this->datos);
        }
        
        public function mensaje_error ()
        {
            $res = "";
            if (mysqli_errno($this->conexion) != 0)
            {
                $res = mysqli_error($this->conexion);
            }
            return $res;
        }
    }