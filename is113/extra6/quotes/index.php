<?php

include "WiseMan.php";
// list of valid categories;  more categories may be added in the future!
$categories = ['love', 'life', 'friend'];

// 1. initialize variables
$quote = '';

// 2.  process
if (isset($_POST['category'])) {

    $wise_man = new WiseMan($_POST['category']);
    $quote = $wise_man->getQuote();
}

// 3. display
//echo $wise_man->getQuote() . "<br/><br/>";
?>
<html>
<body>
<form method="post">
    Category:
    <?php

    $checked = '';
    $category = '';
    if (isset($_POST['category'])) {
        $category = $_POST['category'];
    }
    foreach ($categories as $one_category) {
        if ($category == $one_category) {
            $checked = 'checked';
        }
        echo "
                    <input type='radio' name='category' id='category_$one_category' value='$one_category' $checked/>
                    <label for='category_$one_category'> $one_category </label>
                    &nbsp;
                ";
        $checked = '';
    }
    ?>
    <input type='submit' value='Get quote'/>
</form>

<h1> <?= $quote ?> </h1>
</body>
</html>