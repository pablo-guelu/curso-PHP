<?php

    class products extends conn {

        protected function getProducts() {
            $sql = "SELECT * FROM compra";
            $result = $this->connect()->query($sql);
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

        protected function Addproducts () {
            $sql = "INSERT INTO compra (nom, quantitat, preu) VALUES 
            ('leche', 1, 1.20), 
            ('jamon', 2, 1.50), 
            ('arroz', 1, 2.30)";

            $this->connect()->quer($sql) or
            die ($conn->error);
        }


    }

?>