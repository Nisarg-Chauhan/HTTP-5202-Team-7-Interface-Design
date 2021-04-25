<?php
    require_once "../models/Database.php";
    require_once "../models/WeightLossChart.php";

    $dbcon = Database::getDb();
    $wl = new WeightLossChart();
    $weightLoss = $wl->getWeightLossChart(Database::getDb());
?>

<?php
    include_once "../../template/header.php";
?>

<html lang = "en">
    <head>
        <title>Weight Loss Chart</title>
        <meta name="description" content="7-day Weight Loss Diet Chart">
        <meta name="keywords" content = "Your Wellbeing, Diet Charts, Weight Loss Chart">
        <link rel="stylesheet" type="text/css" href="../../css/charts/listweightloss.css">
    </head>
    <body>
        <h1><span>Weight Loss</span> Meal Plan</h1>
        <div class="wrap">
            <table class="tbl-design">
                <thead class="tbl-head">
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                </thead>
                <tbody class="tbl-body">
                    <?php foreach($weightLoss as $wlc) { ?>
                        <tr>
                            <td><?= $wlc->day1; ?></th>
                            <td><?= $wlc->day2; ?></th>
                            <td><?= $wlc->day3; ?></th>
                            <td><?= $wlc->day4; ?></th>
                            <td><?= $wlc->day5; ?></th>
                            <td><?= $wlc->day6; ?></th>
                            <td><?= $wlc->day7; ?></th>
                            <td>
                                <form action="./updateWeightLossMeal.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $wlc->id; ?>"/>
                                    <input type="submit" name="updateWeightLossMeal" value="Update"/>
                                </form>
                            </td>
                            <td>
                                <form action="./deleteWeightLossMeal.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $wlc->id; ?>"/>
                                    <input type="submit" name="deleteWeightLossMeal" value="Delete"/>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="./addWeightLossMeal.php" id="btn_addMeal">Add Meal</a>
        </div>
    </body>
</html>

<?php
    include_once "../../template/footer.php";
?>