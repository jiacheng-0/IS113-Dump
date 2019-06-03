<!--
Name:   Teo Jia Cheng
Email:  jcteo.2018
-->
<?php
include "common.php";


//var_dump($clubReport->getMembersBreakdown("Ellipsis"));

?>
<html>
<body>
<form action="q3.php" method="post">
    <select name="club">
        <?php

        $clubReport = new ClubReport();
        $clubNames = $clubReport->getClubNames();
        foreach ($clubNames as $clubName) {
            $selected = "";
            if (isset($_POST['club']) and $_POST['club'] == $clubName) {
                $selected = "selected";
            }
            echo "<option $selected>$clubName</option>";
        }

        ?>
    </select>

    <input type="submit"/>
</form>

<table border="1">
    <tr>
        <th>School</th>
        <th>Cohort</th>
        <th>Ethnicity</th>
    </tr>
    <!--    <tr>-->
    <!--        <td>School name</td>-->
    <!--        <td>Cohort year</td>-->
    <!--        <td>Ethnicity name (Number of students for this school-cohort-ethnicity)</td>-->
    <!--    </tr>-->
    <?php
    $clubName = $clubNames[0];
    if (isset($_POST['club'])) {
        $clubName = $_POST['club'];
    }
    $membersBreakdown = $clubReport->getMembersBreakdown($clubName);
    //        var_dump($membersBreakdown);
    foreach ($membersBreakdown as $school => $years) {
//            var_dump($school);
        foreach ($years as $year => $one_year) {
//                $curr_year =
//                var_dump($year);
            foreach ($one_year as $ethnicty => $count) {
//                    var_dump($ethnicty);
//                    var_dump($one_year);
                echo "<tr><td>$school</td><td>$year</td><td>$ethnicty ($count)</td></tr>";
            }
        }
    }


    ?>
</table>
</body>
</html>