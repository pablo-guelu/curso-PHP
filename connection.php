<?php

    class conn {
        // Properties
        private $host;
        private $user;
        private $pwd;
        private $table;

        function __construct() {
            $this->host = 'localhost';
            $this->user = 'pabloguelu';
            $this->pwd = 'zinedine05';
            $this->table = 'products';
        }

        // methods
        public function create () {
            $conn = new mysqli($this->host, $this->user, $this->pwd, $this->table);
            if ($conn->connect_error)
                die('connection problem detected');
            else {
                return $conn;
            }
        }

        public function close($connection) {
            $connection->close();
        }
    }

?>

