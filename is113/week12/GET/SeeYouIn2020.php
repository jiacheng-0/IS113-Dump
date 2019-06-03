<?php

// Fake grades for fun
$student_components = [
    'jermynyeo@smu.edu.sg' => 'FAIL',
    'robbie.ng@smu.edu.sg' => 'FAIL',
    'gigi.teo@smu.edu.sg' => 'FAIL',
    'belle.lee@smu.edu.sg' => 'FAIL',
    'susanto@smu.edu.sg' => 'FAIL',
    'jess.ng@smu.edu.sg' => 'FAIL',
    'hcboon@smu.edu.sg' => 'FAIL',
    'dakhnovskiy@smu.edu.sg' => 'FAIL'
];

// YOUR CODE GOES HERE
$email = '';
if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    header("Location: search.php");
    return;
}

?>
<html>
<body>

<h1>OH MY GOD! You failed Lab Test 1!</h1>
<h1>See you again in Year 2020!</h1>
<h2>Your email <?= $email ?> has been added to the repeat students list!</h2>

<hr>
Back to <a href='search.php'>Search</a>

</body>
</html>