<?php

$students = [
    'jcfrantz@smu.edu.sg' => 'PASS',
    'jermynyeo@smu.edu.sg' => 'FAIL',
    'muhammadss@smu.edu.sg' => 'PASS',
    'robbie.ng@smu.edu.sg' => 'FAIL',
    'jeddy.tan@smu.edu.sg' => 'PASS',
    'gigi.teo@smu.edu.sg' => 'FAIL',
    'valerie.lee@smu.edu.sg' => 'PASS',
    'belle.lee@smu.edu.sg' => 'FAIL',
    'denzel.chan@smu.edu.sg' => 'PASS',
    'susanto@smu.edu.sg' => 'FAIL',
    'maurice.lim@smu.edu.sg' => 'PASS',
    'jess.ng@smu.edu.sg' => 'FAIL',
    'bowen.hao@smu.edu.sg' => 'PASS',
    'hcboon@smu.edu.sg' => 'FAIL',
    'leandralee@smu.edu.sg' => 'PASS',
    'dakhnovskiy@smu.edu.sg' => 'FAIL'
    , 'james@sis.smu.edu.sg' => 'PASS'
];

// Form Processing
$status = '';

// YOUR CODE GOES HERE

//$email = $_POST['email'] ?? '';

//var_dump($_POST);


?>
<html>
<body>

<!-- Display status PASS or FAIL -->
<?php
if (isset($_POST['email'])) {

    $email = $_POST['email'];

    if (array_key_exists($email, $students)) {

        $status = $students[$email];

        if ($status == "PASS") {
            header("location: congrats.php?email=$email");
            return;
        } else {
            header("Location: SeeYouIn2020.php?email=$email");
            return;
        }
    } else {
        //  echo "<h2>$email not found</h2>";
        header("Location: search.php?email=$email");
        return;
    }
}
?>

</body>
</html>