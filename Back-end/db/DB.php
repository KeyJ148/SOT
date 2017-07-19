<?php

class DB {

    private static $_HOST = "localhost";
    private static $_NAME = "wikisot";
    private static $_USER = "root";
    private static $_PASS = "123456";

    private static $instance;

    public static function connect(){
        if (!isset(self::$instance) || !self::$instance) {
            self::$instance = new mysqli(self::$_HOST, self::$_USER, self::$_PASS, self::$_NAME);
        }

        if (!self::$instance){
            throw new DBException("Error in connecting to MySQL.");
        }

        return self::$instance;
    }

    public static function query($query){
        self::connect();
        $result = mysqli_query(self::$instance, $query);

        if (!$result){
            throw new DBException("Error in query: $query");
        }

        if (is_bool($result)) return $result;
        else return mysqli_fetch_assoc($result);
    }

    public static function get_last_id(){
        return mysqli_insert_id(self::$instance);
    }
}