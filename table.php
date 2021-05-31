<?php

    class table extends conn {

        public function getProducts() {
            $sql = "SELECT * FROM compra";
            // creating a connection to the database
            $connection = $this->create();
            // getting all the rows from the table
            $result = $connection->query($sql);
            // disconnection from the database
            $this->close($connection);

            $numRows = $result->num_rows;
            if ($numRows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                return false;
            }
        }

        // function to add some default products in case there are none
        public function addProducts () {
            $sql = "INSERT INTO compra (nom, quantitat, preu) VALUES 
            ('leche', 1, 1.20), 
            ('jamon', 2, 1.50), 
            ('arroz', 1, 2.30)";

            $this->create()->query($sql) or
            die ($conn->error);
        }
    }

?>