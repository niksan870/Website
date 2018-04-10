<?php

class Model {

    //Asigning PDO link
    protected $dbh;
    //Stmt is for the action i think
    protected $stmt;

    //assigning pdo link to bdh
    public function __construct() {
        $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    }

    //prepare sql query
    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    //I dont know why thisis so importnat but it assignins a PDO::PARAM for the folloing value
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    //Execute Method
    public function execute() {
        $this->stmt->execute();
    }

    //Stores the result in resultSet()
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //shows the last inserted id of the post!
    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }

    //Fetches the user tat logged in!
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}
