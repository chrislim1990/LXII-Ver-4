<?php

include_once('jcart/jcart.php');

$formail = array();
$formail = $_SESSION["cartcheck"];

session_destroy();

$status = "";
$text = "";

if(isset($_POST['payment_status'])){

	//If Payment is successful
	if($_POST['payment_status'] == "Pending"){

		$icon = "check";
		$status = "Payment Success!";
		$text = "Your payment for the following item have been successfully made! "; 

	};

};

?>

<div class="container about">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<div class="block b100"></div>
			<div class="fa fa-4x fa-<?= $icon ?>"></div>
			<h1><?= $status ?></h1>
			<p><?= $text; ?></p>
			<div class="block"></div>

		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="row checklist">
				<div class="col-md-2">Quantity</div>
				<div class="col-md-8">Item Name</div>
				<div class="col-md-1 ">Price</div>
				<div class="col-md-1 ">Subtotal</div>
			</div>

			<?php

			$totalprice = 0;

			foreach ($formail as $item){
				$itemtotal = $item["price"]*$item["qty"];
				$totalprice += $itemtotal;

				echo "<div class='row checklistsub'>";
				echo "<div class='col-md-2'>".$item["qty"]."</div>";
				echo "<div class='col-md-8'>".$item["name"]."</div>";
				echo "<div class='col-md-1 price'>".$item["price"]."</div>";
				echo "<div class='col-md-1 price'>".$item["price"]*$item["qty"]."</div>";
				echo "</div>";

			};

			?>

			<div class="row checklist">
				<div class="col-md-10">&nbsp;</div>
				<div class="col-md-1 price">Total</div>
				<div class="col-md-1 price"><?= $totalprice ?></div>
			</div>

		</div>
	</div>

	<div class="block b100"></div>
</div>
<hr class="nomargin">