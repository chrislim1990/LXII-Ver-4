<?php

// jCart v1.3
// http://conceptlogic.com/jcart/

// This file demonstrates a basic checkout page

// If your page calls session_start() be sure to include jcart.php first
include_once('jcart/jcart.php');

session_start();
?>

<div class="container" id="checkout">

	<div class="col-md-8">
		<h2>Contact Details</h2>
		<?php

		echo form_open('order/project/1')
		
		echo "<div class='form_wrapper'>";
		
		$form_inputs = array(
			// Label , ID, input type, help text, misc depending on input type
			array('Given Name','given_name','text'),
			array('Family Name/ Surname','sur_name','text'),
			array('Company Name','company_name','text'),
			array('Mobile Phone','mobile','text','LXII Design Studio will use your mobile number if we need to contact you regarding your order.'),
			array('Email Address','email','text','<hr>'),
			array('<p><b>Sign Me Up!</b> I would like to promotional material from LXII Design Studio!</p>','newsletter','checkbox','','checked')
			);

		GenerateForm($form_inputs);

		echo "</div>";

		echo form_submit('client_submit', 'Next');
		echo form_close();

		?>
	</div>

	<div class="col-md-4">
		<div class="cbp-spmenu">
			<div id="jcart" ><?php $jcart->display_cart();?></div>
		</div>
	</div>

</div>