<?php

session_start();

if (isset($_SESSION['token'])) {
    echo $_SESSION['sum'] . "<br/>";
    echo $_SESSION['token'];
} else {
    echo 'pear';
}

?>
