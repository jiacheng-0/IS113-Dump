<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Lab Test 1 Grade Lookup</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>

<body class="text-center">

<nav class="navbar navbar-light bg-light">

    <form class="form-inline" action='verify.php' method='POST'>

        <input type="email" class="form-control mr-sm-2" placeholder="Enter Valid SMU Email" name='email'
               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search My Lab Test 1 Grade</button>

    </form>

</nav>

<?php
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    echo "
        <div class='alert alert-primary' role='alert'>
            Unable to locate $email in Grade Book OMG
        </div>
    ";
}
?>
<a href='search.php' style="color: grey">Home</a>

</body>
</html>