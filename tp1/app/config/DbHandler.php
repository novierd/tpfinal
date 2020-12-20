<?php

class DbHandler {

  private static $_db = null;
  private static $_host = "localhost";
  private static $_port = 3308;
  private static $_dbName = "tp1_php";
  private static $_user = "root";
  private static $_pwd = "";

  private function __construct() {}
  
  private static function getCnxToDb() {
    $cnx;

    try {
      $cnx = new PDO(
        'mysql:host='.self::$_host.':'.self::$_port.';dbname='.self::$_dbName.';charset=utf8',
        self::$_user,
        self::$_pwd
      );
    }
    catch (Exception $e) {
      die('Impossible de se connecter à la bdd: ' . $e->getMessage());
    }
    
    return $cnx;
  }

  public static function getDb() {
    if (null == self::$_db) {
      self::$_db = self::getCnxToDb();
    }
    return self::$_db;
  }
}
