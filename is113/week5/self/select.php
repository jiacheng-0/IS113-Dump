<?php
/* 
 * INSTRUCTIONS
 * 
 * The form below submits back to this same file.
 * After user chooses a school in drop-down menu and clicks Submit button,
 * 1) drop-down menu must display the user selection and correctly display it;
 * 2) display corresponding message from $messages associative array.
 * 
 * Example:
 * 1.  User selects 'SIS' then clicks 'Submit' button.  
 *     - Drop-down menu will display 'SIS'
 *     - '1s and 0s' message is displays above the submit button
 */

$schools = [
    'LKCSB' => 'Business',
    'SOE' => 'Economics',
    'SIS' => 'Information systems',
    'SOL' => 'Law',
    'SOA' => 'Accountancy',
    'SOSS' => 'Social Sciences'
];

$messages = [
    'LKCSB' => 'Money Money Money',
    'SOE' => 'Inflation Time',
    'SIS' => '1s and 0s',
    'SOL' => 'See you in court',
    'SOA' => 'Spreadsheet',
    'SOSS' => 'We Love People'
];

$school = '';
if (isset($_POST['school'])) {
    $school = $_POST['school'];
}

?>
<html>
<body>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method='POST'>
    School:
    <select name='school'>
        <?php
        // YOUR CODE GOES HERE
        // LIST ALL SCHOOLS using $schools Associative Array
        foreach ($schools as $one_school_abbr => $one_school_name) {

            $selected = ' ';
            if ($school == $one_school_abbr) {
                $selected = ' selected';
            }

            echo "<option value='$one_school_abbr'$selected>$one_school_name</option><br/>";
        }
        ?>
    </select>

    <br/>
    <br/>

    <?php
    // YOUR CODE GOES HERE
    // DISPLAY SCHOOL-SPECIFIC MESSAGE using $messages Associative Array
    if (isset($_POST['school'])) {
        echo "<h1>" . $messages[$_POST['school']] . "</h1><br/>";
    }
    ?>

    <input type='submit'>

</form>
</body>
</html>