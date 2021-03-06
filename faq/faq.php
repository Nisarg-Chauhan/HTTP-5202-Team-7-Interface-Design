<?php 

    include '../template/header.php'; 
    require_once '../Models/Database.php';
    require_once '../Models/faq_db.php';
    
    $dbcon = Database::getDb();
    $blog = new Faq();
    $faqs =  $blog->getAllFaqs($dbcon);
    
?>

<link rel="stylesheet" type="text/css" href="../css/faq.css">
<div style="height:700px;" class="container planner">
<h2>Frequently Asked Questions</h2>
<section class="faq-block" id="faq-main">
   <div class="container">
      <?php 
        print '<dl class="mylist">';
        foreach ($faqs as $item) {
            
            print '<dt><b>' . $item->question . '</b></dt></b>';
            print '<dd>' . $item->answer . '</dd></b>';
        }
       
       print '</dl>';
                             
       ?>
   </div>
</section>
</div>

<?php include '../template/footer.php'; ?>
