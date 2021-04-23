<?php 

include '../template/header.php';

require_once '../Models/Database.php';
require_once '../Models/users.php';


    

    $message = $bmi = "";
  


if(isset($_POST['submit']))
    
{
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    
    //calculate();
    
    $bmi = round($weight / pow(($height/100),2),2);
    
    if($bmi < 18.5)
        {
         $message = "You are underweight.";
        }
        else if($bmi >=18.5 && $bmi <= 24.9)
        {
         $message = "Congrats!!! You have normal weight.";
        }
        else if($bmi >24.9 && $bmi <=29.9)
        {
         $message = "You are overweight.";
        }
        else
        {
         $message = "Be careful!!! You are obese.";
        } 
    
    $_SESSION['your_weight'] = $weight;
    $_SESSION['your_height'] = $height;
    $_SESSION['your_bmi'] = $bmi;
    
    
}

 
?>
    



<link rel="stylesheet" href="../css/bmi.css" type="text/css">

<main class="container">
    <div class="text_area">
    <h3>How to calculate Body Mass Index</h3>
    
    
    <p>Body Mass Index is a simple calculation using a person’s height and weight. The formula is BMI = kg/m2 where kg is a person’s weight in kilograms and m2 is their height in metres squared.</p> 
    <p>A BMI of 25.0 or more is overweight, while the healthy range is 18.5 to 24.9. BMI applies to most adults 18-65 years.</p>

    <h3>Who shouldn't use a BMI calculator</h3>
    <p>BMI is not used for muscle builders, long distance athletes, pregnant women, the elderly or young children. This is because BMI does not take into account whether the weight is carried as muscle or fat, just the number. Those with a higher muscle mass, such as athletes, may have a high BMI but not be at greater health risk. Those with a lower muscle mass, such as children who have not completed their growth or the elderly who may be losing some muscle mass may have a lower BMI. During pregnancy and lactation, a woman's body composition changes, so using BMI is not appropriate.</p>
    </div>
        <h3 id="check">Check your BMI</h3>
    <div class="row justify-content-sm-center">
        <div class="col col-sm-8 col-lg-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="height">Height in cm:</label>
                    <input type="number" class="form-control" name="height" id="height" placeholder="Enter your height">
                </div>
                <div class="form-group">
                    <label for="weight">Weight in kg:</label>
                    <input type="number" class="form-control"  name="weight" id="weight" placeholder="Enter your weight">
                </div>
                <button type="submit" name="submit" class="button">Calculate</button>
                <div>
                    <h4 class="bmi-result"> Your BMI is: <?php  echo $bmi; ?> </h4>
                    <p class="bmi-result"> <?php  echo $message; ?> </p>
                </div> 
                 <?php 
          
          if(isset($_SESSION['login'])){
              echo '<p style="float:left;"><a href="../login/personal.php">Go Back</a></p>';
          } ?>
            </form>
            
        </div>
    </div>
</main>

<?php include '../template/footer.php'  ?>
