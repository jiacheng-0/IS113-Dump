<?php

// Your Code Goes Here

if (isset($_POST['fullname']) && !empty($_POST['fullname'])) {
    $fullname = trim($_POST['fullname']);
    echo "Input name \"$fullname\" is ";
    if (!preg_match("/[a-zA-Z',.]+/", $fullname)) {
        echo " not";
    }
    echo " valid<br/>";
} else {
    echo "Full name not set!" . "<br/>";
}

?>

<html>
<head>
    <title></title>
</head>
<body>

Done with form processing?

</body>
</html>