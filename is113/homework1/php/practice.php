<?php


// Given this associative array, complete Parts A, B, C
$student_grades = [
    'Kee Hock' => ['A+', 'A', 'B+', 'A-'],
    'Debbie' => ['A', 'B+', 'A-', 'A'],
    'Patrick' => ['B', 'C', 'F', 'B-']
];

//========================================
// Part A
// Your code goes here
echo "<h1>Part A</h1>";
echo "
<table border='1'>
<tr>
    <th>Names</th>
    <th>Grades</th>
</tr>";

foreach ($student_grades as $stu => $grade_arr) {
    foreach ($grade_arr as $one_grade) {
        echo "    <tr>
                    <td>$stu</td>
                    <td>$one_grade</td>
                  </tr>";
    }
}
echo "</table>";
echo '<hr>';
//========================================
// Part B
// Your code goes here
echo "<h1>Part B</h1>";
echo "<table border='1'>
<tr>
    <th>Names</th>
    <th>Grades</th>
</tr>";

// submission 2 added this method
// modern styling but commented because not used.
//function get_style_by_grade($one_grade)
//{
//    $style = "color: red; font-size: medium";
//    if ($one_grade == 'A-') {
//        $style = "color: green; font-size: large";
//    } elseif ($one_grade == 'A+' || $one_grade == 'A') {
//        $style = "color: blue; font-size: x-large";
//    }
//    return $style;
//}

function apply_style_to_grade($one_grade)
{
    //  3 possible returns with old html styles.
    //  <font size=6 color='blue'>
    //  <font size=5 color='green'>
    //  <font size=4 color='red'>
    if ($one_grade == 'A-') {
        return "<font size=5 color='green'>$one_grade</font>";
    } elseif ($one_grade == 'A+' || $one_grade == 'A') {
        return "<font size=6 color='blue'>$one_grade</font>";
    }
    return "<font size=4 color='red'>$one_grade</font>";
}

foreach ($student_grades as $stu => $grade_arr) {
    foreach ($grade_arr as $one_grade) {

//        $style = get_style_by_grade($one_grade);
        echo "    <tr>
                    <td>$stu</td>
                    <td>" . apply_style_to_grade($one_grade) . "</td>
                  </tr>";
    }
}
echo "</table>";

echo '<hr>';

//========================================
// Part C
// Your code goes here
echo "<h1>Part C</h1>";

echo "<table border='1'>
<tr>
    <th>Names</th>
    <th>Grades</th>
</tr>";

foreach ($student_grades as $stu => $grade_arr) {

    $rows_to_span = sizeof($grade_arr);
    echo "<tr>";
    echo "<td rowspan='$rows_to_span'>$stu</td>";
    echo "<td>" . apply_style_to_grade($grade_arr[0]) . "</td>";
    echo "</tr>";

    for ($i = 1; $i < $rows_to_span; $i++) {
        echo "<tr>";
        echo "<td>" . apply_style_to_grade($grade_arr[$i]) . "</td>";
        echo "</tr>";
    }
}
echo "</table>";
echo '<hr>';
