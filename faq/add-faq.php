<?php 
   
    include '../header.php';
    require_once '../Models/Database.php';
    require_once '../Models/faq_db.php';
    


if(isset($_POST['addFaq'])){
    
    
    $id= $_POST['id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $db = Database::getDb();
    $s = new Faq();
    $count = $s->addFaq($question, $answer, $db);

    if($count){
       header('Location:  ../faq/faq-list.php');
    } else {
        echo "Ups, some problems";
    }
}


?>

<html lang="en">


<body style="background-color:white;">

<div>
   
    <form action="" method="post">
        <input type="hidden" name="sid" value="" />
        <div class="form-group">
            <label for="question">Topic :</label>
            <input type="text" class="form-control" name="question" id="question" value=""
                   placeholder="Enter Topic Name">
            
        </div>
        <div class="form-group">
            <label for="answer">Answer :</label>
            <input type="text" class="form-control" name="answer" id="answer" value="" 
                   placeholder="Enter answer">
            
        </div>
        
        <a href="../faq/success.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button style="margin: 20px 0 0 150px;" type="submit" name="addFaq"
                class="btn btn-primary float-left" id="btn-submit">
            Add FAQ
        </button>
    </form>
</div>


</body>

    
   <?php include '../footer.php'; ?>
