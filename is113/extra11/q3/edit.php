<?php

require_once 'common.php';

$id = '';
if( isset($_GET['id']) ) {

    $id = $_GET['id'];

    $dao = new StarDAO();
    $star_object = $dao->getStarByID($id); // Get an Indexed Array of Star objects
    // You should probably check what's inside $star_object
    // AND make sure that this is the correct Star !!!
}


?>
<html>
<body>
    
    <!-- Note that clicking on the submit button will submit to 'update.php' via HTTP POST -->
    <form action='update.php' method='POST'>

    <?php
        if(isset($star_object)) {
            // YOUR CODE GOES HERE

            // You should NOT make this star's ID visible to the user.
            // HINT: You should create a special input field (of type 'hidden') with name='id'
            // Reference: https://www.w3schools.com/tags/att_input_type_hidden.asp
            var_dump($star_object);
            echo "<input type='hidden' name='id' value='{$star_object->getID()}'>";
            // Display Name
            echo "Name: " . $star_object->getName() . "<br/>";
            // Display Gender
            echo "Gender: " . $star_object->getGender() . "<br/>";
            // Display Headline as a Text INPUT field
            // The Text INPUT field value must correctly show the current Headline
            echo "Headline: ";
            echo "<input type='text' name='headline' value='{$star_object->getHeadline()}'/>" . "<br/>";;
            // SUBMIT button - Clicking on this will submit to 'update.php' via HTTP POST
            // DO NOT MODIFY THE BELOW FOUR (4) LINES OF CODE
            echo "
                <br><br>
                <input type='submit' value='Update Info'>
            ";
        }
    ?>

    </form>

</body>
</html>