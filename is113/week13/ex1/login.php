<?php
require_once 'include/common.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Log In</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

</head>

<body class="text-center">
<form class="form-signin" action="process_login.php" method="POST">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" alt="" width="72"
         height="72">

    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

    <?php
    // Check if there are any errors
    // Display error messages (if any)
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        echo "<p style='color: red'>$errors</p>";
        unset($_SESSION['errors']);
    }
    //        if( count($errors) > 0 ) {
    //            echo "
    //                        <ul>
    //                    ";
    //
    //            foreach($errors as $err) {
    //                echo "
    //                            <li>$err</li>
    //                        ";
    //            }
    //
    //            echo "
    //                        </ul>
    //                    ";
    //        }

    // Unset 'errors' Session variable


    ?>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required
           autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

</form>
</body>
</html>