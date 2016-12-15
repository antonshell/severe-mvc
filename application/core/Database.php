<?php

/**
 * Class Database
 */
class Database{

    public $db;

    private static $instance;

    /**
     * gets the instance via lazy initialization (created on first usage).
     *
     * @return self
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();

            try {
                $connection = ConfigManager::get(array('db','dsn'));
                $username = ConfigManager::get(array('db','username'));
                $password = ConfigManager::get(array('db','password'));
                static::$instance->db = new PDO($connection, $username, $password);

                static::$instance->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if (!static::$instance->db) {
                    echo 'Can\'t connect to database';
                }
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        return static::$instance;
    }

    private function __construct(){}

    final public function __clone()
    {
        throw new Exception('This is a Singleton. Clone is forbidden');
    }

    final public function __wakeup()
    {
        throw new Exception('This is a Singleton. __wakeup usage is forbidden');
    }

    public function execSql($sql,$params){
        $stmt = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute($params);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }
}