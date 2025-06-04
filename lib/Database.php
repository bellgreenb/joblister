<?php

//database library/class

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    //database handler
    private $dbh;
    private $error;
    private $stmt;

    //constructor
    public function __construct() {
        //set DSN - a connection string where you include the host, database name, & so on.

        //pertains to PDO: PHP Data Objects: which serves as an alternative way to connect to your database. 
        $dsn = 'mysql:host='.$this->host.';dbname='. $this->dbname;

        //set options
        $options = array(
            PDO::ATTR_PERSISTENT => true, //for a persistent connection.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //PDO Instance
        try { //dbh: database handler
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    //query method
    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    //bind values
    public function bind($param, $value, $type=null){
        if(is_null($type)){
            switch(true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool ($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    //execute
    public function execute(){
        return $this->stmt->execute();
    }

    //when we fetch the data from the database, you return it as a result set.
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);//describes how you want to fetch the object
    }

    //a function to only fetch a single value, not the entire result set. 
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);//describes how you want to fetch the object
    }
}
