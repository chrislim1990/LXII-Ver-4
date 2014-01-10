<div class="container contact">
	<div class="block b100"></div>
	<h1>Contact Us</h1>
	<p>A-6-3A, Casa Idaman, 51100, KL, Malaysia | <a href="mailto:services@lx2.com.my">services@lx2.com.my</a> | (+60)3-62418948</p>
	<div class="block b100"></div>
</div>

<div class="jumbotron">
	<div  id="map-canvas"></div>
</div>
<div class="container contact">
	<div class="block b100"></div>

	<div class="row">
		<div class="col-md-12">
			<h3>Contact Us</h3><br>
			<?php 

			echo form_open('contact/email');

			echo form_label('', 'name');
			echo form_input('name' ,set_value('name'), 'id="name" placeholder="Name"');

			echo form_label('', 'company');
			echo form_input('company' ,set_value('company'), 'id="company" placeholder="Company"');

			echo form_label('', 'email');
			echo form_input('email' ,set_value('email'), 'id="email" placeholder="Email"');

			echo form_label('', 'contact');
			echo form_input('contact' ,set_value('contact'), 'id="contact" placeholder="Contact Number"');

			echo form_label('', 'message');
			echo form_textarea('message' ,set_value('message'), 'id="message" placeholder="Message"');
			echo "<br><br>";
			echo form_submit('submit','Submit');

			echo form_close();

			echo validation_errors();

			?>
		</div>
	</div>
</div>
<div class="block b100"></div>
<hr class="nomargin">