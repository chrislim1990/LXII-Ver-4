# Utility Helper

## Create Menu

Using the predefine `$config[menu]` to generate `li`.

$config[menu] sample:

	$config["menu"] = array (
	array('/home','Home')
	);
	
Usage:

	echo create_menu($config["menu"]);

Output:

	<li class='active'><a href='/home'>Home</a></li>

---

# Form Helper

Start with `form_open` and set the destination of the form.

## form_label
	
	echo form_label('What is your Name', 'username');

Would produce: 

	<label for="username">What is your Name</label>	
## form_input

	echo form_input('message' ,set_value('message'), 'id="message"');

Would produce:

	<input type="text" name="message" value="" id="message">

## form_hidden

	form_hidden('username', 'johndoe');

Would produce:
	
	<input type="hidden" name="username" value="johndoe" />


## A simple form sample

	echo form_open('article/create');

	echo form_label('What is your Name', 'username');
	echo form_input('username' ,'', 'id="username"');
	echo form_submit('submit','Submit');

	echo form_close();
	echo validation_errors();
	
---
	
# HTML Helper

## nbs

Generates non-breaking spaces (&nbsp;) based on the number you submit. Example:

	echo nbs(2);
	
The above would produce: `&nbsp;&nbsp;&nbsp;`

## anchor()

The first parameter can contain any segments you wish appended to the URL. As with the site_url() function above, segments can be a string or an array.

	anchor(uri segments, text, attributes)
	
Sample:

	echo anchor('news/local/123', 'My News', 'title="News title"');