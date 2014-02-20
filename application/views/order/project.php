<?php

include_once('jcart/jcart.php');
// session_destroy();
// session_start();

$actualname = "";
?>


<div class="container" id="checkout">

	<?php
	PostIntoSession($_POST['title'].'_form','project_submit');
	PostIntoSession('client','client_submit');
	?> 

	<div class="col-md-8">
		
		<?php

		$itemIdsInCart = (ShowPrivateItem('items'));
		$itemNamesInCart = (ShowPrivateItem('names'));
		$itemPricesInCart = (ShowPrivateItem('prices'));
		$itemQtysInCart = (ShowPrivateItem('qtys'));

		// Get total & remove the decimal
		$itemSubtotalsInCart = explode('.',(ShowPrivateItem('subtotal')));
		$itemSubtotalsInCart = $itemSubtotalsInCart[0];


		$neededFormsName = array();

		function matchForms($name){
			switch ($name) {
				case 'Logo Design':
				return 'Logo';
				break;

				case 'Website':
				return 'Website';
				break;
			}
		}

		// Find the needed forms
		foreach ($itemNamesInCart as $i) {
			$form_name = matchForms($i);
			$neededFormsName = AddIntoArray($form_name,$neededFormsName);
		}
		
		// Add in General form to the first of Array
		array_unshift($neededFormsName, "General");
		array_unshift($neededFormsName, "Client");


		// Get all the forms from databse & insert the needed one into array
		foreach ($records as $r) {
			foreach ($neededFormsName as $formName) {
				if ($formName == $r->title) {
					$active_forms [] = $r;
				}
			}
		};

		// To store array in database we need serialize it before we save it. Online serialize link http://goo.gl/BaP6U
		$total_forms = count($active_forms);
		$current_count = $this->uri->segment(3);
		$next_count = $current_count == $total_forms ? 'summary' : $this->uri->segment(3)+1;

		if ($current_count != 'summary') {
			// Render the forms
			$current_form = $active_forms[$current_count-1];

			$project_inputs= unserialize($current_form->content);
			echo "<h2>Supporting Details</h2>";
			
			$attributes = array('id' => 'myform');
			echo form_open("order/project/$next_count",$attributes);
			echo form_hidden('title', $current_form->title);

			echo "<div class='form_wrapper'>";
			echo "<h3>".$current_form->title." Form</h3><hr>";
			GenerateForm($project_inputs);
			echo "</div>";

			echo '<input type="submit" name="project_submit" value="Next" class="learn_more">';
			echo form_close();
		}else{
			// Reset current count to 4 so that we can use it for sidebar summary
			$current_count = $total_forms+1;

			// Display Summary Here
			echo "<h2>Project Summary</h2>";
			echo "<div class='form_wrapper summary'>";
			$summary_forms = array();
			foreach ($active_forms as $a) { $summary_forms[] = $a->title; }
			foreach ($summary_forms as $a) {
				$summary_forms_name = $a!='client'? $a.'_form' : $a ;

				foreach ($_SESSION[$summary_forms_name] as $key => $value) {
					if ($key == 'title') {
						echo "<table class='table table-hover'>";
						echo "<h3>".$value."</h3>";
					}else if ($value && $key!='client_submit' && $key!='project_submit') {
						// Remove Underscore
						$key = str_replace('_',' ',$key);
						// Convert to title case
						$key = ucwords(strtolower($key));
						echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
					}
				}
				echo "</table>";
			}
			echo "</div>";
			echo "<form method='post' action='jcart/gateway.php'>";
			echo "<input type='hidden' id='jcart-is-checkout' name='jcartIsCheckout' value='true' />";
			echo "<input class='learn_more' type='submit' id='jcart-paypal-checkout' name='jcartPaypalCheckout' value='Checkout with PayPal'>";
			// echo "<input class='learn_more' type='submit' id='jcart-paypal-checkout' name='jcartPaypalCheckout' value='Offline Checkout'>";
			echo "</form>";

		}
		?>
	</div>

	<div class="col-md-4">
		<h3>Order Summary</h3>
		<div id="subtotal">
			<div id="content">
				<h4>Subtotal: MYR</h4>
				<h2><?php echo $itemSubtotalsInCart; ?></h2>
			</div>

		</div>
		<hr>
		<?php
		echo "<h3>Shopping Cart</h3>";
		echo "<dl id='shopping_cart'><hr>";
		for ($i=0; $i < count($itemIdsInCart); $i++) { 
			$itemID = $itemIdsInCart[$i];
			$itemName = $itemNamesInCart[$itemID];
			$itemPrice = $itemPricesInCart[$itemID];
			$itemQty = $itemQtysInCart[$itemID];
			echo "<dt>$itemQty x <b>$itemName</b></dt><dd>MYR $itemPrice</dd><hr>";
		}
		echo "</dl>";

		function renderProjectSummary($array){
			foreach ($array as $key => $value) {
				if ($key != 'title' && $key != 'project_submit' && $key != 'newsletter' && $value) {
					if($key == 'logo_type'){

						$key = str_replace('_',' ',$key);
						$key = ucwords(strtolower($key));
						$gah = implode(', ', $value);
						$str .=  '<dt><span>'.$key.':</span></dt><dd><span>'.$gah.'</span></dd><hr>';
					} else {

						$key = str_replace('_',' ',$key);
						$key = ucwords(strtolower($key));
						$str .=  '<dt><span>'.$key.':</span></dt><dd><span>'.$value.'</span></dd><hr>';
					};

					if ($key == 'given_name'){
						$actualname = $value;
					} else if ($key == 'sur_name'){
						$actualname .= "&nbsp;".$value;
					};
				};
			}

			return $str;
		};

		function getName($array){
			foreach ($array as $key => $value) {
				if ($key == 'given_name'){
					$actualname = $value;
				} else if ($key == 'sur_name'){
					$actualname .= "&nbsp;".$value;
				};
			};

			return $actualname;
		};


		// Project Summary

		if ($current_count-1>0) {
			echo "<div id='project_summary'>";
			echo "<h3>Project Summary</h3>";

			for ($i=0; $i < $current_count-1; $i++) { 
				$working_form = $_SESSION[$neededFormsName[$i].'_form'];

				echo "<dl>";
				echo "<dt><b>".$working_form['title']."</b></dt><dd>&nbsp;</dd><hr>";
				echo renderProjectSummary($working_form);
				echo "</dl>";
			}
			echo "</div>";

			$working_form = $_SESSION[$neededFormsName[0].'_form'];
			$_SESSION['actualname'] = getName($working_form);
			$_SESSION['form_details'] = $working_form;
		}
		?>
	</div>

