<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 25/2/2019
 * Time: 5:16 PM
 */


function checkPrime($n) : bool
{
    if ($n <= 1) {
        return false;
    }

    $divisor = 2;
    while ($divisor < $n){
        if ($n % $divisor == 0){
            return false;
        }
        $divisor++;
    }
//    echo "$n<br/>";
    return true;
}

function getFibo($num_arr, $max)
{
    $num1 = 0;
    $num2 = 1;
}

/* get fib and primes under n */
function fibPrimes($n)
{
    $num_arr = [];

    for ($i = 2; $i < $n; $i++){
        if (checkPrime($i)){
            $num_arr[] = $i;
        }
    }

    return join(", ", $num_arr);
}

echo "<pre>";
echo ">" . fibPrimes(50) . "<";
echo "</pre>";