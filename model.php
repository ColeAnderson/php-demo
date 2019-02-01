<?php
    final class Database{
        // create database
       
        
        public static function getInstance(){
            static $instance = null;
            if($instance == null){
                $instance = new Database();
            }
            return $instance;
        }



        private function __construct(){  
            $this->servername = "localhost:3306";
            $this->username = "root";
            $this->password = "";
            $this->dbname = "myDB";
            $this->conn = null;
        }

        function createNewConn(){
                try{
                    $this->conn = new mysqli($this->servername, $this->username, $this->password);
                    echo "<h1>connected successfully</h1>";
                }catch(exception $x){
                    echo "<h1>connection failed</h1>";
                    //$b = FALSE;
                }   
            
        }

        function createDatabase(){
            // create db 
            try{
                $sql = "CREATE DATABASE IF NOT EXISTS myDB";
                if($this->conn->query($sql) == TRUE){
                    echo "db created successfully\n<br>";
                }else{
                    echo "Error creating database: " . $this->conn->error;
                }
            }catch(exception $x){
                echo "exception in createDatabase : ".$x;
            }
            $this->conn->close();
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        }

        function getConn(){
            return $this->conn;
        }

        function createTables(){
            try{

                $sql = "CREATE TABLE IF NOT EXISTS USERS (
                    u_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    email VARCHAR(50)
                    )";
                
                if($this->conn->query($sql) == TRUE){
                    echo "users created successfully\n<br>";
                }else{
                    echo "Error creating database: " . $this->conn->error;
                }
                
                $sql1 = "CREATE TABLE IF NOT EXISTS PRODUCT (
                    p_id INT(6) UNSIGNED AUTO_INCREMENT,
                    u_fk INT(6) UNSIGNED,
                    notification INT(2),
                    PRIMARY KEY (p_id),
                    FOREIGN KEY (u_fk) REFERENCES USERS(u_id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE 
                )"; 
                if($this->conn->query($sql1) == TRUE){
                    echo "product created successfully\n<br>";
                }else{
                    echo "Error creating database: " . $this->conn->error;
                }  
                               //
                $sql2 = "CREATE TABLE IF NOT EXISTS MESSAGE (
                    m_id INT(6)  UNSIGNED AUTO_INCREMENT NOT NULL,
                    p_fk INT(6) UNSIGNED,
                    message VARCHAR(50),
                    PRIMARY KEY (m_id),
                    FOREIGN KEY (p_fk) REFERENCES PRODUCT(p_id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE
                    )"; 
                if($this->conn->query($sql2) == TRUE){
                    echo "messages created successfully\n<br>";
                }else{
                     echo "Error creating database: " . $this->conn->error;
                }
                echo "line 77 ";         
            }catch(exception $x){
                echo "exception in createTable : ".$x;
            }
        }

        function __destruct(){
            if($this->conn !=null){
                try {
                    $this->conn->close();
                  }
                  catch(Exception $e) {
                    echo 'Message: ' .$e->getMessage();
                  }
                
            }   
        }
    }
?>