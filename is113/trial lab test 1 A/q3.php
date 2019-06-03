<?php
/* 
Name:  Teo Jia Cheng
Email: jcteo.2018
*/

// $students is an Array of:
//    Associative Arrays, where each Associative Array contains:
//        key (name) => value (string)
//        key (courses) => value (Array of Arrays)
$students = [
    [
        "name" => 'Jong Un Kim',
        "courses" => [
            ['IS111', 'Intro Programming', 'MON', '1000', 1],
            ['CS102', 'Discrete Mathematics', 'TUE', '0830', 2],
            ['EE200', 'Intro to Circuits', 'TUE', '1330', 1],
            ['WRIT100', 'Writing and Reasoning', 'WED', '1000', 1],
            ['LIT380', 'Intro to Korean Literature', 'FRI', '1630', 1]
        ]
    ],
    [
        "name" => 'Donald Trump',
        "courses" => [
            ['IS112', 'Data Management', 'TUE', '0830', 2],
            ['WRIT100', 'Writing and Reasoning', 'WED', '1000', 1],
            ['OBHR101', 'Leadership Team Building', 'WED', '1200', 2],
            ['IS113', 'Web Application Development', 'THU', '1500', 2],
            ['STAT202', 'Bayesian Logics', 'FRI', '1000', 1]
        ]
    ],
    [
        "name" => 'Hugo Chavez',
        "courses" => [
            ['IS111', 'Intro Programming', 'MON', '1000', 1],
            ['IS112', 'Data Management', 'TUE', '0830', 2],
            ['EE200', 'Intro to Circuits', 'TUE', '1330', 1],
            ['OBHR101', 'Leadership Team Building', 'WED', '1200', 2],
            ['STAT202', 'Bayesian Logics', 'FRI', '1500', 1]
        ]
    ]
];

// INPUT  : $students Array
// OUTPUT : Return an Array of student names (String)
function getStudentNames($students)
{
    $arr = [];
    // Part A
    // YOUR CODE GOES HERE
    foreach ($students as $student) {
        $arr[] = $student['name'];
    }

    return $arr;
}

function getCoursesByStudentName($students, $student_name)
{
    $empty_arr = [];
    // Part A
    // YOUR CODE GOES HERE
    foreach ($students as $student) {
        if ($student['name'] == $student_name) {
            return $student['courses'];
        }
    }
    return $empty_arr;
}

?>
<html>
<body>
<form action='q3.php' method='POST'>
    Name:
    <select name='student_name'>
        <?php
        // Part A
        // YOUR CODE GOES HERE
        $student_names = getStudentNames($students); // DO NOT MODIFY THIS LINE

        // YOUR CODE CONTINUES HERE
        foreach ($student_names as $student_name) {

            $selected = '';
            if (isset($_POST['student_name']) && $_POST['student_name'] == $student_name) {
                $selected = 'selected';
            }

            echo "<option $selected>$student_name</option>";
            $selected = '';
        }
        ?>
    </select>
    <input type='submit' value='Show Timetable'/>
</form>

<?php

if (!isset($_POST['student_name'])) {
    $student_name = $student_names[0];
} else {
    $student_name = $_POST['student_name'];
}
echo "<table border='2' style='border-collapse: collapse'>";

echo "<tr bgcolor='#add8e6'><th height='35px'></th><th>08:30am - 10:00am</th><th>10:00am - 11:30am</th><th>12:00nn - 1:30pm</th><th>1:30pm - 3:00pm</th><th>3:00pm - 4:30pm</th><th>4:30pm - 6:00pm</th></tr>";

$days = ['MON', 'TUE', 'WED', 'THU', 'FRI'];
$course_timings = ['0830', '1000', '1200', '1330', '1500', '1630'];
$courses = getCoursesByStudentName($students, $student_name);

//    echo "<pre>";
//    var_dump($courses);
//    echo "</pre>";

$courses_index = 0;

foreach ($days as $one_day) {
    echo "<tr><td>$one_day";
    for ($i = 0; $i < count($course_timings); $i++) {
//        foreach ($course_timings as $one_timing) {

        $one_timing = $course_timings[$i];

        if ($courses_index < count($courses)) {
            $one_course = $courses[$courses_index];
        }

        $course_code = $one_course[0];
        $course_name = $one_course[1];
        $day_of_week = $one_course[2];
        $timing = $one_course[3];
        $col_span = $one_course[4];

        if ($day_of_week == $one_day and $timing == $one_timing) {
            echo "<td align='center' colspan='$col_span'>$course_code<br/>$course_name</td>";
            if ($col_span == 2) {
                $i++;
                $col_span = 1;
            }
            $courses_index++;
        } else {
            echo "<td></td>";
        }
    }
    echo "</td></tr>";
}
echo "</table>";


?>

</body>
</html>