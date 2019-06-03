<?php
// get full name
if ( isset($_GET["fullname"]) ) {
    $name = $_GET["fullname"];
}
else if ( isset($_POST["fullname"]) ) {
    $name = $_POST["fullname"];
}

// get gender
if ( isset($_GET["gender"]) ) {
    $gender = $_GET["gender"];
}
else if ( isset($_POST["gender"]) ) {
    $gender = $_POST["gender"];
}


// salutation
$salutation = ""; 
if ( isset($gender) ) {
    if ( $gender === "F") {
        $salutation = "Miss";
    }
    else {
        $salutation = "Mr";
    }
}


// get fruit
if ( isset($_GET["fruit"]) ) {
    $fruit = $_GET["fruit"];
}
else if ( isset($_POST["fruit"]) ) {
    $fruit = $_POST["fruit"];
}
else {
    $fruit = "-- Select One --";
}

?>

<html>
  <body>
    Hello <?php echo $salutation. " " . $name; ?>!<br/>
    <?php 
    if ( $fruit !== "-- Select One --" ) { 
        echo "Your favourite fruit is ". $fruit . ".<br/>";
    }
    ?>
  </body>
</html>
