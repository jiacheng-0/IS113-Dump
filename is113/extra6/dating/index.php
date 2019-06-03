<?php

require_once 'PersonDAO.php';
// By importing this file, we can create a DAO object.
// DAO object allows us to obtain:
//    - $people (Array of Person objects)
//    - a subset of $people where gender is either 'M' or 'F'
$dao = new PersonDAO();
// You can now call all public methods of PersonDAO class.


?>
<html>
<head>
    <title>Dating - Show All Profiles</title>
</head>
<body>
<h3>Show All Profiles</h3>

<?php
// YOUR CODE GOES HERE
// There are multiple Tables within a Table
//echo "<pre>";
$men = $dao->getPeopleByGender('M');
echo "<table border='1'>";
echo "<tr><th align='centre' colspan='" . count($men) * 2 . "'>Men (" . count($men) . ")</th></tr>";
echo "<tr>";
foreach ($men as $person) {
    echo "<td>";
    echo "<table border='1'>";
    echo "<tr><td colspan='2'><img src='images/" . $person->getImage() . "'/></td></tr>";
    echo "<tr><td>fullname</td><td>" . $person->getFullname() . "</td></tr>";
    echo "<tr><td>gender</td><td>" . $person->getGender() . "</td></tr>";
    echo "<tr><td>age</td><td>" . $person->getAge() . "</td></tr>";
    echo "<tr><td>weight</td><td>" . $person->getWeight() . "</td></tr>";
    echo "<tr><td>height</td><td>" . $person->getHeight() . "</td></tr>";
    echo "</table>";
    echo "</td>";
}
echo "</tr>";
echo "</table>";
//echo "</pre>";
//===================================================================
// Display a Table containing "Men" only
// There are multiple Tables within a Table
// YOUR CODE GOES HERE

echo '<hr>';
//===================================================================
// Display a Table containing "Women" only
// There are multiple Tables within a Table
// YOUR CODE GOES HERE
$women = $dao->getPeopleByGender('F');
echo "<table border='1'>";
echo "<tr><th align='centre' colspan='" . count($women) * 2 . "'>Women (" . count($women) . ")</th></tr>";
echo "<tr>";
foreach ($women as $person) {
    echo "<td>";
    echo "<table border='1'>";
    echo "<tr><td colspan='2'><img src='images/" . $person->getImage() . "' height='160'/></td></tr>";
    echo "<tr><td>fullname</td><td>" . $person->getFullname() . "</td></tr>";
    echo "<tr><td>gender</td><td>" . $person->getGender() . "</td></tr>";
    echo "<tr><td>age</td><td>" . $person->getAge() . "</td></tr>";
    echo "<tr><td>weight</td><td>" . $person->getWeight() . "</td></tr>";
    echo "<tr><td>height</td><td>" . $person->getHeight() . "</td></tr>";
    echo "</table>";
    echo "</td>";
}
echo "</tr>";
echo "</table>";

?>
</table>

</body>
</html>