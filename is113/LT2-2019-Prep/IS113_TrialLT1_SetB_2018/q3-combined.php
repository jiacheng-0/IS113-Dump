<html>
<body>


<form action="q3-combined.php">

    Name:
    <select name="student_name[]" multiple>
        <?php
        // Write code here

        require_once "CourseDAO.php";

        $courseDAO = new CourseDAO();
        $nameList = $courseDAO->retrieveNames();

        foreach ($nameList as $name) {
            echo "<option>$name</option>";
        }

        ?>
    </select>
    <input type='submit' value='Show Combined Timetable'/>

</form>
<?php
if (isset($_GET['student_name'])) {
    $nameList = $_GET['student_name'];
}
//    var_dump($nameList);
$all_courses = [];
foreach ($nameList as $name) {

    $thisCourses = $courseDAO->retrieveCourses($name);
    foreach ($thisCourses as $oneCourse) {
        $all_courses[] = $oneCourse;
    }
//        echo "<hr/>";
//        var_dump($thisCourses);
//        echo "Added " . count($thisCourses) . " courses<br/>";
}
//    echo "Total " . count($all_courses) . " courses<br/>";
//    var_dump($all_courses);


$days = ['MON', 'TUE', 'WED', 'THU', 'FRI'];
$timings = ['0830', '1000', '1200', '1330', '1530', '1700'];
// need to sort $all_courses

$sorted_all_courses = [];
//var_dump($all_courses);
//    var_dump(count($sorted_all_courses));
foreach ($days as $day) {
    for ($i = 0; $i < count_row_span_per_day($day, $all_courses); $i++) {
        for ($t = 0; $t < count($timings); $t++) {
            $time = $timings[$t];
            for ($c = 0; $c < count($all_courses); $c++) {
                $course = $all_courses[$c];
                if ($course->weekOfDay == $day
                    and $course->startTime == $time
                    and !course_in_list($course, $sorted_all_courses)) {
                    $sorted_all_courses[] = $course;
                    if ($course->numUnits == 2) {
                        $t++;
                    }
                    break;
                }
            }
        }
    }
}
//var_dump($sorted_all_courses);
//exit();
function course_in_list($course, $sorted_all_courses)
{
    foreach ($sorted_all_courses as $one_course) {
        if ($course == $one_course) {
            return true;
        }
    }
    return false;
}

//    var_dump($sorted_all_courses);
//var_dump(count($sorted_all_courses));

// function to count max row span per day
function count_row_span_per_day($day, $sorted_all_courses)
{
    $timings = ['0830', '1000', '1200', '1330', '1530', '1700'];
    $timingCount = [
        '830' => 0,
        '1000' => 0,
        '1200' => 0,
        '1330' => 0,
        '1530' => 0,
        '1700' => 0
    ];
    foreach ($sorted_all_courses as $course) {
        if ($course->weekOfDay == $day) {
//            var_dump($course);
            $timingCount[$course->startTime]++;
            if ($course->numUnits === 2) {
                $timingsIndex = array_search($course->startTime, $timings);
                $nextTiming = $timings[$timingsIndex + 1];
                $timingCount[$nextTiming]++;
            }
        }
    }
    return max(array_values($timingCount));
}

//echo "<h2>RowSpan per Day</h2>";
//foreach ($days as $day) {
//    var_dump(count_row_span_per_day($day, $sorted_all_courses));
//}

?>

<table border="2" style="border-collapse: separate">
    <tr>
        <th></th>
        <th>08:30am - 10:00am</th>
        <th>10:00am - 11:30am</th>
        <th>12:00nn - 1:30pm</th>
        <th>1:30pm - 3:00pm</th>
        <th>3:30pm - 5:00pm</th>
        <th>5:00pm - 6:30pm</th>
    </tr>

    <?php
    // Your code should use the following variables declared
    $days = ['MON', 'TUE', 'WED', 'THU', 'FRI'];
    $timings = ['0830', '1000', '1200', '1330', '1530', '1700'];

    // Write code here

    $timingSkip = [
        '830' => false,
        '1000' => false,
        '1200' => false,
        '1330' => false,
        '1530' => false,
        '1700' => false
    ];

    $sorted_index = 0;
    foreach ($days as $day) {
        $rowspan = max(count_row_span_per_day($day, $sorted_all_courses), 1);
        echo "
    <tr> 
        <th rowspan='$rowspan'>$day</th>
";
        for ($i = 0; $i < $rowspan; $i++) {
            for ($t = 0; $t < count($timings); $t++) {
                $time = $timings[$t];
                if ($sorted_all_courses[$sorted_index]->weekOfDay == $day
                    and $sorted_all_courses[$sorted_index]->startTime == $time) {

                    // colspan
                    $colspan = $sorted_all_courses[$sorted_index]->numUnits;
                    if ($colspan > 1) {
                        $t += $colspan - 1;
                    }
                    $name = $sorted_all_courses[$sorted_index]->studentName;
                    $courseCode = $sorted_all_courses[$sorted_index]->courseCode;
                    $displayText = "$name ($courseCode)";
                    echo "        <td align='center' colspan='$colspan'>$displayText</td>
";
                    if ($sorted_index < count($sorted_all_courses) - 1) {
                        $sorted_index++;
                    }

                } else {
                    echo "        <td></td>
";
                }
            }
            echo "    </tr>";
        }
        if ($rowspan > 1) {
            echo "    </tr>";
        }
    }

    ?>

</table>
<?php

//var_dump($sorted_all_courses);

?>
</body>
</html>