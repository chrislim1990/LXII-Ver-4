<div class="footer">
	<div class="col-md-3 footer-inner">
		<h4>Sitemap</h4>
		<a href="#">About</a><br class="hide-on-small">
		<a href="portfolio">Portfolio</a><br class="hide-on-small">
		<a href="contact">Contact</a><br class="hide-on-small">
	</div>
	<div class="col-md-3 footer-inner">
		<h4>Clients</h4>
		<?php
		$dir = "img/clients/";
		$awwww = array_diff(scandir($dir), array('..', '.'));
		natcasesort($awwww);
		foreach ($awwww as $yeah) {
			$ext = pathinfo($yeah, PATHINFO_EXTENSION);
			if($ext =="jpg" || $ext =="png" || $ext =="gif"){
				echo "<div class='client-logo'><img src='img/clients/".$yeah."'></div>";
			};
		};

		?>
	</div>
	<div class="col-md-3 footer-inner">

		<h4>Testimonies</h4>
		<div id="testi">

			<?php 
			$data = array();

			if ($q = $this->data_model->get_testimonial()) {
				$data["records"] = $q;
			};

			foreach ($q as $r) {
				if ($r->img == "") {
					$r->img = "default.jpg";
				}else{
					$r->img = $r->img.".jpg"; 
				}

				echo "
				<div>
					<img src='img/testimonials/$r->img'>
					<br class='hide-on-large'>
					<p>
						$r->text&nbsp;&nbsp;-&nbsp;&nbsp;<strong>$r->name</strong>
					</p>
				</div>
				";
			};

			?>
		</div>
	</div>
	<div class="col-md-3 footer-inner">
		<h4>Contact Us</h4>
		<p>A-6-3A, Casa Idaman, 51100, KL, Malaysia<br>
			<a href="mailto:services@lx2.com.my">services@lx2.com.my</a><br>
			(+60)3-62418948
		</p>
	</div>
</div>
<hr class="nomargin">
<div class="footer-lower">
	<h4>Made in KL</h4>
</div>


<?= links($config["js"],"js"); ?>

<script>
	function imgError(image) {
		image.onerror = "";
		image.src = "img/brokenlink.jpg";
		return true;
	};

	$(document).ready(function() {
		$('#testi').rhinoslider({
			showTime: 6000,
			controlsMousewheel: false,
			controlsPlayPause: false,
			showBullets: 'never',
			showControls: 'always',
			autoPlay: true,
			prevText: '<i class="fa fa-angle-left"></i>',
			nextText: '<i class="fa fa-angle-right"></i>',
		});

		$('#proslider').rhinoslider({
			showTime: 4000,
			controlsMousewheel: false,
			controlsKeyboard: false,
			controlsPrevNext: false,
			controlsPlayPause: false,
			autoPlay: true,
			showBullets: 'never',
			showControls: 'never'
		});
	});

	<?php
	if($this->uri->segment(1) == "order"){
		echo "
		$(document).ready(function() {
			$('#slide2').hide();
			$('#slide3').hide();

			$('#control1').mouseup(function(){
				$(this).addClass('current');
				$('#control2').removeClass('current');
				$('#control3').removeClass('current');
				$('#slide1').show();
				$('#slide2').hide();
				$('#slide3').hide();
			});

$('#control2').mouseup(function(){
	$(this).addClass('current');
	$('#control1').removeClass('current');
	$('#control3').removeClass('current');
	$('#slide2').show();
	$('#slide1').hide();
	$('#slide3').hide();
});

$('#control3').mouseup(function(){
	$(this).addClass('current');
	$('#control1').removeClass('current');
	$('#control2').removeClass('current');
	$('#slide3').show();
	$('#slide1').hide();
	$('#slide2').hide();
});
});
";
} 
?>
// Push Menu
$(document).ready(function() {
	$(document.body).addClass('cbp-spmenu-push');
	$('#cart_count').text($('#total_item').text());
});


var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
body = document.body;

$('#product_place_order,#view_cart,#cbp-overlay').click(function(){

	$('#cbp-overlay').toggle();
	classie.toggle( this, 'active' );
	classie.toggle( body, 'cbp-spmenu-push-toleft' );
	classie.toggle( menuRight, 'cbp-spmenu-open' );

	// Cart Count
	var total_item_in_cart = parseInt($('#total_item').text());
	if(this.id=="product_place_order" ){total_item_in_cart += 1; };
	$('#cart_count').text(total_item_in_cart);

});

// JCart
</script>
<script>
	$('[name=exp]').click(function(){
		if($(this).is(':checked')){
			price = '10000';
			itemId = 99;
			newname = 'Damn Exp Logo';
		} else {
			price = '399';
			itemId = 1;
			newname = 'Normal Logo';
		}
		$('#product-price').text(price);
		$('[name=my-item-price]').val(price);
		$('[name=my-item-id]').val(itemId);
		$('[name=my-item-name]').val(newname);
	});

</script>

<script type="text/javascript" src="jcart/js/jcart.min.js"></script>

<script>
	new gnMenu( document.getElementById( 'gn-menu' ) );
</script>

</body>
</html>