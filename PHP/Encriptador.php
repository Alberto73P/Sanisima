<?php 
    require($_SERVER["DOCUMENT_ROOT"] . "/PHP/conf.php");

    class Encriptador{
        public static function encriptar(string $dato){
            return openssl_encrypt($dato, ALGORITMO, LLAVE);
        }

        public static function desencriptar(string $dato){
            return openssl_decrypt($dato, ALGORITMO, LLAVE);
        }

        public static function encriptarClave(string $clave){
            return password_hash($clave, PASSWORD_DEFAULT);
        }

        public static function verificarClave(string $claveIngresada ,string $claveCifrada){
            return password_verify($claveIngresada, $claveCifrada);
        }
    }
?>