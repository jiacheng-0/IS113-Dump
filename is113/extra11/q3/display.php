<?php

require_once 'common.php';
// What is 'common.php'? Open and see what's inside!
// Reference: https://www.w3resource.com/php/classes-objects/php-object-oriented-programming.php#splautoload


$dao = new StarDAO();
$stars = $dao->getAll(); // Get an Indexed Array of Star objects

?>
<html>
<body>

<?php
// YOUR CODE GOES HERE

//echo (empty($stars) ? "empty" : "not empty") . "<br/>";

if (!empty($stars)) {

    echo "
<table border='1'>
    <tr>
        <th>Photo</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Headline</th>
        <th>Edit Link</th>
    </tr>
";
    foreach ($stars as $one_star) {
        echo "
    <tr>
        <td><img src='images/{$one_star->getPhoto()}'/></td>
        <td>{$one_star->getName()}</td>
        <td>{$one_star->getGender()}</td>
        <td>{$one_star->getHeadline()}</td>
        <td><a href='edit.php?id={$one_star->getID()}'>Edit</a></td>
    </tr>
";
    }
    echo "</table>
";
}
// Display star's photo

// Display star's name

// Display star's gender

// Display star's headline

// Display a HyperLink to edit.php
// You must append a star's id to this URL... so that
// when the user clicks on this HyperLink, it will make an HTTP GET request to edit.php
//
// For example, the link will look like this:
//      edit.php?id=3
//    where 3 is the id of a certain star (you can obtain this from each Star object)
?>

</body>
</html>