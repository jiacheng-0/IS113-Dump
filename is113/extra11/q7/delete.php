<?php

require_once 'common.php';

$postDao = new PostDAO();

if (!isset($_GET['id'])) {

    // push webpage into maintain_menu.php
    header("Location: display.php");
}

?>

<html>
<body>

<form method='POST'>

    <?php

    $id = $_GET['id'];
    $post = $postDao->get($id);

    $subject = $post->getSubject();
    $entry = $post->getEntry();
    $mood = $post->getMood();
    $create_time = $post->getCreateTimestamp();
    $update_time = $post->getUpdateTimestamp();

    if (isset($_POST['action']) and $_POST['action'] = 'Confirm Delete') {
        $status = $postDao->delete($id);
        if ($status) {
            echo "<h3>Delete was successful!</h3>";
        } else {
            echo "<h3>Delete was NOT successful!</h3>";
        }
    } else {
        echo "
                <table border='1'>
                    <tr>
                        <td> subject </td> <td> $subject </td> 
                    </tr>
                    <tr>
                        <td> entry </td> <td> $entry </td>
                    </tr>
                    <tr>
                        <td> mood </td> <td> $mood </td> <br>
                    </tr>
                    <tr> 
                        <td> current timestamp </td> <td> $create_time </td> 
                    </tr>
                    <tr> 
                        <td> update timestamp </td> <td> $update_time </td> 
                    </tr>
                </table>
                <br/>";

        echo "<input type='submit' name='action' value='Confirm Delete'/>
<br/>
";
    }

    ?>

</form>

<hr>
Click <a href='display.php'>here</a> to return to Main Page

</body>
</html>