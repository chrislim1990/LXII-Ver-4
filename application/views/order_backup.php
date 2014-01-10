<?php 

//Filter process
$cat_graphic = array();
$cat_web = array();
$cat_bundles = array();
$prices_graphic = array();

foreach ($records as $r) {
	if ($r->cat == "graphic" && $r->hidden != 1) {
		$cat_graphic[] = $r;
		$prices_graphic[] = $r->price;
	} else if ($r->cat == "web" && $r->hidden != 1) {
		$cat_web[] = $r;
		$prices_web[] = $r->price;
	} else if ($r->hidden != 1) {
		$cat_bundles[] = $r->title;
	}
};

//Filter featured
$featured = array();

foreach ($records as $r) {
	if ($r->featured == 1 && $r->hidden != 1) {
		$featured[] = $r;
	};
};

sort($cat_graphic);
$prices_graphic = array_unique($prices_graphic);
sort($prices_graphic);

sort($cat_web);
$prices_web = array_unique($prices_web);
sort($prices_web);

echo "<style type='text/css'>";
echo ".header_banner {background-image:url('img/products_banner/d-coat.jpg');}";
echo "</style>";

?>

<div class='block hide-on-large'></div>
<div class="header_banner"></div>
<div class="jumbotron order">
	<div class="block"></div>
	<h1 style="text-align: center">Products</h1>
	<br>
	<div class="row">
		<div class="col-md-3 productside-container">
			<div class="col-md-4 col-xs-4 productside-inner current" style="border: 1px solid #444" id="control1"><i class=" fa-picture-o fa"></i><br>Graphic</div>
			<div class="col-md-4 col-xs-4  productside-inner" style="border: 1px solid #444" id="control2"><i class=" fa-desktop fa"></i><br>Web</div>
			<div class="col-md-4 col-xs-4  productside-inner" style="border: 1px solid #444" id="control3"><i class=" fa-list-alt fa"></i><br>Bundles</div>
			
			<div class="productside-form black" id="slide1">

				<form>
					<select class="form-control productselect graphic">
						<option value="0">Search by Name</option>
						<?php 

						foreach ($cat_graphic as $g) {
							echo "<option value='$g->id'>$g->title</option>";
						}

						?>
					</select>
					- or -
					<select class="form-control budgetselect graphic">
						<option value="0">Search by Budget</option>
						<option  value="budgeta">< MYR 200</option>
						<option  value="budgetb">MYR 200 - MYR 500</option>
						<option  value="budgetc">MYR 500 - MYR 800</option>
						<option  value="budgetd">MYR 800 - MYR 1000</option>
						<option  value="budgete"> MYR 1000</option>
					</select>
				</form>
			</div>

			<div class="productside-form black" id="slide2">

				<form>
					<select class="form-control productselect web">
						<option value="0">Search by Name</option>
						<?php 

						foreach ($cat_web as $g) {
							echo "<option value='$g->id'>$g->title</option>";
						}

						?>
					</select>
					- or -
					<select class="form-control budgetselect web">
						<option value="0">Search by Budget</option>
						<option  value="budgeta">< MYR 200</option>
						<option  value="budgetb">MYR 200 - MYR 500</option>
						<option  value="budgetc">MYR 500 - MYR 800</option>
						<option  value="budgetd">MYR 800 - MYR 1000</option>
						<option  value="budgete"> MYR 1000</option>
					</select>
				</form>
			</div>

			<div class="productside-form black" id="slide3">

				<form>
					<select class="form-control productselect bundle">
						<option value="0">Search by Name</option>
						<?php 

						foreach ($cat_graphic as $g) {
							echo "<option value='$g->id'>$g->title</option>";
						}

						?>
					</select>
					- or -
					<select class="form-control budgetselect bundle">
						<option value="0">Search by Budget</option>
						<option  value="budgeta">< MYR 200</option>
						<option  value="budgetb">MYR 200 - MYR 500</option>
						<option  value="budgetc">MYR 500 - MYR 800</option>
						<option  value="budgetd">MYR 800 - MYR 1000</option>
						<option  value="budgete"> MYR 1000</option>
					</select>
				</form>
			</div>
			<div class="col-md-6 col-xs-6 productside-innerblack">Online Live Chat</div>
			<div class="col-md-6 col-xs-6 productside-innerblack">Q & A</div>
		</div>
		<div class="col-md-9 product-slider">
			<!-- <div id="proslider">
				<img src="img/product-slide1.jpg">
				<img src="img/product-slide2.jpg">
			</div> -->
		</div>
	</div>


