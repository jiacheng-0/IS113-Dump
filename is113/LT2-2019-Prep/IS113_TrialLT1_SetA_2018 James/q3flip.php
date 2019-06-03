<?php

// this will autoload the class that we need in our code
spl_autoload_register(function ($class) {
    // we are assuming that it is in the same directory as common.php
    // otherwise we have to do
    // $path = 'path/to/' . $class . ".php"    
    $path = $class . ".php";
    require $path;

});

?>
<html>
<body>
<form method='post'>
    Name:
    <select name='student'>
        <?php
        $dao = new CourseDAO;
        $names = $dao->retrieveNames();
        foreach ($names as $name) {
            $selected = '';
            if (isset($_POST['student']) && $_POST['student'] == $name) {
                $selected = 'selected';
            }
            echo "<option value = '$name' $selected>$name</option>";
        }
        echo "</select>";

        ?>
        <input type='submit' name='show_timetable'>
</form>


<?php

function timetable_filler($stu)
{
    $times = ['830' => '08:30am-10:00am', '1000' => '10:00am-11:30am', '1200' => '12:00nn-1:30pm',
        '1330' => '1:30pm-3:00pm', '1530' => '3:30pm-5:00pm', '1700' => '5:00pm-6:30pm'];
    $days = ['MON', 'TUE', 'WED', 'THU', 'FRI'];
    $dao = new CourseDAO;

    echo "<table border='1'><tr><td></td>";
    $times_values_long = array_values($times);
    $times_values_short = array_keys($times);

    for ($i = 0; $i <= 4; $i++) {
        $day = $days[$i];
        echo "<th align='center'>$day</th>";
    }

    echo "</tr>";

    $skipper = [];
    $skipper_counter = 0;
    for ($i = 0; $i <= 5; $i++) {
        echo "<tr>";
        $time = $times_values_long[$i];
        $time2 = $times_values_short[$i];
        echo "<td>$time</td>";
        $stu_courses = $dao->retrieveCourses($stu);
        if ($skipper_counter === 2) {
            $skipper_counter = 0;
            $skipper = [];
        }

        for ($j = 0; $j <= 4; $j++) {
            if (!in_array($j, $skipper)) {
                $current_day = $days[$j];
                $checker = 'no';
                foreach ($stu_courses as $course) {
                    if ($course->weekOfDay == $current_day && $course->startTime == $time2) {
                        if ($course->weekOfDay == $current_day && $course->startTime == $time2) {
                            $length = $course->numUnits;
                            $code = $course->courseCode;
                            $desc = $course->courseDesc;

                            if ($length > 1) {
                                $skipper[] = $j;
                            }
                            echo "<td rowspan='$length' align='center'>$code<br>$desc</td>";
                            $checker = 'yes';
                        }
                    }
                }
                if ($checker == 'no') {
                    echo "<td></td>";
                }
            }
        }
        if (!empty($skipper)) {
            $skipper_counter += 1;
        }
        echo "</tr>";
    }
    echo "</table>";
}

// var_dump($_POST['student']);
if (isset($_POST['student'])) {
    timetable_filler($_POST['student']);
}
?>

</body>
</html>

