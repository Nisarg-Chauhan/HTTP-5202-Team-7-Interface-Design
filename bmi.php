<?php include 'header.php';
   
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $message = "";

function calculate() 
{
  
  echo  $GLOBALS['message'] = round($GLOBALS['weight'] / pow(($GLOBALS['height']/'100'),2),2);        

} 


if(isset($_POST['submit']))
{
    calculate();
    
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
                    <select>    
                        <option value="metres" selected="selected">metres</option>
                        <option value="inches">inches</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="weight">Enter your weight:</label>
                    <input type="number" class="form-control"  name="weight" id="weight" placeholder="Enter your weight">
                    <select type="multiple" id="weightunits">
                        <option value="kg" selected="selected">kilograms</option>
                        <option value="lb">pounds</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="button">Calculate</button>
                <div>
                    <h4> Your BMI is: <?php echo $GLOBALS['message'] ?> </h4>
                </div>  
            </form>
            
        </div>
    </div>
</main>

<?php include 'footer.php'  ?>