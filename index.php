<?php
require ("Database.php");

$album_id = filter_input(INPUT_GET, 'album_id', FILTER_VALIDATE_INT);

$query = 'SELECT * FROM albumOrder WHERE albumID =:album_id';
$statement = $db->prepare($query);
$statement->bindValue(":album_id", $album_id);
$statement->execute();
$statement->closeCursor();
$statement->execute();

while ($row = $statement->fetch()) {

    $album_id = $row['albumID'];
    $title = $row['title'];
    $genre = $row['genre'];
    $price = $row['price'];
    $artist = $row['artist'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Backstage - Store</title>  
        <link rel="stylesheet" href="assets/demo.css">
        <link rel="stylesheet" href="assets/form-validation.css">
        <link rel="stylesheet" href="assets/awesome.css">
        <link href="./assets/progress-wizard.min.css" rel="stylesheet" type="text/css"/>
        <link href="./assets/main.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="IMG/headphones.png" type="image/gif" sizes="16x16">

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
        <script>
            function calculteCost()
            {
                var price = <?php Print($price); ?>;
                var numberOfProductA = document.getElementById('numberOfProductA').value;
                var paymentAmount;

                paymentAmount = (price * numberOfProductA);

                document.getElementById('paymentAmount').value = paymentAmount;
                document.getElementById('paymentDetails').value = "€" + paymentAmount;

                if (paymentAmount > 0)
                {
                    document.getElementById('paymentAmountError').style.visibility = "hidden";
                } else
                {
                    document.getElementById('paymentAmountError').style.visibility = "visible";
                }
            }


            function atLeastOneProductBought()
            {
                if (document.getElementById('paymentAmount').value === '0')
                {
                    document.getElementById('paymentAmountError').style.visibility = "visible";
                    return false;
                } else
                {
                    return true;
                }
            }
        </script>
    </head>

    <body>
        <br>
        <br>
        <div class="main-content">

            <form autocomplete="off" class="form-validation" id="dor_payment_form" onsubmit="return atLeastOneProductBought()" action="make_payment.php" method="post">

                <h2><a href="store.php"><img style="vertical-align: middle;height:2.5em" src="IMG/bs.png" alt=""/></a>store</h2>



                <div class="progress_indicator_container">
                    <!--                    <ul class="progress_indicator">
                                            <li class="completed">
                                                <span class="bubble"></span>
                                                Register
                                            </li>
                                            <li>
                                                <span class="bubble"></span>
                                                Payment
                                            </li>                        
                                            <li>
                                                <span class="bubble"></span>
                                                Confirmation
                                            </li>
                                        </ul>-->
                    <span id="span1">Register</span>
                    <span id="span2">Payment</span>
                    <span id="span3">Confirmation</span>
                    <progress color="red" value="3.3" max="10">30 %</progress>
                </div>
                <br>
                <fieldset>
                    <legend>PERSONAL DETAILS</legend>
                    <label for="name">Name: </label>
                    <input type="text" id="name" name="name" required autofocus><br><br>

                    <label for="email">Email: </label>
                    <input type="email" id = "email" name = "email" required autofocus><br><br>
                </fieldset> 
                <br>
                <fieldset>
                    <legend>MUSIC FOR YOUR TASTE</legend>
                    <label for="artist">Artist: </label>
                    <input type="text" id="artist" name="artist"  value = "<?php echo $artist ?>"required autofocus readonly><br><br>

                    <label for="title">Title: </label>
                    <input type="text" id="album" name="title" value = "<?php echo $title ?>"required autofocus readonly><br><br>
                </fieldset>
                <br>
                <fieldset>
                    <legend>Quantity</legend>
                    <label id="paymentAmountError">You must select at least one product</label><br>

                    <label for="numberOfProductA">Value: </label>
                    <input type="number" id="numberOfProductA" name="numberOfProductA" min="0" max="10" value="0" onchange="calculteCost()"><br><br>
                </fieldset>
                <label for="paymentDetails">Total</label>
                <input type="text" id = "paymentDetails" value = "€" tabIndex="-1" readonly><br><br>
                <input type="hidden" id="paymentAmount" name="paymentAmount" value="0">

                <input type="submit" value="Proceed to Payment">
                
               
            </form>

        </div> 
    </body>
</html>