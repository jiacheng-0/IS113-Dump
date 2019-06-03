<?php

require_once 'common.php';

if (!isset($_POST['id'])) {
    header("Location: display.php");
}

$id = $_POST['id'];
// PostDAO
$postDao = new PostDAO();
$post = $postDao->get($id);

//var_dump($post);

$subject = $_POST['subject'];
$entry = $_POST['entry'];
$mood = $_POST['mood'];
$successUpdate = $postDao->update($id, $subject, $entry, $mood);

if ($successUpdate) {
    echo "<h1>Update was successful!</h1>";
} else {
    echo "Update fail";
}

echo ''
?>
<html>
<body>

<br/>
Click <a href='display.php'>here</a> to return to Main Page

</body>
</html>