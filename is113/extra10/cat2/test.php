<?php

require_once '../cat/CatDAO.php';
$dao = new CatDAO();

// Test Cases

//echo "<pre>";

echo "<h1>Adoption</h1>";
// Test 'A'
$cats = $dao->getCatsByStatus('A'); // all cats with status 'A'
var_dump($cats);

echo "<h1>Pending Adoption</h1>";
// Test 'P'
$cats = $dao->getCatsByStatus('P'); // all cats with status 'P'
var_dump($cats);

?>