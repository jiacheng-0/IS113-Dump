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
<h1>Statistics</h1>
<?php
# == Part C (Compute Statistics): ENTER CODE HERE ==
$responseDAO = new ResponseDAO();
$allResponses = $responseDAO->retrieveAll();
$numberOfResponses = count($allResponses);
$twoHours = 0;
$numberOfWeek15 = 0;
foreach ($allResponses as $one_response) {
    if ($one_response->getPreferredClassLength() == 2) {
        $twoHours++;
    }
    if ($one_response->getPreferredSemLength() == 15) {
        $numberOfWeek15++;
    }
}

$week15 = "00.00%";
$week15 = number_format($numberOfWeek15 / $numberOfResponses * 100, 2) . "%";
echo "<table border='1'>";
echo "<tr><th># Responses:	</th>             <td>$numberOfResponses</td></tr>";
echo "<tr><th># 2 hours</th>      <td>$twoHours</td></tr>";
echo "<tr><th>% 15 weeks</th>   <td>$week15</td></tr>";
echo "</table>";
# ====
?>
</body>
</html>