<?php
/* 
    Name:  
    Email: 
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

    $selected_people = $_POST['person'];

//    print_r($selected_people);

    echo "<table border='1'>";

    echo "<tr><th>Photo</th><th>Message</th></tr>";
    foreach ($selected_people as $one_person){
        $this_message = $messages[$one_person];
        echo "<tr><td><img src='$one_person.jpg'/></td><td>$this_message</td></tr>";
    }
    echo "</table>";

} else {
    echo "<h1>You must select at least one person!</h1>";
}


?>

</body>
</html>