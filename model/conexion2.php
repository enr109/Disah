<?php
    class conexion
    {
        const user='aswfcpbu_enrique';
        const pass='_RqOS?Y8@1Og';
        const db='aswfcpbu_bdproyectopro';
        const servidor='proyectosti.digital-server.net';
    
        public function conectarbd()
        {
            $conectar = new mysqli(self::servidor,self::user,self::pass,self::db);
                if ($conectar->connect_errno)
                {
                    die("Error en la conexion".$conectar->connect_error);
                }
                return $conectar;
        }
    }
?>