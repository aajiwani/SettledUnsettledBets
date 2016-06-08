<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/7/2016
 * Time: 5:53 PM
 */

?>

<html>
<title>Settled / Unsettled Bets</title>
<body>
    <form action="calculate_risk.php" method="post" enctype="multipart/form-data">
        Settled File:
        <input type="file" name="settled_file" />
        <br />
        <br />
        Un-Settled File:
        <input type="file" name="unsettled_file" />

        <br />
        <br />
        <input type="submit" value="Calculate Risk" name="submit">
    </form>
</body>
</html>