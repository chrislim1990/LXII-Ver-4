<?php 

$config["css"] = array('bootstrap-responsive.min','bootstrap.min','jquery.cycle2','jquery.fancybox','superslides','font-awesome.min','component','gnmenu','styles');
$config["js"] = array('bootstrap','jquery.superslides.min','jquery.fancybox','jquery.scrollTo.min','vmouse.min','jquery.animate-enhanced.min','jquery.easing.1.3','map','rhinoslider-1.05.min','jquery.validate.min','classie','gnmenu.min');

?>

<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<head>
	<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
	<title>LX2</title>
	<meta name="description" content="A Design Firm" />
	<meta name="keywords" content="design firm" />
	<meta name="author" content="LXII Design Studio" />
	<base href="http://localhost:8888/">
	<!-- <base href="http://localhost/php_test/lxii_ver4/public_html/"> -->
	<!-- <base href="http://www.lx2.com.my/lx2Web-Ver3/public_html/"> -->

	<?= links($config["css"],"css"); ?>
	<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0VFJxsJtbPPUBwJg54dNnde9RF2_Mce4&sensor=true">
	</script>

</head>
<body>
	

	<div class='block hide-on-large'></div>

	<ul id="gn-menu" class="gn-menu-main">
		<li class="gn-trigger">
			<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
			<nav class="gn-menu-wrapper">
				<div class="gn-scroller">
					<ul class="gn-menu">
						<li class="gn-search-item">
							<input placeholder="Search" type="search" class="gn-search">
							<a class="gn-icon gn-icon-search"><span>Search</span></a>
						</li>
						<li>
							<a class="gn-icon gn-icon-thumbs" href="about">About LXII</a>
							<ul class="gn-submenu">
								<li><a class="gn-icon gn-icon-thumbs">Our Mission</a></li>
								<li><a class="gn-icon gn-icon-thumbs">Charity</a></li>
							</ul>
						</li>
						<li><a class="gn-icon gn-icon-portfolio" href="portfolio">Porfolio</a></li>
						<li>
							<a class="gn-icon gn-icon-product" href="order">Products</a>
							<ul class="gn-submenu">
								<li><a class="gn-icon gn-icon-graphic"  href="order?cat=print">Graphic</a></li>
								<li><a class="gn-icon gn-icon-web"  href="order?cat=web">Web</a></li>
								<li><a class="gn-icon gn-icon-camera"  href="order?cat=photo">Photography</a></li>
							</ul>
						</li>
						<li><a class="gn-icon gn-icon-contact" href="contact">Contact</a></li>
					</ul>
				</div><!-- /gn-scroller -->
			</nav>
		</li>
		<li><a href="" id="logo"><img src="img/logo.png"></a></li>
	</ul>