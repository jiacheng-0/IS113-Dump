<!--
Name:   Teo Jia Cheng
Email:  jcteo.2018
-->
<?php

include "common.php";

function count_number_of_students_in_cohort($ethnicity_count)
{
    $total_count = 0;
    foreach ($ethnicity_count as $ethnicty => $count) {
        $total_count += $count;
    }
    return $total_count;
}

function count_number_of_students_in_school($years)
{
    $total_count = 0;
    foreach ($years as $year => $ethnicity_count) {
        $total_count += count_number_of_students_in_cohort($ethnicity_count);
    }
    return $total_count;
}

function count_number_of_cohorts_in_school($years)
{
    $total_count = 0;
    foreach ($years as $year => $ethnicity_count) {
        $total_count += count_number_of_cohorts($ethnicity_count);
    }
    return $total_count;
}

function count_number_of_cohorts($years)
{
    $total_count = 0;
    foreach ($years as $year => $ethnicity_count) {
        $total_count++;
    }
    return $total_count;
}

?>
<html>
<body>
<form action="q3b.php" method="post">
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
    var_dump($membersBreakdown);
    foreach ($membersBreakdown as $school => $years) {
//        var_dump($school);
//        var_dump($years);
//        var_dump(count_number_of_students_in_school($years));
        $school_count = count_number_of_students_in_school($years);
        var_dump($school_count);
        $school_row_span = count_number_of_cohorts_in_school($years);
        var_dump($school_row_span);
        // row span should count the number of ethnicity each year in school.

        $school = "<td rowspan='$school_row_span'>" . $school . " ($school_count)</td>";
        foreach ($years as $year => $ethnicity_count) {
//            var_dump($ethnicity_count);
//            var_dump(count_cohort($ethnicity_count));
            $student_count = count_number_of_students_in_cohort($ethnicity_count);
            $cohort_row_span = count_number_of_cohorts($ethnicity_count);
            $year = "<td rowspan='$cohort_row_span'>" . $year . " ($student_count)</td>";
            foreach ($ethnicity_count as $ethnicty => $count) {
//                    var_dump($ethnicty);
//                    var_dump($one_year);
                echo "<tr>$school $year <td>$ethnicty ($count)</td></tr>";
                $school = "";
                $year = "";
            }
        }
    }


    ?>
</table>
</body>
</html>