<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/7/2016
 * Time: 5:53 PM
 */

require_once('vendor/autoload.php');
use AppCode\UserTuple;

?>

<html>
<title>Settled / Unsettled Bets</title>
<body>
    <form action="calculate_risk.php" method="post" enctype="multipart/form-data">
        Settled File:
        <input type="file" name="settled_file" />
        <br />
        Un-Settled File:
        <input type="file" name="unsettled_file" />

        <input type="submit" value="Calculate Risk" name="submit">
    </form>
</body>
</html>

<?php

$user = new UserTuple();
var_dump($user);

?>