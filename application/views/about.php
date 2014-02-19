<div class="about-wrapper">
	<div class="container">
		<div class="block b200"></div>
		<h1 class="text-center">WHO WE ARE</h1>
		<h3 class="text-center">We Connect. We Refine. We are Perpetual.</h3>
		<div class="block b200"></div>

		<div class="row">
			<div class="col-md-6">
				<img src="img/studio_02.jpg">
			</div>
			<div class="col-md-6">
				<h2>
					We are connected.
				</h2>
				<div class="block"></div>
				<p>
					Advertising has always been a must to promote every business and product, and this is what LX2 excels in.
					We create memorables and recognizable identities for our clients, to connect their business or brands to the public.
					<br><br>
					Seek no further and let our passionate professionals aid you in your endeavors to be different in this challenging business arena! We love to help and worry not about challenges, we eat them for breakfasts!
				</p>
				<div class="block"></div>
				<a class='learn_more' href='contact'>Contact Us!</a>
			</div>
		</div>
	</div>

	<hr class="hr50">
</div>
<div class="container">

	<div class="block"></div>

	<div class="row philosophy">
		<div class="col-md-12">
			<h2>Our PHILOSOPHY</h2>
		</div>
		<div class="col-md-4">
			<h2>Connect</h2>
			<p>At LX2, Clients are our Friends.</p>
		</div>
		<div class="col-md-4">
			<h2>Refine</h2>
			<p>At LX2, We deliver the Best customer experience and High quality artworks.</p>
		</div>
		<div class="col-md-4">
			<h2>Perpetual</h2>
			<p>At LX2, We create Value and make a Difference.</p>
		</div>
	</div>

	<hr class="hr100">

	<div class="row">
		<div class="col-md-3">
			<h2>FAQ</h2>
			<p>
				Here are some answers to the questions that are most frequently asked by our clients and customers. Should there be any not in the list, feel free to contact us for further enquiry!			</p>
			</div>

			<div class="col-md-8 col-md-offset-1">
				<div class="panel-group" id="accordion">
					<?php 

					$faqs = array(
						array("What kind of services does LX2 provide?","We provide all kinds of graphic and web designs as requested by clients, from logo to website --- everything you need for your business."),
						array("LX2 is an online design firm, can we still have a face-to-face meeting?","Yes! We can always have a face-to-face meeting if that is the client's preference. This is because we want to inform and educate our valued client that we are an online design firm."),
						array("How long does it takes for a website to be completed?","For most of the web projects, we will try to complete it <a>within the time frame of 3 to 4 weeks</a> with the client’s full cooperation in providing necessary details such as required text and images. Thus client’s full cooperation is crucial in order to avoid any unwanted delay."),
						array("How much does a complete website costs?","The cost of a web site varies depending on <a>the site's complexity</a>. A basic website containing a home, about, gallery and contact page. We will be pleased to discuss with you when we receive your call, email, or order list through our website.  After that, we will send you a quotation based on your unique needs and design requirements.")
						);

foreach ($faqs as $key => $faq) {
	echo "
	<div class='panel panel-default'>
		<div class='panel-heading'>
			<h3 class='panel-title'>
				<a data-toggle='collapse' data-parent='#accordion' href='#faq-$key' class='accordion-toggle collapsed'>
					$faq[0]
					<span class='accordion_icon_mark'></span>
				</a>
			</h3>
		</div>
		<div id='faq-$key' class='panel-collapse collapse' style='height: 0px;'>
			<div class='panel-body'>
				<p>$faq[1]</p>
			</div>
		</div>
	</div>
	";
}
?>

</div>

</div>
</div>

<div class="block b200"></div>
</div>
<div class="call-to-action">
	<div class="container">
		<h4>Have you fallen in love yet?</h4>
		<a href="order" class="learn_more">Get Started Now!</a>
	</div>
</div>
<hr class="nomargin">