<?php
    session_start();
?>
<html>
<body>

<?php


?>


<h2>Vote Today!</h2>
    <form method='GET' action='process_vote.php'>

        Your age: <input type='text' name='age'><br>
        Your gender: <input type='radio' name='gender' value='Female'>Female
        <input type='radio' name='gender' value='Male'>Male<br>

        District candidates (pick up to 2): <br>
        <input type='checkbox' name='candidates[]' value='Donald Trump'>Donald Trump<br>
        <input type='checkbox' name='candidates[]' value='Ted Cruz'>Ted Cruz<br>
        <input type='checkbox' name='candidates[]' value='Jeb Bush'>Jeb Bush<br>
        <input type='checkbox' name='candidates[]' value='Marco Rubio'>Marco Rubio<br>

        <input type='submit' value='Vote Today'>
    </form>
</body>
</html>
