<?php

    class conn {
        // Properties
        private $host;
        private $user;
        private $pwd;
        private $table;

        // methods
        protected function connect () {

            $this->host = 'localhost';
            $this->user = 'pabloguelu';
            $this->pwd = 'zinedine05';
            $this->table = 'products';

            $conn = new mysqli($this->host, $this->user, $this->pwd, $this->table);
            if ($conn->connect_error)
                die('connection problem detected');
            else {
                return $conn;
            }
        }

        // function disconnect () {
        //     $conn->close();}
        
    }


    // $conn = new mysqli('localhost', 'pabloguelu', 'zinedine05', 'products');
    // if ($conn->connect_error)
    //     die('connection problem detected');

    // $conn->query("SELECT EXISTS (SELECT 1 FROM compra)") or
    // die ($conn->error);
    
    // $conn->query("DELETE FROM compra") or
    // die ($conn->error);

    // $conn->query("INSERT INTO compra (nom, quantitat, preu) VALUES 
    // ('leche', 1, 1.20), 
    // ('jamon', 2, 1.50), 
    // ('arroz', 1, 2.30)") or
    // die ($conn->error);    

    // echo 'data base intialized'
?>

