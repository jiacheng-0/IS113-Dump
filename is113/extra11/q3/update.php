<?php

// ARE YOU MISSING SOMETHING HERE?
// DO YOU REQUIRE ANY EXTERNAL PHP FILES?
// CHECK ERROR MESSAGES IN WEB BROWSER & DEBUG!

require_once 'common.php';

$status = false;

if( isset($_POST['id']) && isset($_POST['headline']) ) {

    $dao = new StarDAO();

    // YOUR CODE GOES HERE

    $id = $_POST['id'];
    $headLine = $_POST['headline'];
    var_dump($id);
    var_dump($headLine);
    // The below code will break... check in StarDAO.php ...
    // HINT: What does this method updateHeadline() expect as parameters?
    $status = $dao->updateHeadline($id, $headLine); // Get an Indexed Array of Star objects
}

?>
<html>
<body>
    <?php
        if( $status ) {
            // YOUR CODE GOES HERE

            echo "<h1>Update was successful!</h1>";
        }
        else {
            echo "<h1>Update was NOT successful!</h1>";
        }
    ?>

Click <a href="display.php">here</a> to return to the Main Page

</body>
</html>