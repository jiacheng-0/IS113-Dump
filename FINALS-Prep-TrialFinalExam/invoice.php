<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 20/4/2019
 * Time: 3:21 PM
 */

class Invoice
{

    const SERVICE_CHARGE = 0.1;
    // const is the keyword for constant variables in php
    // constant variables are normally CAPITALISED
    // in many programming languages

    public function computeServiceCharge($price)
    {

        return self::SERVICE_CHARGE * price;
    }
}

//echo Invoice::SERVICE_CHARGE . "<br/>"; // 0.1
//Invoice::SERVICE_CHARGE = 0.2;

//define("kjMealsADay", 3.3);
//
//echo kjMealsADay . "<br/>";

function number_square($min, $max)
{

    $str = "";
    for ($i = $min; $i <= $max; $i++) {
        $str .= $i;
    }

    for ($i = 0; $i < strlen($str); $i++) {
        echo substr($str, $i) . substr($str, 0, $i) . "<br/>";
    }
}

//number_square(1, 6);