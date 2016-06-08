<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 1:02 PM
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Risk Result</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Risk result that were computed from the given set of data are as follows</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Customer</th>
            <th>Event</th>
            <th>Participant</th>
            <th>Stake</th>
            <th>To Win</th>
            <th>Risk Type</th>
            <th>Wins</th>
            <th>Losses</th>
            <th>Average Bets</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($result as $row)
            {
                $resultTypeStr = "";
                $rowClass = "";

                switch ($row->GetRiskType())
                {
                    case \AppCode\RiskModule\RiskType::RISKY:
                        $rowClass = "danger";
                        $resultTypeStr = "risky";
                        break;
                    case \AppCode\RiskModule\RiskType::UNUSUAL:
                        $rowClass = "danger";
                        $resultTypeStr = "unusual";
                        break;
                    case \AppCode\RiskModule\RiskType::HIGHLY_UNUSUAL:
                        $rowClass = "danger";
                        $resultTypeStr = "highly unusual";
                        break;
                    case \AppCode\RiskModule\RiskType::OTHER_UNUSUAL:
                        $rowClass = "danger";
                        $resultTypeStr = "other unusual";
                        break;
                    default:
                        $rowClass = "success";
                        $resultTypeStr = "none";
                        break;
                }

                $data = $row->GetAssociatedData();
                $history = $row->GetCustomerHistory();
        ?>
                <tr class="<?php echo $rowClass; ?>">
                    <td><?php echo $data->customer; ?></td>
                    <td><?php echo $data->event; ?></td>
                    <td><?php echo $data->participant; ?></td>
                    <td><?php echo $data->stake; ?></td>
                    <td><?php echo $data->win; ?></td>
                    <td><?php echo $resultTypeStr ?></td>
                    <td><?php echo $history->GetTotalWins() ?></td>
                    <td><?php echo $history->GetTotalLosses() ?></td>
                    <td><?php echo $history->GetAverageBet() ?></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>