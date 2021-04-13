<?php include 'header.php';
    session_start();

    $message = "";
  

/*function calculate() 
{
  
  echo  $GLOBALS['message'] = round($GLOBALS['weight'] / pow(($GLOBALS['height']/'100'),2),2);        

} */


if(isset($_POST['submit']))
    
{
   $weight = $_POST['weight'];
    $height = $_POST['height'];
    
    //calculate();
    
    $message = round($weight / pow(($height/100),2),2);
    
    $_SESSION['your_weight'] = $weight;
    $_SESSION['your_height'] = $height;
    $_SESSION['your_bmi'] = $message;
    
} 
 
?>
    



<link rel="stylesheet" type="text/css" href="./css/bmi.css">

<main class="container planner">
    <h1>Body Mass Index Calculator</h1>
    <div class="row justify-content-sm-center">
        <div class="col col-sm-8 col-lg-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="height">Enter your height:</label>
                    <input type="number" class="form-control" name="height" id="height" placeholder="Enter your height">
                    <select class="data" name="heightunits" id="heightunits">    
                        <option class="option" value="metres" selected="selected">metres</option>
                        <option class="option" value="inches">inches</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="weight">Enter your weight:</label>
                    <input type="number" class="form-control"  name="weight" id="weight" placeholder="Enter your weight">
                    <select class="data" name="weightunits" id="weightunits">
                        <option value="kg" selected="selected">kilograms</option>
                        <option value="lb">pounds</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="button">Calculate</button>
                <div>
                    <h4 class="bmi-result"> Your BMI is: <?php  echo $message; ?> </h4>
                </div> 
                 <?php 
          
          if(isset($_SESSION['login'])){
              echo '<p style="float:left;"><a href="personal.php">Go Back</a></p>';
          } ?>
            </form>
            
        </div>
    </div>
</main>

<?php include 'footer.php'  ?>