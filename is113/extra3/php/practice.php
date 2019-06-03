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

if (isset($student_grades)) {

    echo "<table border='1' style='border-collapse: collapse'>";
    echo "<tr><th>Name</th><th>Grades</th></tr>";

    foreach ($student_grades as $name => $grade_arr){
        foreach ($grade_arr as $grade){
            echo "<tr><td>$name</td><td>$grade</td></tr>";
        }
    }

    echo "</table>";
}


echo '<hr>';


//========================================
// Part B
// Your code goes here


if (isset($student_grades)) {

    echo "<table border='1' style='border-collapse: collapse'>";
    echo "<tr><th>Name</th><th>Grades</th></tr>";

    foreach ($student_grades as $name => $grade_arr){
        foreach ($grade_arr as $grade){

            // default font is red (all fail)
            $font_style = "color='red' size='4'";
            if ($grade == "A-"){
                $font_style = "color='green' size='5'";
            } elseif (substr($grade, 0, 1) == "A"){
                $font_style = "color='blue' size='6'";
            }
            echo "<tr><td>$name</td><td><font $font_style>$grade</font></td></tr>";
        }
    }

    echo "</table>";
}

echo '<hr>';

//========================================
// Part C
// Your code goes here

function get_font_style($grade){

    $font_style = "color='red' size='4'";
    if ($grade == "A-"){
        $font_style = "color='green' size='5'";
    } elseif (substr($grade, 0, 1) == "A"){
        $font_style = "color='blue' size='6'";
    }

    return $font_style;
}

if (isset($student_grades)) {

    echo "<table border='1' style='border-collapse: collapse'>";
    echo "<tr><th>Name</th><th>Grades</th></tr>";

    foreach ($student_grades as $name => $grade_arr){

        $grade = $grade_arr[0];
        echo "<tr>";
        echo "<td rowspan='" . count($grade_arr) . "'>$name</td>";
        echo "<td><font " . get_font_style($grade) . ">$grade</font></td></tr>";
        echo "</tr>";

        for ($i = 1; $i < count($grade_arr); $i++){

            $grade = $grade_arr[$i];
            // default font is red (all fail)


            echo "<tr><td><font " . get_font_style($grade) . ">$grade</font></td></tr>";
        }
    }

    echo "</table>";
}

echo '<hr>';


?>