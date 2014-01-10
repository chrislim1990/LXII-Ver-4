<?php 

$field1 = $_REQUEST["field1"];
$field2 = $_REQUEST["field2"];
$field3 = $_REQUEST["field3"];
$field4 = $_REQUEST["field4"];
$field5 = $_REQUEST["field5"];
$field6 = $_REQUEST["field6"];
$field7 = $_REQUEST["field7"];
$field8 = $_REQUEST["field8"];
$field9 = $_REQUEST["field9"];
$field10 = $_REQUEST["field10"];
$field11 = $_REQUEST["field11"];

//If any fields are invalid / empty
if($field1 == "" || $field2 == "" || $field3 == "" || $field4 == "" || $field5 == "" || $field6 == "" || $field7 == "" || $field8 == "" ){
	header( 'Location: order/brief/'.$records[0]->id) ;
};

if($field11 == ""){
	$field11 = "N/A";
};

?>

<div class="container" >
	<br>
	<div class="row black">
		<div class="col-md-8" style="text-align:right">
		</div>
		<div class="col-md-4" style="text-align:right">
			<img src="img/step-4.png">
		</div>
	</div>
	<br>
	<div class="row steps">
		<div class="col-md-4 hide-on-small">
			<img src="img/products/<?=$records[0]->url?>.jpg">
		</div>
		<div class="col-md-8">

			<br class='block hide-on-large'>
			<h1><?=$records[0]->title?></h1>
			<h2 class="blacker"><?=$records[0]->options?> Options - Maximum of <?=$records[0]->amend?> ammendments</h2>
			<div class="price">MYR <?=$records[0]->price?></div>
			<div class="iconholder" style="text-align:left">
				<a class="icon" href="http://www.facebook.com/LX2DS?ref=br_tf" target="_blank"><i class="fa fa-facebook"></i></a> 
				<a class="icon" href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a> 
				<a class="icon" href="http://www.tumblr.com" target="_blank"><i class="fa fa-tumblr"></i></a> 
			</div>
			<h3>Confirm your details</h3>
			<div class="col-md-6">
				<strong><?=$field7?></strong><br>
				<strong><?=$field8?></strong><br>
				<strong><?=$field9?></strong><br>
				<strong><?=$field10?></strong><br><br>
				<i>Your message/Comment:</i><br>
				<strong><?=$field11?></strong><br><br>

				<form id="form1" class="details" method="POST" action="../application/views/payments.php">  
					<input type="hidden" name="cmd" value="_xclick" /> 
					<input type="hidden" name="no_note" value="1" />
					<input type="hidden" name="lc" value="MY" />
					<input type="hidden" name="currency_code" value="USD" />
					<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
					<input type="hidden" name="payer_email" value="<?=$field9?>"  />
					<input type="hidden" name="item_number" value="<?=$records[0]->title?>" / >
					<input type="hidden" name="item_amount" value="<?=$records[0]->price?>">
					<input type="submit" class="blackbutton nomargin pull-left"  value="Submit Payment"/>
				</form>
			</div>
			<div class="col-md-6">
				<i>What does your business do?</i><br>
				<strong><?=$field1?></strong><br><br>
				<i>Summarize the answer above in one short sentence.</i><br>
				<strong><?=$field2?></strong><br><br>
				<i> What is the overall mood of your company?</i><br>
				<strong><?=$field3?></strong><br><br>
				<i>What should people feel when they see or think of your brand?</i><br>
				<strong><?=$field4?></strong><br><br>
				<i>Who are your competitors and how do you differ from them?</i><br>
				<strong><?=$field5?></strong><br><br>
				<i>If this is a re-brand, what do you like about your current brand and what you don’t?</i><br>
				<strong><?=$field6?></strong>
			</div>
			<script src="js/paypal-button.min.js?merchant=lucian0014-facilitator@live.co.uk" 
			data-button="buynow" 
			data-name="dsa" 
			data-amount="100" 
			data-callback="http://localhost/php_test/lxii_ver4/public_html/order/" 
			data-env="sandbox"
			></script>
			<form action='https://www.paypal.com/cgi-bin/webscr' method='post'>
				<fieldset>
					<input type='hidden' name='cmd' value='_cart' />
					<input type='hidden' name='add' value='1' />
					<input type='hidden' name='business' value='labs-feedback-minicart@paypal.com' />
					<input type='hidden' name='item_name' value='<?=$records[0]->title?>' />
					<input type='hidden' name='quantity' value='1' />
					<input type='hidden' name='env' value='www.sandbox' />
					<input type='hidden' name='amount' value='<?=$records[0]->price?>' />
					<input type='hidden' name='currency_code' value='USD' />
					<input type='submit' name='submit' value='Add to cart' class='icon pull-right' />
				</fieldset>
			</form>
		</div>
	</div>

	<br><br>
</div>