<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0VFJxsJtbPPUBwJg54dNnde9RF2_Mce4&sensor=true"></script>

<div class="container contact">
	<div class="block b200"></div>
	<h1>Contact Us</h1>
	<p>A-6-3A, Casa Idaman, 51100, KL, Malaysia | <a href="mailto:services@lx2.com.my">services@lx2.com.my</a> | (+60)3-62418948</p>
	<div class="block b200"></div>
</div>

<div class="jumbotron">
	<div  id="map-canvas"></div>
</div>

<div class="container contact">
	<div class="block b100"></div>
	<div class="row">
		<div class="col-md-12">
			<h3>Contact Us</h3><br>
			<form action="contact/sent" method="post" accept-charset="utf-8" id="contactform">
				<label for="name"></label><input type="text" name="name" value="" id="name" placeholder="Name">
				<label for="company"></label><input type="text" name="company" value="" id="company" placeholder="Company">
				<label for="email"></label><input type="text" name="email" value="" id="email" placeholder="Email">
				<label for="contact"></label><input type="text" name="contact" value="" id="contact" placeholder="Contact Number">
				<label for="message"></label><textarea name="message" cols="40" rows="10" id="message" placeholder="Message"></textarea>
				<br><br>
				<input type="submit" class="learn_more" name="submit" value="Submit"></form>
			</div>
		</div>
	</div>
	<div class="block b100"></div>
	<hr class="nomargin">

	<script type="text/javascript">
		$().ready(function() {

			$("#contactform").validate({
				rules: {

					name: "required",
					message: "required",
					contact: {
						required: true,
						digits: true,
						minlength: 6
					},
					email: {
						required: true,
						email: true,
					}
				},

				messages: {

					name: "Your name is required",
					message : "At least you have to tell us what are your concern...",
					contact: {
						required: "Just in case we are interested in your voice",
						digits: "Did I smell alphabets?",
						minlength: "Please provide us your contact number along with your country's <a href='http://en.wikipedia.org/wiki/List_of_country_calling_codes' target='_blank'>dialing code</a>."
					},
					email: {
						required: "We need this to get back to you",
						email: "We need a valid email to get back to you",
					},
				}
			});
		});
	</script>