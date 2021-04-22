<?php 
    include '../header.php'; 
    require_once '../Models/Database.php';
    require_once '../Models/faq_db.php';
    
    $dbcon = Database::getDb();
    $item = new Faq();
    $new =  $item->getAllFaqs($dbcon);
    
?>


<main style="background-color:white;" class="container user">
	
	<h3>Frequently Asked Questions list</h3>
	
	
	<table class="table table-bordered tbl">
        <thead>
        <tr>
            <th style="width:30px; text-align:center;">Registration number</th>
            <th>Topic name</th>
            <th>Answer</th>            
            <th>Update</th>
            <th>Delete</th>
            
        </tr>
        </thead>
        <tbody>
         <?php foreach ($new as $news) { ?>
            <tr>
                <th style= "text-align:center;"><?= $news->id; ?></th>
                <td><?= $news->question; ?></td>
                <td><?= $news->answer; ?></td>                
                <td>
                    <form action="./edit-faq.php" method="post">
                        <input type="hidden" name="id" value="<?= $news->id; ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateFaq" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="./delete-faq.php" method="post">
                        <input type="hidden" name="id" value="<?=  $news->id; ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteUser" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="./add-faq.php" id="btn_addFaq" class="btn btn-success btn-lg float-right">Add FAQ</a>
	
	
</main>		

<?php include '../footer.php'; ?>