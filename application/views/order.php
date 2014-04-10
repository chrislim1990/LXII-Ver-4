<style type='text/css'>
	.header_banner {background-image:url('img/products_banner/header.jpg');height: 400px;}
	/*.header_banner {background-color:#ededed;height: 400px;}*/
</style>
<div id="product" class="container">
	<div class="block b200"></div>
	<h1>Products</h1>
	<!-- <h3>Lorem ipsum dolor sit amet</h3> -->
	<div class="block b25"></div>
	<div class="col-md-8">
		<ul>
			<li class="filter gn-icon gn-icon-product" data-filter="all"> All</li>
			<li class="filter gn-icon gn-icon-web" data-filter="web"> Web</li>
			<li class="filter gn-icon gn-icon-graphic" data-filter="print"> Graphic</li>
			<li class="filter gn-icon gn-icon-branding" data-filter="branding"> Branding</li>
		</ul>
	</div>
	<div class="col-md-4">
		<input type="text" id="productsearch" placeholder="Search">
		<div class="resultswrapper">
			<ul class="productresults">
			</ul>
		</div>
	</div>
	<div class="block b100"></div>
	<ul id="Grid">

		<?php 
		foreach ($records as $r) {

			$cover_img = current(glob("img/products/$r->url.jpg"));
			if (!$cover_img) {
				$cover_img = current(glob("img/brokenlink.jpg"));
			}
			// $cover_img = current(glob("img/brokenlink.jpg"));
			$badge = $r->featured==1 ? "<span class='badge'>Featured</span>" : "";

			echo "
			<li class='mix $r->cat grid_item'>
				<a href='order/$r->url''>
					<img src='$cover_img'>
					$badge
					<h4>$r->title</h4><p>MYR $r->price</p>
				</a>

			</li>
			";
		};
		?>
	</ul>
</div>
<div class="block b100"></div>
<hr class="nomargin">


<?php

if(isset($_GET["cat"])){
	$filter_cat = $_GET["cat"];
} else {
	$filter_cat = "all";
};
?>

<script src="js/jquery.mixitup.min.js"></script>
<script>
	$(function(){
		$('#Grid').mixitup({
			showOnLoad: "<?php echo $filter_cat; ?>"
		});
	});
</script>