<?php
    require_once "../models/Database.php";
    require_once "../models/Veganchart.php";

    $dbcon = Database::getDb();
    $v = new Veganchart();
    $veganChart = $v->getVeganChart(Database::getDb());
?>

<?php
    include_once "../../Template/header.php";
?>

<html lang="en">
    <head>
        <title>Vegan Chart</title>
        <meta name="description" content="7-day Vegan Diet Chart">
        <meta name="keywords" content = "Your Wellbeing, Diet Charts, Vegan Chart">
        <link rel="stylesheet" type="text/css" href="../../css/charts/listveganchart.css">
    </head>
    <body>
        <h1><span>7-Day Vegan</span> Meal Plan</h1>
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
                    <?php foreach($veganChart as $vc) { ?>
                        <tr>
                            <td><?= $vc->day1; ?></th>
                            <td><?= $vc->day2; ?></th>
                            <td><?= $vc->day3; ?></th>
                            <td><?= $vc->day4; ?></th>
                            <td><?= $vc->day5; ?></th>
                            <td><?= $vc->day6; ?></th>
                            <td><?= $vc->day7; ?></th>
                            <td>
                                <form action="./updateVeganMeal.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $vc->id; ?>"/>
                                    <input type="submit" name="updateVeganMeal" value="Update"/>
                                </form>
                            </td>
                            <td>
                                <form action="./deleteVeganMeal.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $vc->id; ?>"/>
                                    <input type="submit" name="deleteVeganMeal" value="Delete"/>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="./addVeganMeal.php" id="btn_addMeal">Add Meal</a>
        </div>
    </body>
</html>

<?php
    include_once "../../Template/footer.php";
?>