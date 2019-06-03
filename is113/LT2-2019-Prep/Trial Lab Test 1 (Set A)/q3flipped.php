<?php
/* 
    Name:  
    Email: 
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
    foreach ($students as $one_student) {
        $arr[] = $one_student['name'];
    }
    return $arr;
}

var_dump(getStudentNames($students));
//$s = "Snoop Dogg";
//var_dump(substr($s, 6, 9));

?>
<html>
<body>
<form action='q3flipped.php' method='POST'>
    Name:
    <select name='student_name'>
        <?php
        // Part A
        // YOUR CODE GOES HERE
        $student_names = getStudentNames($students);
        // DO NOT MODIFY THIS LINE

        $selected_student = $students[0]['name'];;
        if (isset($_POST['student_name'])) {
            $selected_student = $_POST['student_name'];
        }


        foreach ($student_names as $one_name) {
            $selected = "";
            if ($selected_student == $one_name) {
                $selected = "selected";
            }
            echo "<option $selected>$one_name</option>";
        }
        // YOUR CODE CONTINUES HERE
        ?>
    </select>
    <input type='submit' value='Show Timetable'/>
</form>

<?php



// find $selected_student_courses
$selected_student_courses = [];
//var_dump($selected_student_courses);
foreach ($students as $one_student) {
    if ($one_student['name'] == $selected_student) {
        $selected_student_courses = $one_student['courses'];
        break;
    }
}

//        <th>08:30am - 10:00am</th>
//        <th>10:00am - 11:30am</th>
//        <th>12:00nn - 1:30pm</th>
//        <th>1:30pm - 3:00pm</th>
//        <th>3:00pm - 4:30pm</th>
//        <th>4:30pm - 6:00pm</th>

echo "
<table border=\"1\">
    <tr>
        <th></th>
        <th>MON</th>
        <th>TUE</th>
        <th>WED</th>
        <th>THU</th>
        <th>FRI</th>
    </tr>";

$daysArray = ['MON', 'TUE', 'WED', 'THU', 'FRI'];
$timingArray = ['0830', '1000', '1200', '1330', '1500', '1630'];

$courses_index = 0;
$current_course = $selected_student_courses[$courses_index];
var_dump($current_course);
foreach ($timingArray as $one_time) {

    // there is a course today
    // $current_course
    //     0                1               2      3    4
    // ['CS102', 'Discrete Mathematics', 'TUE', '0830', 2]
    echo "<tr>";
    echo "<td>$one_time</td>";

    for ($i = 0; $i < count($daysArray); $i++) {
        $one_time = $timingArray[$i];
        $one_day = $daysArray[$i];
        if ($current_course[2] == $one_day
        and $current_course[3] == $one_time) {
            $colspan = 1;
//            if ($current_course[4] == 2) {
//                $colspan = 2;
//                $i++;
//            }

            echo "<td rowspan='$colspan' align='center'>
    $current_course[0] <br>
    $current_course[1]
</td>";
            $courses_index++;
            if ($courses_index < count($selected_student_courses)) {
                $current_course = $selected_student_courses[$courses_index];
            }
        } else {
            // print empty cell
            echo "<td></td>";
        }
    }

    echo "</tr>";
} // foreach daysArray end //
echo "</table>";
var_dump($selected_student_courses);


?>

</body>
</html>