
<?php
    require_once "../models/Database.php";
    require_once "../models/Veganchart.php";

    if(isset($_POST['addVeganMeal'])){
        $day1 = $_POST['day1'];
        $day2 = $_POST['day2'];
        $day3 = $_POST['day3'];
        $day4 = $_POST['day4'];
        $day5 = $_POST['day5'];
        $day6 = $_POST['day6'];
        $day7 = $_POST['day7'];

        $db = Database::getdb();
        $v = new Veganchart();
        $c = $v->addMeal($day1, $day2, $day3, $day4, $day5, $day6, $day7, $db);

        if($c){
            echo "Added vegan meal successfully";
        } else{
            echo "Problem adding meal";
        }
    }
?>
<?php
    include_once "../../template/header.php";
?>
<html lang="en">
    <head>  
        <title>Vegan Chart</title>
        <meta name="description" content="7-day Vegan Diet Chart">
        <meta name="keywords" content = "Your Wellbeing, Diet Charts, Vegan Chart">
        <link rel="stylesheet" type="text/css" href="../../css/charts/addveganchart.css">
    </head>

    <body>
        <div class="box">
            <form action="" method="POST">
                <h1><span>7-Day Vegan</span> Diet Chart</h1>
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
                <a href="./listVeganMeal.php" id="btn" class="button">Back</a>
                <button type="submit" name="addVeganMeal" id="btn-submit">Add Meal</button>
            </form>
        </div>
    </body>
</html>

<?php
    include_once "../../template/footer.php";
?>