<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tasca 6</title>
    </head>
    <body>
        <?php
        // Nivel 1
        // Exercici 1: Programa la funció "resta" que, donats dos paràmetres ens retorni la resta dels dos números.
        function resta ($n1, $n2) {
            return $n1 - $n2;
        }
        // Exercici 2: Programa una lògica que, donat un número qualsevol(per exemple,la teva edat) ens digui si és parell o imparell mitjançant un missatge per pantalla.
        // Exercici 3: Agafa la lògica de l'exercici 2 i encapsulala en una funció de nom parell_o_imparell. Invoca aquesta funció per a comprovar que funciona correctament.
        function parOimpar ($numero) {
            if ($numero%2 == 0) {
                echo $numero ." es par";
            }
            else {
                echo $numero ." no es par";
            }
        }
        
        echo "<br>resultado funcion resta de 5 -3: <br>";
        echo (resta(5, 3) ."<br>");
        
        echo "<br> resultado funcion par o impar (numero 17): <br>";
        parOimpar(17);
        
        
        echo "<br> <br> bucle hasta el 10: <br>";
        // Exercici 4: Programa un bucle que compti fins a 10, mostrant cada  número per pantalla.
        for ($x = 0; $x <= 10; $x++) {
           echo "<br>$x<br>";
        }
        
        // Nivel 2
        // Exercici 1,2,3: Per jugar a "l'amagatall"  se'ns ha demanat un programa que compti fins a 10...
        function cuenta ($count=10) {
            //$count = 10;
            $intervalo = 2;
            echo "<br>empieza la cuenta hasta $count<br>";
            for ($i=0; $i<=$count; $i+=$intervalo) {
                echo "<br>$i<br>";
            }
        }
        
        cuenta(20);
        
        echo "<br>";
        //Nivel 3
        // Exercici 1: Ens han demanat un llistat de tots els anys on es van produir jocs olímpics
        function olimpics ($startYear=1960, $endYear=2016) {

            echo "<br>Año juegos olimpicos de $startYear a $endYear<br>";
            for ($i=$startYear; $i<=$endYear; $i+=4) {
                echo "<br>$i<br>";
            }
        }
        
        olimpics();
        
        
        // Exercici 2: Imagina que som a una botiga...
        function total ($xocolata, $xiclet, $caramel) {
            echo "<br>Su compra<br>";
            echo "<br>Xocolatas (1€) : $xocolata <br>";
            echo "<br>Xiclets (0.5€): $xiclet <br>";
            echo "<br>Carmels (1.5€): $caramel <br>";
            echo "<br>TOTAL:<br>".($xocolata*1 + $xiclet*0.5 + $caramel*1.5). " euros";
        }
        
        total(2,1,1);
        
        echo "<br>";
        // Exercici 3: La criba d'Eratóstenes
        
        function cribaEratostenes ($limit) {
            //paso 1:  listar los números naturales comprendidos entre 2 hasta el número que se desee
            $primos = range(2, $limit);
            // función interna para detectar multiplos de un número (variable)
            function esMultiplo ($primo, $numero) {
                if ($primo === $numero ) {
                    return false;
                } elseif ($numero % $primo == 0) {
                    return true;
                } else {
                    return false;
                }
            }
            // función interna para pasar al siguiente primo
            function nextPrimo ($newList, $currentPrimo) {
                foreach($newList as $nextPrimo) {
                    if ($nextPrimo % $currentPrimo != 0 && $nextPrimo / $currentPrimo > 1 ) {
                        return $nextPrimo;
                    }
                }       
            }
            // paso 2: Se toma el primer número no rayado ni marcado, como número primo.
            $currentPrimo = 2;
            //paso 3: Se tachan (eliminan) todos los múltiplos del número que se acaba de indicar como primo.
            // Se hace la primera iteración con el 2 pues simpre será el primer primo.
            do {
                foreach($primos as $number) {
                    if (esMultiplo($currentPrimo, $number)) {
                        unset($primos[array_search($number, $primos)]);
                    }
                }
                // paso 4: Si el cuadrado del primer número que no ha sido rayado ni marcado es inferior a $limit, entonces se repite el segundo paso.
                // Si no, el algoritmo termina, y todos los enteros no tachados son declarados primos.
                $currentPrimo = nextPrimo($primos, $currentPrimo);
                echo $currentPrimo."<br>";
            } while ($currentPrimo ** 2 <= $limit);
            // Imprime el resultado
            echo "<br> Los números primos comprendidos entre 2 y $limit son: <br>";
            print_r($primos);
        }
        
        cribaEratostenes(50);
        
        ?>
    </body>
</html>
