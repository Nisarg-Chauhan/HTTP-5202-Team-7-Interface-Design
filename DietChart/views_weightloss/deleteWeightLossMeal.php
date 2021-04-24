<?php
    require_once "../models/Database.php";
    require_once "../models/WeightLossChart.php";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $db = Database::getDb();

        $wl = new WeightLossChart();
        $count = $wl->deleteWeightLossMeal($id, $db);
        if($count){
            header("Location: listWeightLoss.php");
        }else{
            echo "Problem Deleting";
        }
    }
?>