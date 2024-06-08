<?php
namespace Models\Base;
use Configs\Database;
use PDO;
use PDOException;
final class Connection
{
    private static $pdo;

    private static $instance = NULL;

    private function __construct()
    {
        $dsn  = 'mysql:host=' . Database::DB_HOST . ';dbname=' . Database::DB_NAME;
        $user = Database::DB_USER;
        $pass = Database::DB_PASS;

        try 
        {
            self::$pdo = new PDO($dsn, $user, $pass);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $e) 
        {
            die("erreur de pdo {$e->getMessage()}");
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) self::$instance = new self();

        return self::$instance;
    }

    public static function getPdo()
    {
        return self::$pdo;
    }
}