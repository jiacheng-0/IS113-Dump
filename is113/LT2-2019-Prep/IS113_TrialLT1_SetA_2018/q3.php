<?php

// this will autoload the class that we need in our code
spl_autoload_register(function ($class) {
    // we are assuming that it is in the same directory as common.php
    // otherwise we have to do
    // $path = 'path/to/' . $class . ".php"    
    $path = $class . ".php";
    require $path;

});

$courseDAO = new CourseDAO();

?>
<html>
<body>
<form method='post'>
    Name:
    <select name='student-name'>
        <?php

        $studentNames = $courseDAO->retrieveNames();
        foreach ($studentNames as $studentName) {
            $selected = "";
            if (isset($_POST['student-name']) and $_POST['student-name'] == $studentName) {
                $selected = "selected";
            }
            echo "<option $selected>$studentName</option>";
        }
        ?>
    </select>
    <input type="submit" value="Show Timetable">
</form>

<?php
$studentName = $studentNames[0];
if (isset($_POST['student-name'])) {
    $studentName = $_POST['student-name'];
}

$daysArray = ['MON', 'TUE', 'WED', 'THU', 'FRI'];
$timingArray = ['830', '1000', '1200', '1330', '1530', '1700'];

//var_dump($studentName);
//echo "<hr>";
$unsortedCourse = $courseDAO->retrieveCourses($studentName);
//echo "<h3>Unsorted</h3>";
//var_dump($unsortedCourse);

//echo "<hr>";
$newSortedCourse = [];
$unsortedIndex = 0;
//echo "<h3>Sorted</h3>";
for ($i = 0; $i < count($daysArray); $i++) {
    for ($j = 0; $j < count($timingArray); $j++) {
        foreach ($unsortedCourse as $one_course) {

            // if matches the day and time, push into newSorted array
//            var_dump($one_course);
            if ($one_course->weekOfDay == $daysArray[$i]
                and $one_course->startTime == $timingArray[$j]) {
                $newSortedCourse[] = $one_course;

//                $var_to_dump = $one_course->weekOfDay . " " . $one_course->startTime;
//                var_dump($var_to_dump);

                // add 1 to the unsorted index
                // if its not at the limit
                if ($unsortedIndex < count($unsortedCourse) - 1) {
                    $unsortedIndex++;
                }
            }
        }
    }
}

//var_dump($newSortedCourse);

echo "<table border='1'>";
echo "
<tr>
    <td></td>
    <td>08:30am - 10:00am</td>
    <td>10:00am - 11:30am</td>
    <td>12:00nn - 1:30pm</td>
    <td>1:30pm - 3:00pm</td>
    <td>3:30pm - 5:00pm</td>
    <td>5:00pm - 6:30pm</td>
</tr>
";
//var_dump($newSortedCourse[0]);
$newSortedIndex = 0;
foreach ($daysArray as $day) {
    echo "<tr><th>$day</th>";

    for ($i = 0; $i < count($timingArray); $i++) {
        $time = $timingArray[$i];
        if ($newSortedCourse[$newSortedIndex]->weekOfDay == $day
            and $newSortedCourse[$newSortedIndex]->startTime == $time) {

            $displayString = $newSortedCourse[$newSortedIndex]->courseCode . "<br/>";
            $displayString .= $newSortedCourse[$newSortedIndex]->courseDesc;
            $colSpan = $newSortedCourse[$newSortedIndex]->numUnits;
            $i += $newSortedCourse[$newSortedIndex]->numUnits - 1;
            echo "<td align='center' colspan='$colSpan'>$displayString </td>";

            if ($newSortedIndex < count($newSortedCourse) - 1) {
                $newSortedIndex++;
            }
        } else {
            echo "<td></td>";
        }
    }

    echo "</tr>";
}

echo "</table>";

//var_dump($newSortedCourse);
echo "<h2>Layfoo suggested we try the flipped timetable qns</h2>";
?>
</body>
</html>

