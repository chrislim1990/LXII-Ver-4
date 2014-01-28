-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2014 at 12:15 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lxii_ver4`
--

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE IF NOT EXISTS `forms` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `title`, `content`) VALUES
(0, 'Client', 'a:6:{i:0;a:3:{i:0;s:10:"Given Name";i:1;s:10:"given_name";i:2;s:4:"text";}i:1;a:3:{i:0;s:20:"Family Name/ Surname";i:1;s:8:"sur_name";i:2;s:4:"text";}i:2;a:3:{i:0;s:12:"Company Name";i:1;s:12:"company_name";i:2;s:4:"text";}i:3;a:4:{i:0;s:12:"Mobile Phone";i:1;s:6:"mobile";i:2;s:4:"text";i:3;s:94:"LXII Design Studio will use your mobile number if we need to contact you regarding your order.";}i:4;a:4:{i:0;s:13:"Email Address";i:1;s:5:"email";i:2;s:4:"text";i:3;s:4:"<hr>";}i:5;a:5:{i:0;s:87:"<p><b>Sign Me Up!</b> I would like to promotional material from LXII Design Studio!</p>";i:1;s:10:"newsletter";i:2;s:8:"checkbox";i:3;s:0:"";i:4;s:7:"checked";}}'),
(4, 'General', 'a:1:{i:0;a:4:{i:0;s:12:"Overall Feel";i:1;s:4:"feel";i:2;s:4:"text";i:3;s:8:"Feeellll";}}'),
(5, 'Logo', 's:1148:"array ( 0 => array ( 0 => ''Logo Type'', 1 => ''logo_type'', 2 => ''text'', 3 => ''Tell us what kind of logo you''d like to have. Is it a typography logo, or you are more interested in a mascot, or something else?'', ), 1 => array ( 0 => ''Logo Name'', 1 => ''logo_name'', 2 => ''text'', 3 => ''Please write the exact name as you would like to appear in your logo.'', ), 2 => array ( 0 => ''Taglines'', 1 => ''logo_tagline'', 2 => ''text'', 3 => ''What is your tagline if applicable. Do you want this in the logo?'', ), 3 => array ( 0 => ''Color Preference(s)'', 1 => ''logo_pref'', 2 => ''text'', 3 => ''Do you have any colour preferences or any existing colours you want in your logo?'', ), 4 => array ( 0 => ''Logo Attributes'', 1 => ''logo_attrib'', 2 => ''text'', 3 => ''What attributes of your business would you like your logo to reflect?'', ), 5 => array ( 0 => ''Message Delivery'', 1 => ''logo_message'', 2 => ''text'', 3 => ''What is the overall message you want to convey to your target audience?'', ), )"; '),
(6, 'Website', 'a:1:{i:0;a:4:{i:0;s:21:"Website Functionality";i:1;s:21:"website_functionality";i:2;s:4:"text";i:3;s:14:"Functionalityy";}}');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `cat` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `year` int(11) NOT NULL DEFAULT '2000',
  `color` varchar(255) NOT NULL DEFAULT 'white',
  `featured` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `tagline`, `desc`, `cat`, `url`, `year`, `color`, `featured`) VALUES
(3, 'Icy Roll', 'Tasty & Fun', 'With its idea stems upon the feeling of happiness and joyfulness, we created a bright and refreshing look for Icy Roll. Audiences would surely love the colorful and refreshing sight of Icy Roll''s corporate items in hot summer.', 'Branding', 'icyroll', 2012, 'black', 0),
(4, 'Sentosa Villa', 'Natural Retreat for Everyone', 'In the first sight, the website for Sentosa Villa would bestows the feeling of warm and elegance to its audiences. That is what the hotel owner wishes to deliver: to let the audiences feel as welcoming as possible. \r\n<br><br>\r\nWe used fonts and colors of classical feel to further enhance the elegant feeling a hotel or family resort should have. The contents is delivered in a clean and simple way to aids navigation as older family members were added into our consideration.', 'Branding . Web', 'sentosa', 2012, 'white', 1),
(5, 'Hock Hean Hui', 'Professional Blues', 'Website for Hock Hean Hui aims at middle age workers and truck drivers, so it mostly emphasizes on the visibility of contents. Thus, we made the website as simple as possible, while also comes with adequate amount of design elements to make it looks modern and clean.', 'Web', 'hhh', 2010, 'black', 0),
(7, 'Nowax', 'We designed Nowax''s website to be high-tech and modern looking, as suitable to how its industry supposed to be. The color combination of teal and metallic grey clearly delivers the theme of the whole industry.', 'We designed Nowax''s website to be high-tech and modern looking, as suitable to how its industry supposed to be. The color combination of teal and metallic grey clearly delivers the theme of the whole industry.', 'Branding . Web', 'nowax', 2012, 'black', 0),
(8, 'Logo', 'Unique . Memorable . Long-lasting', 'The art of designing a logo may looks like a simple task, but to be a truly perfect logo, one has to be with these three major factors: unique, memorable and accurate. \nTo be unique is to stand out among your business opponents. \nTo be memorable is to be able to stays inside your audiences'' mind easily, and attractively. \nLastly, to be accurate is that the logo could delivers your business directly precisely to the audiences. \nWe at LX2 design studios always do our best to put these three major factors into your design.', 'Branding', 'logo', 2010, 'black', 0),
(9, 'Dukes', 'Professional Confidence', 'Dukes''s branding is done with the expression of professionalism in mind, to bolster the confidence of audiences and encourage them to deal with someone that has the professionalism to deal with their queries.', 'Branding . Web', 'dukes', 2012, 'black', 0),
(10, 'New Mogen', 'Fun & Tasty', 'The reason we use white and clean background for Hunny B is to attract the audiences with the colorfulness of photos and images in the website. \r\n<br><br>\r\nThe color usage is designed to be brighter and more lively to attract audiences from lower age range.', 'Branding . Web', 'nm', 2010, 'black', 0),
(11, 'JCI', 'Fun & Tasty', 'The reason we use white and clean background for Hunny B is to attract the audiences with the colorfulness of photos and images in the website. \r\n<br><br>\r\nThe color usage is designed to be brighter and more lively to attract audiences from lower age range.', 'Branding . Web', 'jci', 2010, 'black', 0),
(12, 'Hunny B', 'Fun & Tasty', 'The reason we use white and clean background for Hunny B is to attract the audiences with the colorfulness of photos and images in the website. \r\n<br><br>\r\nThe color usage is designed to be brighter and more lively to attract audiences from lower age range.', 'Branding . Web', 'hunnyb', 2010, 'black', 0),
(13, 'Ericsson', 'Fun & Tasty', 'The reason we use white and clean background for Hunny B is to attract the audiences with the colorfulness of photos and images in the website. \r\n<br><br>\r\nThe color usage is designed to be brighter and more lively to attract audiences from lower age range.', 'Branding . Web', 'ericsson', 2010, 'black', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `hidden` int(11) NOT NULL DEFAULT '0',
  `featured` int(11) NOT NULL DEFAULT '0',
  `cat` varchar(255) NOT NULL,
  `set` varchar(255) NOT NULL,
  `options` int(11) NOT NULL DEFAULT '2',
  `amend` int(11) NOT NULL DEFAULT '2',
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `desc`, `hidden`, `featured`, `cat`, `set`, `options`, `amend`, `url`) VALUES
(1, 'Logo Design', '800', 'An unique logo to represents your business idea, philosophy, and value.', 0, 1, 'graphic', 'branding', 2, 2, 'logo'),
(2, 'Letterhead', '300', 'A kind reminder of your business and how to contact you for fellow customers.', 0, 1, 'graphic', 'stationary', 2, 2, 'letterhead'),
(3, 'Envelope', '200', 'Impress your customers with every letter you send.', 0, 1, 'graphic', 'stationary', 2, 2, 'envelope'),
(4, 'Business Card', '300', 'An unique presentation for yourself.', 0, 1, 'graphic', 'stationary', 2, 2, 'card'),
(5, 'Brochure', '200/side', 'A medium to promote your awesome products, with style and class.', 0, 0, 'graphic', 'printing', 2, 2, 'brochure'),
(6, 'Leaflet', '150/side', 'Spread the news of your business to the public efficiently! ', 0, 0, 'graphic', 'printing', 2, 2, 'leaflet'),
(7, 'Flyer', '150/side', 'Spread the news of your business to the public efficiently! ', 0, 0, 'graphic', 'printing', 2, 2, 'flyer'),
(8, 'Poster', '500', 'Visualize your business to impress the mass and impact their senses.', 0, 0, 'graphic', 'printing', 2, 2, 'poster'),
(9, 'Pocket Folder', '250', 'Design an logo that matches your bus', 0, 0, 'graphic', 'branding', 2, 2, 'folder'),
(10, 'Product Label', '250', '', 0, 0, 'graphic', 'branding', 2, 2, 'label'),
(11, 'Newsletter - Web', '300', '', 0, 0, 'web', 'advertising', 2, 2, 'webnews'),
(12, 'Newsletter - Print', '350', '', 0, 0, 'print', 'advertising', 2, 2, 'printnews'),
(13, 'Print Advertising', '1000', 'Stand out from the others inside magazine, newspaper or yellow pages!', 0, 0, 'print', 'advertising', 2, 2, 'adslarge'),
(14, 'Print Advertising - Smaller than Half Page', '500', 'Stand out from the others inside magazine, newspaper or yellow pages!', 1, 0, 'print', 'advertising', 2, 2, 'adssmall'),
(15, 'Catalog - Cover', '400', 'Showcase products and services to your clients and customers with style and class.', 0, 0, 'print', 'catalog', 2, 2, 'catcover'),
(16, 'Catalog - 4-8 pages', '120/pg', 'Showcase products and services to your clients and customers with style and class.', 0, 0, 'print', 'catalog', 2, 2, 'catcontent1'),
(17, 'Catalog - 12-16 pages', '100/pg', 'Showcase products and services to your clients and customers with style and class.', 0, 0, 'print', 'catalog', 2, 2, 'catcontent2'),
(18, 'Catalog - 20-24 pages', '80/pg', 'Showcase products and services to your clients and customers with style and class.', 0, 0, 'print', 'catalog', 2, 2, 'catcontent3'),
(19, 'Catalog - 28-32 pages', '60/pg', 'Showcase products and services to your clients and customers with style and class.', 0, 0, 'print', 'catalog', 2, 2, 'catcontent4'),
(20, 'Catalog - > 36 pages', '50/pg', 'Showcase products and services to your clients and customers with style and class.', 0, 0, 'print', 'catalog', 2, 2, 'catcontent5'),
(21, 'Booklet - Cover', '400', 'Make it into anything you can think of - be it a premium brochure, a company profile, or an awesome product catalog!', 0, 0, 'print', 'booklet', 2, 2, 'bookcover'),
(22, 'Booklet - 4-8 pages', '70/pg', 'Make it into anything you can think of - be it a premium brochure, a company profile, or an awesome product catalog!', 0, 0, 'print', 'booklet', 2, 2, 'bookcontent1'),
(23, 'Booklet - 16-32 pages', '60/pg', 'Make it into anything you can think of - be it a premium brochure, a company profile, or an awesome product catalog!', 0, 0, 'print', 'booklet', 2, 2, 'bookcontent2'),
(24, 'Booklet - 36-72 pages', '50/pg', 'Make it into anything you can think of - be it a premium brochure, a company profile, or an awesome product catalog!', 0, 0, 'print', 'booklet', 2, 2, 'bookcontent3'),
(25, 'Booklet - >72 pages', '40/pg', 'Make it into anything you can think of - be it a premium brochure, a company profile, or an awesome product catalog!', 0, 0, 'print', 'booklet', 2, 2, 'bookcontent4'),
(26, 'Mascot Design', '1000', 'Materialize your business into an awesome character to attract people''s eyes!', 0, 0, 'branding', 'branding', 2, 2, 'mascot'),
(27, 'CD/DVD', '150', 'A well-received and friendly medium to provide information to your clients and customers.', 0, 0, 'print', 'branding', 2, 2, 'cddvd'),
(28, 'Non Woven Bag', '150/side', '', 0, 0, 'print', 'branding', 2, 2, 'bag'),
(29, 'Ticket', '150/side', 'An awesome ticket that can be shown to an event''s staffs, or your customers'' friends in his collectibles cabinet.', 0, 0, 'print', 'branding', 2, 2, 'ticket'),
(30, 'Tshirt', '300', 'Be it your staffs or your customers, have them wear it with pride and joy!', 0, 0, 'print', 'branding', 2, 2, 'tshirt'),
(31, 'Calendar - Pocket Sheet', '250', '', 0, 0, 'print', 'branding', 2, 2, 'calendar1'),
(32, 'Calendar - 12/6 sheet', '150/sheet', '', 0, 0, 'print', 'branding', 2, 2, 'calendar2'),
(33, 'Pops - Small (< 2ft)', '600', 'A bright and refreshing sight to attract passerby.', 0, 0, 'print', 'advertising', 2, 2, 'popssmall'),
(34, 'Pops - Medium (< 5ft)', '1200', 'A bright and refreshing sight to attract passerby.', 0, 0, 'print', 'advertising', 2, 2, 'popsmed'),
(35, 'Pops - Large (< 8ft)', '2000', 'A bright and refreshing sight to attract passerby.', 0, 0, 'print', 'advertising', 2, 2, 'popslarge'),
(36, 'Packaging', '800', '', 0, 0, 'packaging', 'branding', 2, 2, 'packaging'),
(37, 'Web Banner Design', '300', '', 0, 0, 'web', 'advertising', 2, 2, 'webbanner'),
(38, 'Royalty Photo', '50/pic', '', 0, 0, 'photography', 'photography', 2, 2, 'photo1'),
(39, 'Professional Shooting', '50/pic', 'Delivers your message with a professionally-shot photo.', 0, 0, 'photography', 'photography', 2, 2, 'photo2'),
(40, 'Product Shooting', '50/pic', '', 0, 0, 'photography', 'photography', 2, 2, 'photo3'),
(41, 'Banner Design', '600', 'Design an banner that matches your business.', 0, 0, 'print', 'advertising', 2, 2, 'banner'),
(42, 'Bunting', '600', 'Easily promotes your business by attracting the passerby!', 0, 0, 'print', 'advertising', 2, 2, 'bunting'),
(43, 'Vehicle Graphic', '800', 'An awesome moving billboard to promote your business!', 0, 0, 'print', 'advertising', 2, 2, 'vehicle'),
(44, 'Backdrop', '800', 'Promotes your business clearly and powerfully', 0, 0, 'print', 'advertising', 2, 2, 'backdrop'),
(45, 'Signage', '800', '', 0, 0, 'print', 'advertising', 2, 2, 'signage'),
(46, 'Display/Booth Design - 20sq.ft', '1000', '', 0, 0, 'print', 'advertising', 2, 2, 'booth'),
(47, 'Website Design', '500/pg', '', 0, 0, 'web', 'branding', 2, 2, 'webdesign'),
(48, 'Website Coding', '500/pg', '', 0, 0, 'web', 'branding', 2, 2, 'webcoding'),
(49, 'Mobile Version', '500', '', 0, 0, 'web', 'branding', 2, 2, 'webmobile'),
(50, 'CMS', '800', '', 0, 0, 'web', 'branding', 2, 2, 'webcms'),
(51, 'Copywriting', '400', 'A slogan, or a short text to tell people about the story of your business, we can write it in the most exciting way.', 0, 0, 'branding', 'branding', 2, 2, 'copywrite');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `cat` varchar(255) NOT NULL DEFAULT 'menu',
  `url` varchar(255) NOT NULL DEFAULT 'null',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `title`, `cat`, `url`) VALUES
(1, 'Home', 'menu', '#1'),
(2, 'About LX2', 'menu', 'about'),
(3, 'Portfolio', 'menu', 'portfolio'),
(4, 'Our Mission', 'menu', 'mission'),
(5, 'Products', 'menu', 'products'),
(6, 'Contact', 'menu', 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `slideshows`
--

CREATE TABLE IF NOT EXISTS `slideshows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `slideshows`
--

INSERT INTO `slideshows` (`id`, `project`, `categories`, `source`, `link`) VALUES
(1, 'Sentosa Villa', 'Photography. Website', 'sentosa-villa', 'google.com'),
(2, 'D-Coat', 'Packaging. Website', 'd-coat', 'meh'),
(3, 'New Mogen', 'Logo . Website', 'nm', 'meh'),
(4, 'Logo', '', 'logo', 'meh');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `text`, `img`) VALUES
(1, 'Amelia Au', 'Professional, adaptable, reliable and creative. The team is also friendly and easy to work with. Highly recommended!', 'amleisure'),
(2, 'Franice Chiam', 'Although there were many changes requested from us, but you take it in a very positive way and fully understand what we want by providing some idea for better improvement.', 'bdf'),
(6, 'Chris', 'This is amazing!', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
