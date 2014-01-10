<div class="container" >
	<br>
	<div class="row black">
		<div class="col-md-8" style="text-align:right">
		</div>
		<div class="col-md-4" style="text-align:right">
			<img src="img/step-2.png">
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
			<form id="form1" class="details" method="POST" action="order/details/<?=$records[0]->id?>">
			<strong class="stronger">1. Tell us about your business</strong>
			<i class="red">*</i> Required fields
			<br><br>
			<i class="red">*</i> What does your business do?<br>
			<input type="text" id="field1" name="field1"><br>
			<i class="red">*</i> Summarize the answer above in one short sentence.<br>
			<input type="text" id="field2" name="field2"><br>
			<i class="red">*</i> What is the overall mood of your company?<br>
			<input type="text" id="field3" name="field3"><br>

			<hr>

			<strong class="stronger">2. How about your business’ images?</strong>
			<i class="red">*</i> Required fields
			<br><br>
			<i class="red">*</i> What should people feel when they see or think of your brand?<br>
			<input type="text" id="field4" name="field4"><br>
			<i class="red">*</i> Who are your competitors and how do you differ from them? <br>
			<input type="text" id="field5" name="field5"><br>
			If this is a re-brand, what do you like about your current brand and what you don’t?<br>
			<input type="text" id="field6" name="field6"><br>


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
			field1: "required",
			field2: "required",
			field3: "required",
			field4: "required",
			field5: "required",
			field6: "required"
		},
		messages: {
		}
	});
});
</script>