<?php

    include '../template/header.php';
    require_once '../Models/Database.php';
    require_once '../Models/faq_db.php';
    
    session_start();
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $db = Database::getDb();

        $s = new Faq();
        $count = $s->deleteFaq($id, $db);
        if($count){
            header("Location: ../faq/success.php");
        }
        else {
            echo " problem deleting";
        }
    }

 include '../template/footer.php' ;?>
