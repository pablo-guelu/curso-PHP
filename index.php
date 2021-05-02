<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tasca 5</title>
    </head>
    <body>
        <?php
        // Nivel 1
            echo "<br>";
            echo "<h3>Nivel 1<h3>";
        // declaring variables 
            $someInteger = 5;
            $someFloat = 5.5;
            $someString = "This is a String";
            $someBoolean = true;
        // printing variables
            echo $someInteger;
            echo "<br>";
            echo $someFloat;
            echo "<br>";
            echo $someString;
            echo "<br>";
            echo $someBoolean;

            echo "<br>";
            echo "<br>";
        
            $anotherString = "This is another string";
        // Imprimeix per pantalla el tamany(longitud) del dos strings.
            echo strlen($anotherString);
            echo "<br>";
            echo "<br>";
        // Imprimeix per pantalla el dos strings però en ordre invers de caràcters.
            echo strrev($someString);
            echo "<br>";
            echo "<br>";
            echo strrev($anotherString);
            echo "<br>";
            echo "<br>";
        // Imprimeix la concatenació dels dos strings. 
            echo $someString . $anotherString;
        // Crea una constant que inclogui el teu nom i imprimeix-la per pantalla
            define("name", "José Pablo Guerrero Lugo");
            echo "<br>";
            echo "<br>";
            echo name;
            echo "<br>";
            echo "<br>";
            
        // Nivel 2
            echo "<br>";
            echo "<h3>Nivel 2<h3>";
        // Crea dos arrays, un que inclogui 5 integers, i un altre que inclogui 3 integers
            $array1 = array(1,2,3,4,5);
            $array2 = array(1,2,3);
        // Afegeix un valor més a l'array que conté 3 integers.
            array_push($array2, 4);
        // Mescla els dos arrays i imprimeix el tamany de l'array resultant per pantalla
            $array3 = array_merge($array1, $array2);
            echo count($array3);
            echo "<br>";
            echo "<br>";
                    
            
            
        // Nivel 3
            echo "<br>";
            echo "<h3>Nivel 3<h3>";
        // Imprimeix per pantalla(valor a valor) l'array resultant del nivell anterior.
            foreach ($array3 as $number) {
                echo $number;
                echo "<br>";
            }
        //Escriure un programa PHP...
            $x = 1;
            $y = 2;
            $n = 3.0;
            $m = 4.0;
            
            function myFunction2Variables($X, $Y) {
                echo "<br>";
                echo "<br>";
                echo "valor 1: ".$X;
                echo "<br>";
                echo "valor 2: ".$Y;
                echo "<br>";
                echo "suma ".$X+$Y;
                echo "<br>";
                echo "resta ".$X-$Y;
                echo "<br>";
                echo "producto ".$Y*$X;
                echo "<br>";
                echo "division ".$X/$Y;
                echo "<br>";
                echo "modulo ".$X%$Y;
                echo "<br>";
            }
            
            function theDouble($X) {
                echo "<br>";
                echo "the double of ".$X." is ".$X*2;
                echo "<br>";
            }

            echo "<br>";
            echo "applying my function for x and y:";
            myFunction2Variables($x, $y);
            
            echo "<br>";
            echo "applying my function for n and m:";
            myFunction2Variables($n, $m);
            
            echo "<br>";
            echo "The double of each variable:";
            echo "<br>";
            theDouble($x);
            theDouble($y);
            theDouble($n);
            theDouble($m);
            
            echo "<br>";
            echo "the sum of all variables is ".$x+$y+$n+$m;
            echo "<br>";
            echo "<br>";
            echo "the sum of all variables is ".$x*$y*$n*$m;
            
        ?>
    </body>
</html>
