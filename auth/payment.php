<?php
	session_start();
?>

<!DOCTYPE html>
<html>
    <head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../js/payment.js"></script> 
	<link rel="stylesheet" href="../styles/payment.css"> 
    </head>

    <body>
        <div class="container">
	    <p id="display-total">Your total: </p>	
            <div class="container" id="main-form-container">
                <img >
                <p id="msg">This is secure with blah blabh blabh-bit ESL. Encryptment payment. You are kinda safe.</p>
                <form class="form-container" id="main-form-container">
			<input type="radio" name="payment" value="card" id="creditcard" > Credit card (VISA, Mastercard)
			<input type="radio" name="payment" value="baypal" id="baypal"> BayPal
			<pre id="logs"></pre>
			<div id="enter-form">
			</div>
			<input type="submit" value="submit">
			<div class="popup-ui" id="typeCard">
			</div>
                </form>
            </div>
        </div>
    </body>
</html>
