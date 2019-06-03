<?php

require_once 'common.php';

$subject = $_POST['subject'];
$entry = $_POST['entry'];
$mood = $_POST['mood'];

$postDao = new PostDAO();
$status = $postDao->add($subject, $entry, $mood);

?>
<html>
<body>
<?php

if ($status) {
    echo "<h1>Insertion was successful</h1>";
    echo "Click <a href='display.php'>here</a> to return to Main Page";
} else {
    echo "<h1>Insertion was NOT successful</h1>";
}

?>
</body>
</html>