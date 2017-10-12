<?php
class connection {
    static $_instance;

    private function __construct() {
        $this->conectar();
    }

    private function __clone() {
        
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public static function conectar() {
        $link = mysqli_connect('127.0.0.1', 'pgarcia', '');
        if (!$link) {
            die('Could not connect: ' . mysqli_error());
        }
        //echo 'Connected successfully';
        //mysql_select_db("sdtpersonal");
        mysqli_select_db($link, 'proventa');
        mysqli_query($link, "SET NAMES 'utf8'");
        /* @mysql_query("SET NAMES 'utf8'"); */
        return $link;
    }
}


