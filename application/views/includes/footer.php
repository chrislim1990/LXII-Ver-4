<div class="container-fluid">
	<div class="footer row">
		<div class="col-sm-4 col-md-4 footer-inner">
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

		<div class="col-sm-4 col-md-4 footer-inner">

			<h4>Testimonies</h4>
			<div id="testimonies" class="owl-carousel">

				<?php 
				$data = array();

				if ($q = $this->data_model->get_testimonial()) {
					$data["records"] = $q;
				};

				foreach ($q as $r) {

					$r->img = $r->img ? $r->img.".jpg":"default.jpg";

					echo "
					<div class='item'>
						<img src='img/testimonials/$r->img'/>
						<br class='hide-on-large'>
						<p>
							$r->text&nbsp;&nbsp;-&nbsp;&nbsp;<strong>$r->name</strong>
						</p>
					</div>
					";
				};
				?>
			</div>
			<a class="btn prev"><i class="fa fa-angle-left"></i></a>
			<a class="btn next"><i class="fa fa-angle-right"></i></a>
		</div>
		<div class="col-sm-4 col-md-4 footer-inner">
			<h4>Contact Us</h4>
			<p>
				<b>LXII Design Studio</b><br>
				A-6-3A, Casa Idaman, 51100, KL, Malaysia<br>
				<a href="mailto:services@lx2.com.my">services@lx2.com.my</a><br>
				(+60)3-62418948
			</p>
		</div>
	</div>
</div>
<hr class="nomargin">
<div class="footer-lower">
	<h4>Made in KL</h4>
</div>


<?= links($config["js"],"js"); ?>


<script type="text/javascript" src="jcart/js/jcart.min.js"></script>
<script>
	$("#results").hide();

	new gnMenu( document.getElementById( 'gn-menu' ) );

// google-analytics
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-48201751-1', 'lx2.com.my');
ga('send', 'pageview');


// testimonies
$(document).ready(function() {
	var testimonies = $("#testimonies");
	testimonies.owlCarousel({
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : true,
		pagination : false
	});
	$(".next").click(function(){
		testimonies.trigger('owl.next');
	})
	$(".prev").click(function(){
		testimonies.trigger('owl.prev');
	})
});

</script>

</body>
</html>