<style type='text/css'>
/*	.header_banner {background-image:url('img/home-slideshows/d-coat.jpg');height: 400px;}*/
	.header_banner {background-color:#ededed;height: 400px;}
</style>

<div class="header_banner"></div>
<div id="product" class="container">
	<h1>Product</h1>

	<ul>
		<li class="filter" data-filter="all">All</li>
		<li class="filter" data-filter="web">Web</li>
		<li class="filter" data-filter="print">Print</li>
		<li class="filter" data-filter="branding">Brading</li>
	</ul>


	<ul id="Grid">

		<?php 
		foreach ($records as $r) {

	// $cover_img = current(glob("img/products/$r->url.jpg"));
			$cover_img = current(glob("img/brokenlink.jpg"));
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

<script src="js/jquery.mixitup.min.js"></script>

<?php
$filter_cat = $_GET["cat"] ? $_GET["cat"] : "all";
?>

<script>
	$(function(){
		$('#Grid').mixitup({
			showOnLoad: "<?php echo $filter_cat; ?>",
		});
	});
</script>