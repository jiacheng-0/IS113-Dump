<?php
require_once 'common.php';

// WRITE YOUR CODES HERE

$username = $_SESSION['login_page'] ?? "";
$password = $_SESSION['login_page_password'] ?? "";
?>

<html>
<body>
<h1>Welcome ! Login Page</h1>

<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>

<form action="process_login.php" method="post">
    <table>
        <tr>
            <th>Username</th>
            <td><input name="username" value='<?php echo $username ?>'/></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="password" name="password" value='<?php echo $password ?>'/></td>
        </tr>
    </table>
    <br/>
    <input type="submit" value="Login"/>
</form>

<?php printErrors(); ?>

</body>
</html>