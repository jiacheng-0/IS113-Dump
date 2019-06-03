<?php

require_once 'common.php';

// YOUR CODE GOES HERE
// PostDAO object?

$postDAO = new PostDAO();
$posts = $postDAO->getAll();

?>
<html>
<body>

<?php
echo "<h1>My Blog Posts</h1>";

echo "
            <table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Create Timestamp</th>
                    <th>Last Update Timestamp</th>
                    <th>Subject</th>
                    <th>Edit Link</th>
                    <th>Delete Link</th>
                </tr>
        ";

if(isset($posts)) {
    foreach ($posts as $one_post) {
        echo "
                <tr>
                    <td>" . $one_post->getID() . "</td>
                    <td>" . $one_post->getCreateTimestamp() . "</td>
                    <td>" . $one_post->getUpdateTimestamp() . "</td>
                    <td>" . $one_post->getSubject() . "</td>
                    <td>" . "<a href='edit.php?id={$one_post->getID()}'>Edit</a>" . "</td>
                    <td>" . "<a href='delete.php?id={$one_post->getID()}'>Delete</a>" . "</td>
                </tr>
        ";
    }
}

echo "
            </table>
        ";


?>

<a href='add.html'><h3>Add a New Blog Post</h3></a>

</body>
</html>