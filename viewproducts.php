<?php

    class ViewProduct extends products {

        public function ViewAllProducts() {
           $products = $this->getProducts();

            if ($products) {
                foreach ($products as $product) {
                    echo $product['id'];
                    echo $product['nom'];
                    echo $product['quantitat'];
                    echo $product['preu']."<br>";
                }
            } else {
                $this->Addproducts();
                foreach ($products as $product) {
                    echo $product['id'];
                    echo $product['nom'];
                    echo $product['quantitat'];
                    echo $product['preu']."<br>";
                }
            }
        }
    }

?>