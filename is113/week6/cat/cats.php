<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 12/2/2019
 * Time: 1:46 PM
 */
// Array of cats
// Each cat is an Associative Array
// As seen below, all cats have the same "attributes" such as:
//  name
//  gender
//  age

include "Cat.php";
//$cats = [
//    [
//        "name"     => "Stinky",
//        "gender"   => 'M',
//        "age"      => 3
//    ],
//    [
//        "name"     => "Smelly",
//        "gender"   => 'F',
//        "age"      => 7
//    ],
//    [
//        "name"     => "Uncle",
//        "gender"   => 'M',
//        "age"      => 5
//    ],
//    [
//        "name"     => "Fatty",
//        "gender"   => 'F',
//        "age"      => 1
//    ]
//];

$cat1 = new Cat("James LOOI", 'GAY TRANNY', 69);
$cat2 = new Cat("Jormas", 'Faggyboii');
$cat3 = new Cat("Kyong", 'Female Communist');

$cats = [
    $cat1,
    $cat2,
    $cat3,
    new Cat("I am number Four", 'M', 44)
];