<?php
include_once('jcart/jcart.php');
// session_destroy();
session_start();
$current_item = $records[0];
?>

<div class="container product" >

	<!-- Push Menu -->
	<div id="cbp-overlay"></div>
	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
		<div id="jcart"><?php $jcart->display_cart();?></div>
	</nav>

	<div class="row steps">
		<!-- Product Photo -->
		<div id="product_photo" class="col-md-6 hide-on-small ">
			<img src="img/products/<?=$current_item->url?>.jpg" onerror='imgError(this);'>
		</div>

		<div class="col-md-5 product_info">
			
			<h2 class="title"><?=$current_item->title?></h2>
			<h3 class="price">MYR <span id="product-price"><?=$current_item->price?></span></h3>
			<p class="product-desc"><?=$current_item->desc?></p>
			<div class="well">

				<?php

				$contains_side = strpos($current_item->price,"/");

				if($contains_side !== false){
					$product_price = explode("/", $current_item->price);
					$product_price = $product_price[0];
				} else {
					$product_price = $current_item->price;
				};
				
				$hidden_data = array(
					'jcartToken' => $_SESSION['jcartToken'],
					'my-item-id' => ShowPrivateItem('itemCount')+1,
					'my-item-url' => "img/products/".$current_item->url.".jpg",
					'my-item-name' => $current_item->title,
					'my-item-price' => $product_price,
					'my-item-qty' => 1
					);

				echo '<form method="post" action="" class="jcart">';
				echo form_hidden($hidden_data);
				// Additional Details

				switch ($hidden_data['my-item-name']) {
					case 'Business Card':
					echo form_label('Additional (100/pax) ', 'add_pax');
					echo '<input type="text" id="add_pax" name="my-item-extra" value="1" size="3" autocomplete="off">';
					break;
					
					case 'Booklet':
					echo form_label('Pages ', 'pages');
					echo '<input type="text" id="pages" name="my-item-extra" value="1" size="3" autocomplete="off">';
					break;

					case 'Website':
					echo form_label('Unique Pages ', 'pages');
					echo '<input type="text" id="pages" name="my-item-extra" value="1" size="3" autocomplete="off">';
					// echo "<p class='help'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>";
					echo form_label('CMS ', 'pages');
					echo '<input type="checkbox" name="vehicle" value="Bike">MYR 1200<br>';
					echo form_label('Mobile Version ', 'pages');
					echo '<input type="checkbox" name="vehicle" value="Bike">MYR 500<br>';
					echo form_label('Shopping Cart ', 'pages');
					echo '<input type="checkbox" name="vehicle" value="Bike">MYR 2500<br>';
					echo form_label('Coding ', 'pages');
					echo '<input type="checkbox" name="vehicle" value="Bike" checked >MYR 2500<br>';
					break;

					default:
						# code...
					break;
				}

				?> 
				<input id="product_place_order" type="submit" name="my-add-button" value="Place Order" class="learn_more place_order">
			</form>
			<p>Choose 1 from 2 concepts + Unlimited Amendments = Awesome Result</p>
		</div>

		<div class="iconholder">
			<a class="learn_more icon share-fb" href="https://www.facebook.com/dialog/feed?app_id=233054770218489&display=popup&link=http%3A%2F%2Flx2.com.my%2Forder%2F<?=$current_item->url ?>
				&redirect_uri=http://www.lx2.com.my/order/<?=$current_item->url ?>"><i class="fa fa-facebook"></i></a> 
				<a class="learn_more icon" href="https://twitter.com/share?text=%23LX2%20Have%20a%20look%20at" target="_blank"><i class="fa fa-twitter"></i></a> 
				<a class="learn_more icon" href="http://www.tumblr.com/share/link?url=<?=urlencode("http://lx2.com.my/order/".$current_item->id)?>&name=<?=urlencode($current_item->title." for only MYR".$current_item->price)?>&description=<?=urlencode($current_item->desc)?>" title="Share on Tumblr"><i class="fa fa-tumblr"></i></a> 
			</div>

			<hr>
			<p>
				<b>Unique Design</b><br>
				We guarantee you that there shall be no two similar design like the one we did for yours.
				<br>
				<br>
				<b>Friend-2-Friend</b><br>
				You are our buddy! We will do our best to coordinate with you and fulfil all your needs and requests, and even beyond your expectations!
			</p>
			<hr>
			<p>
				<b>Related Products</b>
				<div class="row product_related">
					<?php 
					$filter = array();

					foreach ($category as $c) {
						// Find same products which is same set
						if ($c->set == $records[0]->set && $c->hidden != 1) {
							$filter[] = $c;
						};
					};

					$maxItem = count($filter)>3 ? 4 : count($filter);

					for ($i=0; $i < $maxItem; $i++) { 
						echo "
						<a class='col-md-3 col-xs-6' href='order/".$filter[$i]->url."'>
							<img src='img/products/".$filter[$i]->url.".jpg' onerror='imgError(this);'><br>
							".$filter[$i]->title."
						</a>
						";
					}
					?>

				</div>
			</p>
			<hr>
			<p>
				<b>Question?</b><br>
				<i class="fa fa-phone"></i> (+60)3-62418948<br>
				<i class="fa fa-envelope-o"></i> <a href="mailto:services@lx2.com.my">services@lx2.com.my</a><br>
			</p>

		</div>
	</div>
</div>

<div class="block b100"></div>
<hr class="nomargin">

<?php
// VarDump($_SESSION);
?>
<script src="http://platform.tumblr.com/v1/share.js"></script>
<script>
	
	$("#gn-menu").append("<li id='view_cart'><i class='fa fa-shopping-cart'></i> Your Cart <span id='cart_count'>0</span></li>");

// Push Menu
$(document).ready(function() {
	$(document.body).addClass('cbp-spmenu-push');
	$('#cart_count').text($('#total_item').text());
});

var menuRight = document.getElementById( 'cbp-spmenu-s2' );
var body = document.body;

$('#product_place_order,#view_cart,#cbp-overlay,#keep_shopping').click(function(){

	$('#cbp-overlay').toggle();
	classie.toggle( this, 'active' );
	classie.toggle( body, 'cbp-spmenu-push-toleft' );
	classie.toggle( menuRight, 'cbp-spmenu-open' );

	// Cart Count
	var total_item_in_cart = parseInt($('#total_item').text());
	if(this.id=="product_place_order" ){total_item_in_cart += 1; };
	$('#cart_count').text(total_item_in_cart);
	$('[name=my-item-id]').val(total_item_in_cart);

});

// Extra Information
$("#add_pax,#pages").change(function () {
	default_price = parseInt('<?php echo $product_price; ?>');
	
	switch ($(this).attr('id')) { 
		case 'add_pax': 
		additional_charge = 100;
		price = ($(this).val()*additional_charge)+default_price;
		break;
		case 'pages':
		if ($(this).val()<= 10) {
			price = $(this).val()*default_price;				
		}else{
			price = $(this).val()*default_price*0.8;				
		}; 
		break;
	}
	
	$('[name=my-item-price]').val(price);
		// alert(price);
	})
.change();

</script>