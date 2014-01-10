<?php 

$field1 = $_REQUEST["field1"];
$field2 = $_REQUEST["field2"];
$field3 = $_REQUEST["field3"];
$field4 = $_REQUEST["field4"];
$field5 = $_REQUEST["field5"];
$field6 = $_REQUEST["field6"];

?>

<div class="container" >
	<br>
	<div class="row black">
		<div class="col-md-8" style="text-align:right">
		</div>
		<div class="col-md-4" style="text-align:right">
			<img src="img/step-3.png">
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
			</div><br>
			<form id="form1" method="POST" class="details" action="order/confirm/<?=$records[0]->id?>">
				<input type="hidden" name="field1" value="<?=$field1?>">
				<input type="hidden" name="field2" value="<?=$field2?>">
				<input type="hidden" name="field3" value="<?=$field3?>">
				<input type="hidden" name="field4" value="<?=$field4?>">
				<input type="hidden" name="field5" value="<?=$field5?>">
				<input type="hidden" name="field6" value="<?=$field6?>">
				<strong class="stronger">3. Please tell us more about you</strong>
				<i class="red">*</i> Required fields
				<br><br>
				<i class="red">*</i>Your Name<br>
				<input type="text"  name="field7"><br>
				<i class="red">*</i> Company Name<br>
				<input type="text"  name="field8"><br>
				<i class="red">*</i> Email<br>
				<input type="text"  name="field9"><br>
				Contact Number<br>
				<input type="text"  name="field10"><br>
				Do you have anything else to add? <br>
				<textarea name="field11"></textarea>
<br>
				<input type="submit" class="blackbutton nomargin pull-left" value="Continue" />
			</form>
			
		</div>
	</div>

	<br><br>
</div>


<script type="text/javascript">


$().ready(function() {

	// validate signup form on keyup and submit
	$("#form1").validate({
		rules: {
			field7: "required",
			field8: "required",
			field9: "required",
		},
		messages: {
		}
	});
});
</script>