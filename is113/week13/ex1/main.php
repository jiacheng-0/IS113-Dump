<?php

require_once 'include/common.php';

$email = $_SESSION['email'];



?>
<html>
<body>

    <h1>Hello, <?= $email ?> and welcome back!</h1>    

    <?php
        //
    ?>

    <h1>
        <a href='logout.php'>Log Out</a>
    </h1>

</body>
</html>