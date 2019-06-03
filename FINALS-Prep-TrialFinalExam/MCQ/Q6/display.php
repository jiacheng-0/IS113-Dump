<html>

<body>

<ol>

    <?php

    if (isset($_GET['fruit'])) {
        foreach ($_GET['fruit'] as $item) {
            echo "<li>$item</li>";
        }
    } else {
        echo "<li>nothing</li>";
    }
    ?>

</ol>
</body>
</html>
