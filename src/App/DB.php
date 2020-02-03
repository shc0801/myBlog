<?php
namespace App;

class DB{
    private static $db = null;

    private static function getDB()
    {
        if(is_null(self::$db)) {
            self::$db = new \PDO("mysql:host=localhost; dbname=myblog; charset=utf8mb4", "root", "");
        }
        return self::$db;
    }

    public static function execute(string $sql, array $datas = []) : int
    {
        $q = self::getDB()->prepare($sql);
        return $q->execute($datas);
    }

    public static function fetch($sql, $datas = [], $mode = \PDO::FETCH_OBJ){
        $q = self::getDB()->prepare($sql);
        $q->execute($datas);
        return $q->fetch($mode);
    }
    
    public static function fetchAll($sql, $datas = [], $mode = \PDO::FETCH_OBJ){
        $q = self::getDB()->prepare($sql);
        $q->execute($datas);
        return $q->fetchAll($mode);
    }

    public static function lastId(){
        return self::getDB()->lastInsertId();
    }
}