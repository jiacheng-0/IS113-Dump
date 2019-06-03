<?php

require_once 'common.php';

if (!isset($_GET['id'])) {
    header("Location: display.php");
}

// How do you retrieve 'id' passed to edit.php?
// GET? POST?
$id = $_GET['id'];
// PostDAO object?
$postDao = new PostDAO();
$post = $postDao->get($id);

?>
<html>
<body>

<form action='update.php' method='POST'>
    <?php
    if (isset($post)) {
        echo "<input type='hidden' name='id' value='" . $post->getID() . "'>";
        echo "Create Timestamp: " . $post->getCreateTimestamp() . "   <br/>
";
        echo "    Last Update Timestamp: " . $post->getUpdateTimestamp() . "   <br/>
";
        echo "    Subject: <input type='text' name='subject' value='{$post->getSubject()}'>" . "    <br/>";
        echo "    Entry: <br/><textarea name='entry' rows='5' style='width: 400px'>" . $post->getEntry() . "</textarea>";

    }
    ?>
    <br/>
    Mood:
    <select name="mood">
        <?php
        $moods = ['Happy', 'Neutral', 'Sad', 'Angry'];
        foreach ($moods as $one_mood) {
            $checked = $one_mood == $post->getMood() ? " selected" : "";
            echo "<option$checked>$one_mood</option>";
        }
        ?>
    </select>
    <br/>
    <br/>

    <input type="submit" value="Update Info">

</form>

<hr>
Click <a href='display.php'>here</a> to return to Main Page

</body>
</html>