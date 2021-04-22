<?php 

    include '../header.php';
    require_once '../Models/Database.php';
    require_once '../Models/users.php';
    
    session_start();
    
    if(!isset($_SESSION['login']) || strtolower($_SESSION['role'])!='admin'){

        header("location:../login/login.php");
    }
    

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $db = Database::getDb();

        $s = new User();
        $count = $s->deleteUser($id, $db);
        if($count){
            header("Location: ../login/success.php");
        }
        else {
            echo " ups, please try again";
        }


    }

     


 include '../footer.php'; ?>
