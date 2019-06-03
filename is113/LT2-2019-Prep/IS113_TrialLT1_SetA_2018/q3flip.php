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

$unsortedCourse = $courseDAO->retrieveCourses($studentName);

$newSortedCourse = [];
$unsortedIndex = 0;

#### SORTING THE COURSE BY DAY, TIME

for ($j = 0; $j < count($timingArray); $j++) {
    for ($i = 0; $i < count($daysArray); $i++) {
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

$times = [
    '830' => '08:30am - 10:00am',
    '1000' => '10:00am - 11:30am',
    '1200' => '12:00nn - 1:30pm',
    '1330' => '1:30pm - 3:00pm',
    '1530' => '3:30pm - 5:00pm',
    '1700' => '5:00pm - 6:30pm'
];
$times_values_long = array_values($times);
$times_values_short = array_keys($times);

echo "<table border='1'>";
echo "<tr><th></th>";
foreach ($daysArray as $day) {
    echo "<th>$day</th>";
}
echo "</tr>";
//var_dump($newSortedCourse[0]);
$newSortedIndex = 0;

$cell_to_skip = [
    'MON' => 0,
    'TUE' => 0,
    'WED' => 0,
    'THU' => 0,
    'FRI' => 0
];
foreach ($times_values_short as $time) {
    echo "<tr><td>{$times[$time]}</td>";

    for ($i = 0; $i < count($daysArray); $i++) {
        $day = $daysArray[$i];
        if ($cell_to_skip[$day] >= 1) {
            $cell_to_skip[$day] -= 1;
            continue;
        }
        if ($newSortedCourse[$newSortedIndex]->weekOfDay == $day
            and $newSortedCourse[$newSortedIndex]->startTime == $time) {

            $displayString = $newSortedCourse[$newSortedIndex]->courseCode . "<br/>";
            $displayString .= $newSortedCourse[$newSortedIndex]->courseDesc;
            $rowSpan = $newSortedCourse[$newSortedIndex]->numUnits;
//            $rowSpan = 1;
//            $i += $newSortedCourse[$newSortedIndex]->numUnits - 1;
            echo "<td align='center' rowspan='$rowSpan'>$displayString </td>";
            if ($rowSpan == 2) {
                $cell_to_skip[$day] += 1;
//                var_dump($cell_to_skip);
            }
            if ($newSortedIndex < count($newSortedCourse) - 1) {
                $newSortedIndex++;
//                var_dump($newSortedCourse[$newSortedIndex]);
            }
        } else {
            echo "<td></td>";
        }
    }

    echo "</tr>";
}

echo "</table>";

echo "<hr/>";
//var_dump($newSortedCourse);

?>
</body>
</html>

