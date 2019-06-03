<?php

require_once 'include/common.php';

if (!isset($_SESSION['loggedInEmail']) || !isset($_SESSION['account'])) {
    header("Location: login.php");
    exit;
}


$this_account = $_SESSION['account'];
$email = $this_account->getEmail();
$account_id = $this_account->getID();

?>

<html>
<body>

<h1>Hello, <?= $email ?> and welcome back!</h1>

<h1>Sensitive data below...</h1>

<?php

$taskDAO = new TaskDAO();
$taskDetails = $taskDAO->retrieveByAccountID($account_id);
echo "<ol>";
foreach ($taskDetails as $one_task) {
    echo "<li>{$one_task->getDescription()}</li>";
}
echo "</ol>";
?>

<h1>
    <a href='logout.php'>Log Out</a>
</h1>

</body>
</html>