<?php
$stripeToken = ltrim(rtrim(filter_input(INPUT_POST, "stripeToken", FILTER_SANITIZE_STRING)));
if (empty($stripeToken)) {
    header("location: index.php"); // deal with invalid input
    exit();
}

$email = ltrim(rtrim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING)));
if (empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
    header("location: index.php"); // deal with invalid input
    exit();
}

$name = ltrim(rtrim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING)));
if (empty($name) || (!filter_var($name))) {
    header("location: index.php"); // deal with invalid input
    exit();
}
$artist = ltrim(rtrim(filter_input(INPUT_POST, "artist", FILTER_SANITIZE_STRING)));
if (empty($artist) || (!filter_var($artist))) {
    header("location: index.php"); // deal with invalid input
    exit();
}
$album = ltrim(rtrim(filter_input(INPUT_POST, "album", FILTER_SANITIZE_STRING)));
if (empty($album) || (!filter_var($album))) {
    header("location: index.php"); // deal with invalid input
    exit();
}

$numberOfProductA = filter_input(INPUT_POST, "numberOfProductA", FILTER_SANITIZE_NUMBER_INT);
if (!isset($numberOfProductA)) {
    if (!filter_var($numberOfProductA, FILTER_VALIDATE_INT)) {
        header("location: index.php"); // deal with invalid input
        exit();
    }
}

$numberOfProductB = filter_input(INPUT_POST, "numberOfProductB", FILTER_SANITIZE_NUMBER_INT);
if (!isset($numberOfProductB)) {
    if (!filter_var($numberOfProductB, FILTER_VALIDATE_INT)) {
        header("location: index.php"); // deal with invalid input
        exit();
    }
}

$paymentAmount = filter_input(INPUT_POST, "paymentAmount", FILTER_SANITIZE_NUMBER_INT);
if (!isset($paymentAmount)) {
    if (!filter_var($paymentAmount, FILTER_VALIDATE_INT)) {
        header("location: index.php"); // deal with invalid input
        exit();
    }
}

require_once 'configuration.php';
// make stripe payment
require_once('./Stripe/init.php');
\Stripe\Stripe::setApiKey($privateStripeKey);
try {
    $charge = \Stripe\Charge::create(array(
                "amount" => $paymentAmount . "00",
                "currency" => "eur",
                "card" => $stripeToken,
                "description" => "For the music Lovers")
    );
} catch (Stripe_CardError $e) {
    echo("Your card has been declined.<br>Error Details: " . $e . "<br><br><a href='index.php'>Click here to continue</a>");
    die();
} catch (Exception $e) {
    echo("Your card has been declined.<br>Error Details: " . $e . "<br><br><a href='index.php'>Click here to continue</a>");
    die();
}
// end of Stripe payment code
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Backstage - Store</title>  
        <link rel="stylesheet" href="assets/demo.css">
        <link rel="stylesheet" href="assets/form-validation.css">
        <link rel="stylesheet" href="assets/awesome.css">
        <link href="./assets/progress-wizard.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/main.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="IMG/headphones.png" type="image/gif" sizes="16x16">
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
                <h2><a href="index.html"><img style="vertical-align: middle;height:2.5em" src="IMG/bs.png" alt=""/></a>store</h2>

                <!-- Progress Bar -->
                <div class="progress_indicator_container">
                    <!--                    <ul class="progress_indicator">
                                            <li class="completed">
                                                <span class="bubble"></span>
                                                Register
                                            </li>
                                            <li class="completed">
                                                <span class="bubble"></span>
                                                Payment
                                            </li>                        
                                            <li class="completed">
                                                <span class="bubble"></span>
                                                Confirmation
                                            </li>
                                        </ul>-->
                    <span id="span1">Register</span>
                    <span id="span2">Payment</span>
                    <span id="span3">Confirmation</span>
                    <progress value="10" max="10">100 %</progress>
                </div>
                <!-- End of Progress Bar -->

                <p>Your payment is confirmed. Thank you for your order.</p>
                <a href="index.html">Click here to return to our website</a>
            </form>

        </div> 
    </body>

    <?php
// send confirmation email
    ini_set('SMTP', 'http://students.dkit.ie');
    ini_set('smtp_port', 25);

    $subject = "Backstage";
    $comment = "Your payment is confirmed." . "\r\n"
            . "For " . $artist . "'s album : " . $album . "\r\n"
            . " Thank you for your order.";

    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/html; charset=iso-8859-1";
    $headers[] = "To: $name <$email>";
    $headers[] = "From: Backstage <d00197875@student.dkit.ie>";
    $headers[] = "Cc: d00197875@student.dkit.ie";
    $headers[] = "Bcc: d00197875@student.dkit.ie";



    mail($email, $subject, $comment, implode("\r\n", $headers));
    ?>
</html>