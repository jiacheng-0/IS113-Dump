<?php
var_dump($_GET);
if (isset($_GET['hug'])) {
    echo 'Hug You';
} elseif (isset($_GET['call'])) {
    echo 'Call You';
}
?>
<html>
<body>
<h1>Justin My Love</h1>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method='GET'>
    <input type='submit' name='hug' value='Hug Me'>
    <input type='submit' name='call' value='Call Me'>
</form>

</body>
</html>