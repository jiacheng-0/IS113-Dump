<?php
/* 
    Name:  Teo Jia Cheng
    Email: jcteo.2018
*/

$messages = [
    "trump" => "Make America Great Again",
    "clinton" => "More Women in Office",
    "kim" => "Nukes Fly High and Far",
    "moon" => "One Korea One People"
];

?>

<!DOCTYPE html>
<html>
<body>

<?php
if (isset($_POST['person'])) {
    $person = $_POST['person'];
    $h1_message = $messages[$person];
    echo "<h1>$h1_message</h1>";
    echo "<img src='$person.jpg'/>";
}
?>

</body>
</html>