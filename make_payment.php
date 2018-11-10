<?php

$email = ltrim(rtrim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING)));
$name = ltrim(rtrim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING)));
$artist = ltrim(rtrim(filter_input(INPUT_POST, "artist", FILTER_SANITIZE_STRING)));
$title = ltrim(rtrim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING)));
$numberOfProductA = filter_input(INPUT_POST, "numberOfProductA", FILTER_SANITIZE_NUMBER_INT);
$paymentAmount = filter_input(INPUT_POST, "paymentAmount", FILTER_SANITIZE_NUMBER_INT);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Backstage - Store</title>  
        <link rel="stylesheet" href="assets/demo.css">
        <link rel="stylesheet" href="assets/form-validation.css">
        <link rel="stylesheet" href="assets/awesome.css">
        <link rel="stylesheet" href="./assets/progress-wizard.min.css"  type="text/css"/>
        <link href="assets/main.css" rel="stylesheet"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="./assets/dkit.png">
    </head>
    <style>
        progress
        {
            width: 100%;
        }
         progress {
                display: block; /* default: inline-block */
                margin: 2em auto;
                padding: 4px;
                border: 0 none;
                background: #444;
                border-radius: 14px;
                box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
            }
            progress::-moz-progress-bar {
                border-radius: 12px;
                background: #FFF;
                box-shadow: inset 0 -2px 4px rgba(0,0,0,0.4), 0 2px 5px 0px rgba(0,0,0,0.3);

            }
            /* webkit */
            @media screen and (-webkit-min-device-pixel-ratio:0) {
                progress {
                    height: 25px;
                }
            }
            progress::-webkit-progress-bar {
                background: transparent;
            }  
            progress::-webkit-progress-value {  
                border-radius: 12px;
                background: #FFF;
                box-shadow: inset 0 -2px 4px rgba(0,0,0,0.4), 0 2px 5px 0px rgba(0,0,0,0.3); 
            } 
        #span1{
            margin-left: 60px;
            color:#bd2130;
        }
        #span2
        {
            margin-left: 100px;
            color:#bd2130;
        }
        #span3
        {
            margin-left: 100px;
            color:#bd2130;
        }
    </style>
    <body>
        <br>
        <br>
        <div class="main-content">

            <form class="form-validation" id="dor_payment_form">
                <h2><a href="index.php"><img style="vertical-align: middle;height:2.5em" src="IMG/bs.png" alt=""/></a>store</h2>

                <!-- Progress Bar -->
                <div class="progress_indicator_container">
                    <span id="span1">Register</span>
                    <span id="span2">Payment</span>
                    <span id="span3">Confirmation</span>
                    <progress value="6.6" max="10">60 %</progress>
                </div>
                <!-- End of Progress Bar -->

                <label>Name: </label>
                <input type="text" value = "<?php echo $name ?>" tabIndex="-1" readonly><br><br>

                <label>Email: </label>
                <input type="text" value = "<?php echo $email ?>" tabIndex="-1" readonly><br><br>

                <label>Artist: </label>
                <input type="text" value = "<?php echo $artist ?>" tabIndex="-1" readonly><br><br>

                <label>Title: </label>
                <input type="text" value = "<?php echo $title ?>" tabIndex="-1" readonly><br><br>
                
                <label>Total Price: </label>
                <input type="text" value = "€<?php echo $paymentAmount ?>" tabIndex="-1" readonly><br><br>
            </form>


            <form  action="payment_confirmation.php" style="text-align: center" method="post">
                <input type="hidden" name = "name" value = "<?php echo $name ?>">
                <input type="hidden" name = "email" value = "<?php echo $email ?>">
                <input type="hidden" name = "artist" value = "<?php echo $artist ?>">
                <input type="hidden" name = "album" value = "<?php echo $album ?>">
                <input type="hidden" name = "numberOfProductA" value = "<?php echo $numberOfProductA ?>">
                <input type="hidden" name = "numberOfProductB" value = "<?php echo $numberOfProductB ?>">
                <input type="hidden" name = "paymentAmount" value = "<?php echo $paymentAmount ?>">

                <?php require_once 'configuration.php'; ?>
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"    

                    data-key="<?php echo $publicStripeKey ?>"
                    data-email= "<?php echo $email ?>"
                    data-currency="EUR"
                    data-amount="<?php echo $paymentAmount . '00' ?>"
                    data-name="BackStage"
                    data-description="For the music lovers"
                    data-image="./IMG/albums.jpg"
                    data-locale="auto">
                </script>

            </form>
            <form style="text-align: center">
                <button type="button" class ="cancel_button" onclick = "window.history.back()"><span>Change Details</span></button>
            </form><br>

        </div> 
    </body>
</html>