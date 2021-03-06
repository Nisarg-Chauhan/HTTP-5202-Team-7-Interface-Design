<?php
    require_once "../models/Database.php";
    require_once "../models/WeightGainChart.php";

    if(isset($_POST['addWeightGainMeal'])){
        $day1 = $_POST['day1'];
        $day2 = $_POST['day2'];
        $day3 = $_POST['day3'];
        $day4 = $_POST['day4'];
        $day5 = $_POST['day5'];
        $day6 = $_POST['day6'];
        $day7 = $_POST['day7'];

        $db = Database::getDb();
        $wg = new WeightGainChart();
        $c = $wg->addWeightGainMeal($day1, $day2, $day3, $day4, $day5, $day6, $day7, $db);

        if($c){
            echo "Added weight gain meal successfully";
        }else{
            echo "Problem adding meal";
        }
    }
?>

<?php
    include_once "../../template/header.php";
?>

<html lang="en">
    <head>
        <title>Weight Gain Meal</title>
        <meta name="description" content="7-day Weight Gain Meal Plan">
        <meta name="keywords" content = "Your Wellbeing, Diet Charts, Weight Gain Meal">
        <link rel="stylesheet" type="text/css" href="../../css/charts/addweightgain.css">
    </head>
    <body>
    <div class="box">
            <form action="" method="POST">
                <h1><span>7-Day Weight Gain</span> Meal Plan</h1>
                <div class="form-body">
                    <label for="day1">Monday :</label>
                    <input type="text" class="form-control" name="day1" id="day1" value="">
                    <span style="color: red;"></span>
                </div>
                <div class="form-body">
                    <label for="day2">Tuesday :</label>
                    <input type="text" class="form-control" name="day2" id="day2" value="">
                    <span style="color: red;"></span>
                </div>
                <div class="form-body">
                    <label for="day3">Wednesday :</label>
                    <input type="text" class="form-control" name="day3" id="day3" value="">
                    <span style="color: red;"></span>
                </div>
                <div class="form-body">
                    <label for="day4">Thursday :</label>
                    <input type="text" class="form-control" name="day4" id="day4" value="">
                    <span style="color: red;"></span>
                </div>
                <div class="form-body">
                    <label for="day5">Friday :</label>
                    <input type="text" class="form-control" name="day5" id="day5" value="">
                    <span style="color: red;"></span>
                </div>
                <div class="form-body">
                    <label for="day6">Saturday :</label>
                    <input type="text" class="form-control" name="day6" id="day6" value="">
                    <span style="color: red;"></span>
                </div>
                <div class="form-body">
                    <label for="day7">Sunday :</label>
                    <input type="text" class="form-control" name="day7" id="day7" value="">
                    <span style="color: red;"></span>
                </div>
                <a href="./listWeightGainMeal.php" id="btn" class="button">Back</a>
                <button type="submit" name="addWeightGainMeal" id="btn-submit">Add Meal</button>
            </form>
        </div>
    </body>
</html>

<?php
    include_once "../../template/footer.php";
?>