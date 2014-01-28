<?php

// jCart v1.3
// http://conceptlogic.com/jcart/

// This file demonstrates a basic checkout page

// If your page calls session_start() be sure to include jcart.php first
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

		function matchForms($itemID){
			switch ($itemID) {
				case '1':
				return 'Logo';
				break;

				case '47':
				return 'Website';
				break;

				default:
				return 'General';
				break;
			}
		}

		// Find the needed forms
		foreach ($itemIdsInCart as $i) {
			$form_name = matchForms($i);
			$neededFormsName = AddIntoArray($form_name,$neededFormsName);
		}

		// Check is Logo/Website exist individualy without general form
		if (!in_array("General", $neededFormsName)) {
			array_unshift($neededFormsName, "General");
		}
		
		// Add in General form to the first of Array
		array_unshift($neededFormsName, "Client");

		// Get all the forms from databse & insert the needed one into array
		foreach ($records as $r) {
			foreach ($neededFormsName as $formName) {
				if ($formName == $r->title) {
					$active_forms [] = $r;
				}
			}
		}

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

			echo form_submit('project_submit', 'Next');
			echo form_close();
		}else{
			// Reset current count to 4 so that we can use it for sidebar summary
			$current_count = $total_forms+1;

			// Display Summary Here
			echo "<h2>Project Summary</h2>";

			$summary_forms = array();
			foreach ($active_forms as $a) { $summary_forms[] = $a->title; }
			
			foreach ($summary_forms as $a) {
				$summary_forms_name = $a!='client'? $a.'_form' : $a ;

				foreach ($_SESSION[$summary_forms_name] as $key => $value) {
					if ($key == 'title') {
						echo "<h3>".$value."</h3>";
					}else if ($value && $key!='client_submit' && $key!='project_submit') {
						// Remove Underscore
						$key = str_replace('_',' ',$key);
						// Convert to title case
						$key = ucwords(strtolower($key));
						echo $key." : ".$value."<br>";
					}
				}
				echo "<hr>";
			}
			echo "<form method='post' action='jcart/gateway.php'>";
			echo "<input type='hidden' id='jcart-is-checkout' name='jcartIsCheckout' value='true' />";
			echo "<input type='submit' id='jcart-paypal-checkout' name='jcartPaypalCheckout' value='Checkout with PayPal'>";
			echo "<input type='submit' id='jcart-paypal-checkout' name='jcartPaypalCheckout' value='Offline Checkout'>";
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
		echo "<dl id='shopping_cart'>";
		for ($i=0; $i < count($itemIdsInCart); $i++) { 
			$itemID = $itemIdsInCart[$i];
			$itemName = $itemNamesInCart[$itemID];
			$itemPrice = $itemPricesInCart[$itemID];
			$itemQty = $itemQtysInCart[$itemID];
			echo "<dt>$itemQty x <b>$itemName</b></dt><dd>MYR $itemPrice</dd>";
		}
		echo "</dl>";

		function renderProjectSummary($array){
			foreach ($array as $key => $value) {
				if ($key != 'title' && $key != 'project_submit' && $value) {
					$str .=  '<dt>'.$key.':</dt><dd>'.$value.'</dd>';

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
				echo "<dt><b>".$working_form['title']."</b></dt><dd>&nbsp;</dd>";
				echo renderProjectSummary($working_form);
				echo "</dl>";
			}
			echo "</div>";

			$working_form = $_SESSION[$neededFormsName[0].'_form'];
			$_SESSION['actualname'] = getName($working_form);
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
		},
		messages: {
			given_name: "Your name is required",
			sur_name: "How should we address you?",
			mobile: {
				required: "Just in case we are interested in your voice",
				digits: "Did I smell alphabets?",
				minlength: "Please provide us your contact number along with your country's <a href='http://en.wikipedia.org/wiki/List_of_country_calling_codes' target='_blank'>dialing code</a>."
			},
			email: {
				required: "We need this to get back to you",
				email: "We need a valid email to get back to you",
			},
		}
	});
});
</script>