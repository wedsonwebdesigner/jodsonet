<?php
class Ponte {

    private static $Host = '104.236.95.250';
    private static $User = 'root';
    private static $Pass = '101514we';
    private static $Dbsa = 'boleto';

    private static $Connect = null;

    private static function Conectar() {
        try {
            if (self::$Connect == null):
                $dsn = 'mysql:host=' . self::$Host . ';dbname=' . self::$Dbsa;
                $options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
                self::$Connect = new PDO($dsn, self::$User, self::$Pass, $options);
            endif;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die;
        }

        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }

    protected static function getConn() {
        return self::Conectar();
    }

}

