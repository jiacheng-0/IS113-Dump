<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 17/4/2019
 * Time: 12:28 PM
 */

function spank($weirdos)
{
    $weirdos['Eugene'] = 'More like Desmond Tan';
    return $weirdos;
}

$weirdos = [
    'Victor' => 'Handsome'
];


var_dump($weirdos);

$weirdos = spank($weirdos);

var_dump($weirdos);