<?php
    require_once "../models/Database.php";
    require_once "../models/Veganchart.php";

    $day1 = $day2 = $day3 = $day4 = $day5 = $day6 = $day7 = "";

    if(isset($_POST['updateMeal'])){
        $id = $_POST['id'];
        $db = Database::getDb();

        $v = new Veganchart();
        $veganChart = $v->getVeganChartById($id, $db);

        $day1 = $v->day1;
        $day2 = $v->day2;
        $day3 = $v->day3;
        $day4 = $v->day4;
        $day5 = $v->day5;
        $day6 = $v->day6;
        $day7 = $v->day7;
    }

    if(isset($_POST['updateMeal'])){
        $id = $_POST['id'];
        $day1 = $_POST['day1'];
        $day2 = $_POST['day2'];
        $day3 = $_POST['day3'];
        $day4 = $_POST['day4'];
        $day5 = $_POST['day5'];
        $day6 = $_POST['day6'];
        $day7 = $_POST['day7'];

        $db = Database::getDb();
        $v = new Veganchart();
        $count = $v->updateMeal($day1, $day2, $day3, $day4, $day5, $day6, $day7, $db);

        if($count){
            header('Location: listVeganMeal.php');
        }else{
            echo "Problem";
        }
    }
?>

<?php
    include_once "../../Template/header.php";
?>

<html lang="en">
    <head>  
        <title>Vegan Chart</title>
        <meta name="description" content="7-day Vegan Diet Chart">
        <meta name="keywords" content = "Your Wellbeing, Diet Charts, Vegan Chart">
        <link rel="stylesheet" type="text/css" href="../../css/charts/updateveganchart.css">
    </head>
    <body>
        <div class="box">
            <form action="" method="POST">
                <h1><span>7-Day Vegan</span> Diet Chart</h1>
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="form-body">
                    <label for="day1">Monday :</label>
                    <input type="text" class="form-control" name="day1" id="day1" value="<?= $day1; ?>">
                    <span style="color: red;"></span>
                </div>
                <div class="form-body">
                    <label for="day2">Tuesday :</label>
                    <input type="text" class="form-control" name="day2" id="day2" value="<?= $day2; ?>">
                    <span style="color: red;"></span>
                </div>
                <div class="form-body">
                    <label for="day3">Wednesday :</label>
                    <input type="text" class="form-control" name="day3" id="day3" value="<?= $day3; ?>">
                    <span style="color: red;"></span>
                </div>
                <div class="form-body">
                    <label for="day4">Thursday :</label>
                    <input type="text" class="form-control" name="day4" id="day4" value="<?= $day4; ?>">
                    <span style="color: red;"></span>
                </div>
                <div class="form-body">
                    <label for="day5">Friday :</label>
                    <input type="text" class="form-control" name="day5" id="day5" value="<?= $day5; ?>">
                    <span style="color: red;"></span>
                </div>
                <div class="form-body">
                    <label for="day6">Saturday :</label>
                    <input type="text" class="form-control" name="day6" id="day6" value="<?= $day6; ?>">
                    <span style="color: red;"></span>
                </div>
                <div class="form-body">
                    <label for="day7">Sunday :</label>
                    <input type="text" class="form-control" name="day7" id="day7" value="<?= $day7; ?>">
                    <span style="color: red;"></span>
                </div>
                <a href="./listVeganMeal.php" id="btn" class="button">Back</a>
                <button type="submit" name="updateMeal" id="btn-submit">Update Meal</button>
            </form>
        </div>
    </body>
</html>

<?php
    include_once "../../Template/footer.php";
?>