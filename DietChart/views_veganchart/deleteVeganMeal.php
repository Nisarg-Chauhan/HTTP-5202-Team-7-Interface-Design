<?php
    require_once "../models/Database.php";
    require_once "../models/Veganchart.php";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $db = Database::getDb();

        $v = new Veganchart();
        $count = $v->deleteMeal($id, $db);
        if($count){
            header("Location: listVeganMeal.php");
        }else{
            echo "Problem Deleting";
        }
    }
?>