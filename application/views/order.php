<style type='text/css'>
		.header_banner {background-image:url('img/products_banner/header.jpg');height: 400px;}
	/*.header_banner {background-color:#ededed;height: 400px;}*/
</style>

<div class="header_banner"></div>
<div id="product" class="container">
	<h1>Products</h1>

	<ul>
		<li class="filter" data-filter="all">All</li>
		<li class="filter" data-filter="web">Web</li>
		<li class="filter" data-filter="print">Print</li>
		<li class="filter" data-filter="branding">Branding</li>
	</ul>


	<ul id="Grid">

		<?php 
		foreach ($records as $r) {

			$cover_img = current(glob("img/products/$r->url.jpg"));
			if (!$cover_img) {
				$cover_img = current(glob("img/brokenlink.jpg"));
			}
			// $cover_img = current(glob("img/brokenlink.jpg"));
			if ($cover_img && $r->hidden!=1) {

				$badge = $r->featured==1 ? "<span class='badge'>Featured</span>" : "";

				echo "
				<li class='mix $r->cat grid_item'>
					<a href='order/$r->id''>
						<img src='$cover_img'>
						$badge
						<h4>$r->title</h4><p>MYR $r->price</p>
					</a>

				</li>
				";
			}
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