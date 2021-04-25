<?php
    include_once "../Template/header.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Diet Planner</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/content.css"/>
        <link rel="stylesheet" type="text/css" href="../css/main.css"/> 
    </head>
    <body>
        <div class="box">
            <div class="row">
                <div class="column-66">
                    <h1 class="xlarge-font"><b>7-day Vegan Meal Plan</b></h1>
                    <p><span style="font-size: 36px;">Get your 7-day healthy vegan diet plan.</span> 
                    The most trending diet plan in the world currently is just one click away.</p>
                    <button class="button"><a href="views_veganchart/listVeganMeal.php">Get your Plan</a></button>
                </div>
                <div class="column-33">
                    <img class="img" src="./images/nordwood-themes-Tmz8FThN_BE-unsplash.jpg" width="335" height="471">
                </div>
            </div>
        </div>
        <div class="box" style="background-color: #f1f1f1;">
            <div class="row">
                <div class="column-33">
                    <img src="./images/jannis-brandt-8manzosDSGM-unsplash.jpg" width="340" height="400">
                </div>
                <div class="column-66">
                    <h1 class="xlarge-font"><b>7-day Weight Loss Meal Plan</b></h1>
                    <p><span style="font-size: 36px;">Follow Along</span> with this 7-day light and easy weight loss plan.
                    Get quick results and stay healthy always.</p>
                    <button class="button"><a href="views_weightloss/listWeightLoss.php">Get your plan</a></button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="row">
                <div class="column-66">
                    <h1 class="xlarge-font"><b>7-day Weight Gain Meal Plan</b></h1>
                    <p><span style="font-size: 36px;">Follow along</span> with this 
                    7-day weight gain meal plan and see results in 1 week.</p>
                    <button class="button"><a href="views_weightgain/listWeightGainMeal.php">Get your plan</a></button>
                </div>
                <div class="column-33">
                    <img src="./images/alex-munsell-Yr4n8O_3UPc-unsplash.jpg" width="335" height="380">
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    include_once "../Template/footer.php";
?>