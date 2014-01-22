<?php
include_once('jcart/jcart.php');
session_destroy();
// session_start();
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
				$product_price = $contains_side !== false ? explode("/", $current_item->price)[0] : $current_item->price;

				$hidden_data = array(
					'jcartToken' => $_SESSION['jcartToken'],
					'my-item-id' => $current_item->id,
					'my-item-url' => "img/products/".$current_item->url.".jpg",
					'my-item-name' => $current_item->title,
					'my-item-price' => $product_price,
					'my-item-qty' => '1'
					);

				echo '<form method="post" action="" class="jcart">';
				echo form_hidden($hidden_data);
				
				echo form_checkbox('exp', '', False);
				echo form_label('Become Expensive ', 'exp');

				?> 
				<input id="product_place_order" type="submit" name="my-add-button" value="Place Order" class="learn_more invert place_order">
			</form>
			<p>Unlimited amendments with 2 options. Insanely happy result.</p>
		</div>

		<div class="iconholder">
			<a class="icon" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flx2.com.my%2Fpublic_html%2Forder%2F<?=$current_item->id ?>" target="_blank"><i class="fa fa-facebook"></i></a> 
			<a class="icon" href="https://twitter.com/share?text=%23LX2%20Have%20a%20look%20at" target="_blank"><i class="fa fa-twitter"></i></a> 
			<a class="icon" href="http://www.tumblr.com/share/link?url=<?=urlencode("http://lx2.com.my/order/".$current_item->id)?>&name=<?=urlencode($current_item->title." for only MYR".$current_item->price)?>&description=<?=urlencode($current_item->desc)?>" title="Share on Tumblr"><i class="fa fa-tumblr"></i></a> 
		</div>

		<hr>
		<p>
			<b>Free Global Shipping</b><br>
			On orders over $150<br>
			Receive by January 19th<br>
			<br>
			<b>Custom Made</b><br>
			Based on your measurement profile
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
					<a class='col-md-3 col-xs-6' href='order/".$filter[$i]->id."'>
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

<script>
$("#gn-menu").append("<li id='view_cart'><i class='fa fa-shopping-cart'></i> Your Cart <span id='cart_count'>0</span></li>");
</script>
<script src="http://platform.tumblr.com/v1/share.js"></script>