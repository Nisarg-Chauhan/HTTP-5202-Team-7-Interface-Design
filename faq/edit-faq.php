<?php 

include '../template/header.php';
require_once '../Models/Database.php';
require_once '../Models/faq_db.php';

 session_start();

$question= $answer ="";

if(isset($_POST['updateFaq'])){
    $id= $_POST['id'];
    $db = Database::getDb();

    $s = new Faq();
    $f = $s->getFaqById($id, $db);

    $question =  $f->question;
    $answer =  $f->answer;


}
if(isset($_POST['updFaq'])){
    $id= $_POST['sid'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $db = Database::getDb();
    $s = new Faq();
    $count = $s->updateFaq($id, $question, $answer, $db);

    if($count){
       header('Location:  ../faq/success.php');
    } else {
        echo "ups, please try again";
    }
}

?>

<html lang="en">
<body>
<div>
    <form action="" method="post">
        <input type="hidden" name="sid" value="<?= $id; ?>" />
        <div class="form-group">
            <label for="question">Topic :</label>
            <input type="text" class="form-control" name="question" id="question" value="<?= $question; ?>"
                   placeholder="Enter Topic Name">
      </div>
        <div class="form-group">
            <label for="answer">Answer :</label>
            <input type="text" class="form-control" name="answer" id="answer" value="<?= $answer; ?>" 
                   placeholder="Enter answer">
        </div>
        <a href="../faq/faq-list.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updFaq"
                class="btn btn-primary float-right" id="btn-submit">
            Update Faq
        </button>
    </form>
</div>
</body>

    <?php 

include '../template/footer.php';
