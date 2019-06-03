<?php

/*
    Name: Teo Jia Cheng

    Email: jcteo.2018@sis.smu.edu.sg
*/

require_once 'model/common.php';

?>

<!DOCTYPE html>
<html>
<body>
<img src="images/sis.png">
<h1>Stored Responses</h1>
<table border='1'>
    <tr>
        <th>Name</th>
        <th>Preferred Class Length (in hours)</th>
        <th>Preferred Sem Length (in weeks)</th>
    </tr>
    <?php
    # == Part A (Display Stored Responses): ENTER CODE HERE ==
    $responseDAO = new ResponseDAO();
    $allResponses = $responseDAO->retrieveAll();
//    var_dump($allResponses);
    foreach ($allResponses as $one_response) {
//        var_dump($one_response);
        echo "<tr>";
        echo "<td>{$one_response->getName()}</td>";
        echo "<td>{$one_response->getPreferredClassLength()}</td>";
        echo "<td>{$one_response->getPreferredSemLength()}</td>";
        echo "</tr>";
    }
    # ====
    ?>
</table>
</body>
</html>