</div>

<hr>

<div class="jumbotron order" >

	<div class="row">
		<div class="col-md-7">
			<h3>PRODUCT HIGHLIGHTS</h3>
			<?php 

			if (count($featured)>3){
				for ($i=0; $i < 4; $i++) { 
					echo "
					<div class='col-md-3 col-xs-6 highlights'>
						<a href='order/".$featured[$i]->id."'>
							<img src='img/products/".$featured[$i]->url.".jpg' onerror='imgError(this);'>
							".$featured[$i]->title."</a>
							<form action='https://www.paypal.com/cgi-bin/webscr' method='post'>
								<fieldset>
									<input type='hidden' name='cmd' value='_cart' />
									<input type='hidden' name='add' value='1' />
									<input type='hidden' name='business' value='labs-feedback-minicart@paypal.com' />
									<input type='hidden' name='item_name' value='".$featured[$i]->title."' />
									<input type='hidden' name='quantity' value='1' />
									<input type='hidden' name='amount' value='".$featured[$i]->price."' />
									<input type='hidden' name='currency_code' value='USD' />
									<input type='submit' name='submit' value='Add to cart' class='icon pull-right' />
								</fieldset>
							</form>
						</div>
						";
					} ;
				} else {
					for ($i=0; $i < count($featured); $i++) { 
						echo "
						<div class='col-md-3 col-xs-6 highlights'>
							<a href='order/".$featured[$i]->id."'>
								<img src='img/products/".$featured[$i]->th.".jpg' onerror='imgError(this);'>
								".$featured[$i]->title."</a><form action='https://www.paypal.com/cgi-bin/webscr' method='post'>
								<fieldset>
									<input type='hidden' name='cmd' value='_cart' />
									<input type='hidden' name='add' value='1' />
									<input type='hidden' name='business' value='labs-feedback-minicart@paypal.com' />
									<input type='hidden' name='item_name' value='".$featured[$i]->title."' />
									<input type='hidden' name='quantity' value='1' />
									<input type='hidden' name='amount' value='".$featured[$i]->price."' />
									<input type='hidden' name='currency_code' value='USD' />
									<input type='submit' name='submit' value='Add to cart' class='icon pull-right' />
								</fieldset>
							</form>
						</div>
						";
					} ;	
				}

				?>
			</div>
			<div class="col-md-5 col-xs-12">
				<div class='block hide-on-large'></div>
				<h3>Latest News</h3>
				<p>Opta vidistem aut rerunto tem quam, to eic tem et molum qui sinvero di dolestotatur aut quate pa idem. Sam, sunt preperum hilliquam quatiossit, simo doluptaes ipsamusandi cum quos esti. Opta vidistem aut rerunto tem quam, to eic tem et molum qui sinvero di dolestotatur aut quate pa idem. Sam, sunt preperum hilliquam quatiossit, simo doluptaes ipsamusandi cum quos esti</p>
			</div>
		</div>
		<br><br>
	</div>
	<script>
		var optionselect = "0";
		$('.productselect').change(function() {
			if ($(this).val() != "0"){
				window.location.href = "order/"+$(this).val();
			};
		});

		$('.budgetselect.graphic').change(function() {
			if ($(this).val() != "0"){
				window.location.href = "order/search/graphic/"+$(this).val();
			};
		});

		$('.budgetselect.web').change(function() {
			if ($(this).val() != "0"){
				window.location.href = "order/search/web/"+$(this).val();
			};
		});

		$('.budgetselect.bundle').change(function() {
			if ($(this).val() != "0"){
				window.location.href = "order/search/bundle/"+$(this).val();
			};
		});
	</script>

	<div class="block b100"></div>
	<hr class="nomargin">