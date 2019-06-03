<?php

require_once 'CatDAO.php';
$dao = new CatDAO();
$cats = $dao->getCats();

?>
<html>
<body>

<h1>Our Cats</h1>

<table border='1' style="border-collapse: collapse">

    <tr style="background-color: lightblue">
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Status</th>
    </tr>
    <?php
    foreach ($cats as $cat) {
        // YOUR CODE GOES HERE
        $status = "Available";
        if ($cat->getStatus() == "P") {
            $status = "Pending Adoption";
        }
        echo "
    <tr>
        <td> {$cat->getName()} </td>
        <td> {$cat->getAge()} </td>
        <td> {$cat->getGender()} </td>
        <td> {$status} </td>
    </tr>
";
    }

    //                echo "<td>" . $cat->getName() . "</td>";
    //                echo "<td>" . $cat->getAge() . "</td>";
    //                echo "<td>" . $cat->getGender() . "</td>";
    //                echo "<td>" . $cat->getStatus() . "</td>";
    ?>

</table>

</body>
</html>