<html>
<body>

<ol>

    <?php
    /**
     * Created by PhpStorm.
     * User: Teo Jia Cheng
     * Date: 17/4/2019
     * Time: 5:04 PM
     */
    if (isset($_POST['fruit'])) {
        foreach ($_POST['fruit'] as $item) {
            echo "<li>$item</li>";
        }
    }
    ?>

</ol>
</body>
</html>


