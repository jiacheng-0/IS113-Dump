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

$url = "mysql:host=localhost;port=3306;dbname=project";
$pdo = new PDO($url, "root", "");

$sql = "select * from department";
$stmt = $pdo->prepare($sql);    // returns a PDO statement object
$stmt->setFetchMode(PDO::FETCH_ASSOC);  // data fetched will be an associative array

$status = $stmt->execute();

// if un-successful, $row will contain the value false
// if successful, an associative array that looks like this
// will be returned
$array_keys = [];
if ($status) {
    $rows = $stmt->fetch();
    echo "<table border='1' style='border-collapse: collapse'>
    <tr style='background-color: skyblue'>
    ";
    foreach (array_keys($rows) as $one_key) {
        echo "    <th>$one_key</th>";
    }
    echo "
    </tr>
";

    $array_keys = array_keys($rows);
} else {
    echo "No data retrieved";
}

$stmt->execute();

while ($row = $stmt->fetch()) {
    echo "    <tr>
    ";
    foreach ($array_keys as $one_key) {
        echo "    <td>" . $row[$one_key] . "</td>";
    }
    echo "
    <tr/>
";
//    $row = $stmt->fetch();
}

echo "</table>";

$stmt->closeCursor();
$pdo = null;