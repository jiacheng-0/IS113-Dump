<!-- Combination of justin.html and justin_sent.php -->

<?php
echo "<pre>";
var_dump($_GET);
echo "</pre>";
if( isset($_GET['hug']) ) {
    echo 'Hug You';
}
?>
<html>
<body>
<h1>Justin My Love</h1>
<form action="justin2.php" method='GET'>
    <input type='submit' name='hug' value='Hug Me'>
</form>

</body>
</html>