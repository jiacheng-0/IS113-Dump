<?php

session_start();

session_unset();
echo "Session start";
//unset($_SESSION);

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = 'apple';
    header('Location: second.php');
}

$_SESSION['sum'] = 0;
for ($i = 0; $i <= 123456; $i++) {
    $_SESSION['sum'] = $i;
}
//$_SESSION['sum'] = $sum;
$_SESSION['token'] = 'orange';

?>
