<?php
    require_once "../models/Database.php";
    require_once "../models/WeightGainChart.php";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $db = Database::getDb();

        $wg = new WeightGainChart();
        $count = $wg->deleteWeightGainMeal($id, $db);
        if($count){
            header("Location: listWeightGainMeal.php");
        }else{
            echo "Problem Deleting";
        }
    }
?>