<?php
class Database {
    private static $instance = NULL;

    private function __construct(){}

    private function __clone(){}

    public static function get_instance(){
        if (!isset(self::$instance)){
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=catalog_site', 'root', 'admin', $pdo_options);
        }
        return self::$instance;
    }
}
