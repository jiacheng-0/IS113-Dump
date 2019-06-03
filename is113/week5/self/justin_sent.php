<?php
var_dump($_GET);
$msg = '';
if( isset($_GET['hug']) ) {
    $msg = 'Hug You';
}
?>
<html>
<body>
<?php
    echo "<h1>$msg</h1>";
?>

</body>
</html>