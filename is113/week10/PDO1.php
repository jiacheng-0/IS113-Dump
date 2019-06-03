<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 12/3/2019
 * Time: 2:45 AM
 */

// Topic:
// 1. Using PDO to connect to database

/*
 * hostname : localhost/127.0.0.1
 * port     : 3306
 * database : is112_temp
 */

$url = "mysql:host=localhost;port=3306;dbname=is112_temp";
$pdo = new PDO($url, "root", "");

$sql = "select * from student";
$stmt = $pdo->prepare($sql);    // returns a PDO statement object
$stmt->setFetchMode(PDO::FETCH_ASSOC);  // data fetched will be an associative array

$status = $stmt->execute();

if ($status) {
    echo "Successful.";
} else {
    echo "TOH BRO";
}

echo "<br/>";
// if un-successful, $row will contain the value false
// if successful, an associative array that looks like this
// will be returned
while ($row = $stmt->fetch()) {
    echo $row['sname'] . "<br/>";
//    $row = $stmt->fetch();
}


$stmt->closeCursor();
$pdo = null;