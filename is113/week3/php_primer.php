<html>
<head>
    <title>Week 3 - php_primer.php</title>
</head>
<body>

    <h1>PHP Primer</h1>
    <h2>My current location: (/is113/week3/php_primer.php)</h2>

    <hr>
    <h3>I'm still inside HTML. I'm going to ask PHP to say "Hello World!!!"</h3>
    <?php
        echo "Hello World!!! echo is like print in python!";
    ?>

    <hr>
    <h3>I'm back in HTML now! Isn't it wonderful... you can embed PHP inside HTML.</h3>

    <?php
        echo "I'm back inside PHP. Isn't it great? I can write PHP ANYWHERE...";
        echo "<br>";
        echo "See? I can even WRITE HTML... as strings... inside PHP.<br>";
    ?>

    <hr>
    <h3>I'm back in HTML now!.</h3>
    <h3>PHP can get Date/Time and day-of-the-week for you</h3>
    <?php
        date_default_timezone_set("Asia/Singapore");
        echo "Today is " . date("d-m-Y") . "<br>";
        echo "Time is " . date("h:i:sa") . "<br>";
        echo "AND today is " . date("l") . "<br>";
    ?>

    <h3>Shall we now talk about different data types in PHP?</h3>
    <?php
        // Strings
        // echo
        // Numbers
        // Boolean
        // Array
        // Associative Array
        // Foreach
        // For
        // if, elseif, else
        // && (and), || (or)
        /* Nice utility functions
           var_dump($var)
           print_r($var)
           exit
           die
           return
        */
    ?>

    <hr>
    <h3>Hey! I'm back in HTML again!</h3>

</body>
</html>