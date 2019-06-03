<!--
Name:  Teo Jia Cheng
Email: jcteo.2018
-->

<?php
require_once "ClubReport.php";

// Add your code in the following

?>

<html>
<body>
<form action="q3.php">
    <!-- Insert your codes in the following -->
    <?php
    if (!isset($_GET['club'])) {
//        $_GET['club'] = getClubNames()[0];
        $_GET['club'] = 'Ellipsis';

    }
    ?>
    <select name="club">
        <?php
        foreach (getClubNames() as $one_club_name) {
            $selected = '';
            if (isset($_GET['club']) and $_GET['club'] == $one_club_name) {
                $selected = 'selected';
            }
            echo "<option $selected>$one_club_name</option>";
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
    if (isset($_REQUEST['club'])) {
        $club = $_REQUEST['club'];
        $school_year_raceCount = getMembersBreakdown($club);

        foreach ($school_year_raceCount as $school => $year_raceCount) {
            foreach ($year_raceCount as $year => $raceCount) {
                foreach ($raceCount as $race => $count) {
                    echo "<tr>
                    <td>$school</td>
                    <td>$year</td>
                    <td>$race ($count)</td>
                </tr>";
                }
            }
        }
    }
    ?>
</table>
<?php
echo "<pre>";
if (isset($school_year_raceCount)) {
    var_dump($school_year_raceCount);
}
echo "</pre>";
?>
</body>
</html>