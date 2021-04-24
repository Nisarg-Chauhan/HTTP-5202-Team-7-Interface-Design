<?php
    require_once "../models/Database.php";
    require_once "../models/WeightGainChart.php";

    $dbcon = Database::getDb();
    $wg = new WeightGainChart();
    $weightGain = $wg->getWeightGainChart(Database::getDb());
?>

<?php
    include_once "../../Template/header.php";
?>

<html lang="en">
    <head>
        <title>Weight Gain Chart</title>
        <meta name="description" content="7-day Weight Gain Meal Plan">
        <meta name="keywords" content = "Your Wellbeing, Diet Charts, Weight Gain Meal Plan">
        <link rel="stylesheet" type="text/css" href="../../css/charts/listweightgainchart.css">
    </head>
    <body>
    <h1><span>Weight Gain</span> Meal Plan</h1>
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
                    <?php foreach($weightGain as $wgc) { ?>
                        <tr>
                            <td><?= $wgc->day1; ?></th>
                            <td><?= $wgc->day2; ?></th>
                            <td><?= $wgc->day3; ?></th>
                            <td><?= $wgc->day4; ?></th>
                            <td><?= $wgc->day5; ?></th>
                            <td><?= $wgc->day6; ?></th>
                            <td><?= $wgc->day7; ?></th>
                            <td>
                                <form action="./updateWeightGainMeal.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $wgc->id; ?>"/>
                                    <input type="submit" name="updateWeightGainMeal" value="Update"/>
                                </form>
                            </td>
                            <td>
                                <form action="./deleteWeightGainMeal.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $wgc->id; ?>"/>
                                    <input type="submit" name="deleteWeightGainMeal" value="Delete"/>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="./addWeightGainMeal.php" id="btn_addMeal">Add Meal</a>
        </div>
    </body>
</html>

<?php
    include_once "../../Template/footer.php";
?>