</div>

<div class="block b100"></div>
<hr class="nomargin">


<script type="text/javascript">
	$().ready(function() {

	// validate signup form on keyup and submit
	$("#myform").validate({
		rules: {

			//Client
			given_name: "required",
			sur_name: "required",
			mobile: {
				required: true,
				digits: true,
				minlength: 6
			},
			email: {
				required: true,
				email: true,
			},

			//General
			business_name : "required",
			services_provided: "required",
			target_audience: "required",
			uniqueness: "required",
			brands_differences: "required",
			impression: "required",

			//Logo
			logo_style : {
				required: true,
				maxlength: 2,
			},
			logo_name: "required",
			tagline: "required",
			color_preferences: "required",
			logo_attributes: "required",
			message_delivery: "required",

		},

		messages: {

			//Client
			given_name: "Your name is required",
			surname: "How should we address you?",
			mobile: {
				required: "Just in case we are interested in your voice",
				digits: "Did I smell alphabets?",
				minlength: "Please provide us your contact number along with your country's <a href='http://en.wikipedia.org/wiki/List_of_country_calling_codes' target='_blank'>dialing code</a>."
			},
			email: {
				required: "We need this to get back to you",
				email: "We need a valid email to get back to you",
			},

			//General
			business_name : "A name to address your business is the first step towards greatness!",
			services_provided: "Be it doctors, repoman, terminators... yeah we are ready for it.",
			target_audience: "Mark your targets and we'll get the job done!",
			uniqueness: "You are special, so is your business! Tell us more about it!",
			brands_differences: "Strive to be different is always a good way to win the game.",
			impression: "Tell us what you want, and we will work out the perfect solution for you.",

			//Logo
			logo_style: {
				required: "Do tell us the type of logo design you like!",
				maxlength: "Two is all we need.",
			},
			logo_name: "Indulge us with the awesome name of your would-be shiny logo!",
			tagline : "We are fine with Latin motto too, really.",
			color_preferences : "Roses are red, violets are blue...",
			logo_attributes : "A professional? A funny toy? A relaxing cafe?",
			message_delivery : "THE LOGO SPEAKS FOR YOU... but you gotta decide what it should speaks, yeah?",

		}
	});
});
</script>