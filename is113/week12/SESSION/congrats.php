<?php

require_once '../SESSION_DB/include/GradeDAO.php';

//session_start();

// FAKE grades for fun
$student_components = [
    'jcfrantz@smu.edu.sg' => [8, 8, 4],
    'james@sis.smu.edu.sg' => [8, 8, 4],
    'muhammadss@smu.edu.sg' => [7, 8, 3],
    'jeddy.tan@smu.edu.sg' => [8, 7, 2],
    'valerie.lee@smu.edu.sg' => [7, 7, 1],
    'denzel.chan@smu.edu.sg' => [8, 8, 4],
    'maurice.lim@smu.edu.sg' => [7, 6, 2],
    'bowen.hao@smu.edu.sg' => [8, 7, 0],
    'leandralee@smu.edu.sg' => [7, 8, 1]
];

// YOUR CODE GOES HERE
if (isset($_SESSION['PASS'])) {
    $email = $_SESSION['PASS'];
    unset($_SESSION['PASS']);
} else {
    header("Location: search.php");
    return;
}

?>
<html>
<body>

<h1>Congratulations! You passed Lab Test 1!</h1>
<h2>Grade for <?= $email ?></h2>

<table border='1'>
    <tr>
        <th>Q1</th>
        <th>Q2</th>
        <th>Q3</th>
        <th>Total</th>
        <th>Percentage</th>
    </tr>

    <?php
    if ($email != "") {

        $gradeDAO = new GradeDAO();
        $score_array = $gradeDAO->retrieveComponents($email);
//        $score_array = $student_components[$email];

        $total = 0;
        foreach ($score_array as $one_score) {
            $total += $one_score;
        }
        $percentage = ($total / 20) * 100;
        $percentage = number_format($percentage, 2);
        echo "
    <tr>
        <td>{$score_array[0]}</td>
        <td>{$score_array[1]}</td>
        <td>{$score_array[2]}</td>
        <td>{$total}</td>
        <td>{$percentage}</td>
    </tr>";
    }

//    session_unset();
    ?>

</table>

<hr>
Back to <a href='search.php'>Search</a>

</body>
</html>