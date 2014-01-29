-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2014 at 10:39 AM
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
  `content` varchar(9999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `title`, `content`) VALUES
(0, 'Client', 'a:6:{i:0;a:3:{i:0;s:10:"Given Name";i:1;s:10:"given_name";i:2;s:4:"text";}i:1;a:3:{i:0;s:20:"Family Name/ Surname";i:1;s:8:"sur_name";i:2;s:4:"text";}i:2;a:3:{i:0;s:12:"Company Name";i:1;s:12:"company_name";i:2;s:4:"text";}i:3;a:4:{i:0;s:12:"Mobile Phone";i:1;s:6:"mobile";i:2;s:4:"text";i:3;s:94:"LXII Design Studio will use your mobile number if we need to contact you regarding your order.";}i:4;a:4:{i:0;s:13:"Email Address";i:1;s:5:"email";i:2;s:4:"text";i:3;s:4:"<hr>";}i:5;a:5:{i:0;s:87:"<p><b>Sign Me Up!</b> I would like to promotional material from LXII Design Studio!</p>";i:1;s:10:"newsletter";i:2;s:8:"checkbox";i:3;s:0:"";i:4;s:7:"checked";}}'),
(4, 'General', 'a:6:{i:0;a:4:{i:0;s:13:"Business Name";i:1;s:13:"business_name";i:2;s:4:"text";i:3;s:34:"What is the name of your business?";}i:1;a:4:{i:0;s:17:"Services Provided";i:1;s:17:"services_provided";i:2;s:4:"text";i:3;s:49:"What service or product does your business offer?";}i:2;a:4:{i:0;s:15:"Target Audience";i:1;s:15:"target_audience";i:2;s:4:"text";i:3;s:42:"Who are your primary clients or consumers?";}i:3;a:4:{i:0;s:10:"Uniqueness";i:1;s:10:"uniqueness";i:2;s:8:"textarea";i:3;s:58:"What is unique about your company versus your competitors?";}i:4;a:4:{i:0;s:18:"Brands Differences";i:1;s:18:"brands_differences";i:2;s:8:"textarea";i:3;s:68:"What is the primary differentiator between you and your competitors?";}i:5;a:4:{i:0;s:10:"Impression";i:1;s:10:"impression";i:2;s:8:"textarea";i:3;s:155:"How would you like clients, consumers and prospects to perceive your company when they see your brand? (e.g. I want them to feel that we are professionals)";}}'),
(5, 'Logo', 'a:6:{i:0;a:5:{i:0;s:10:"Logo Style";i:1;s:10:"logo_style";i:2;s:9:"checkbox2";i:3;s:50:"Select <strong>2</strong> type of logo you prefer.";i:4;s:74:"Wordmark,Pictorial Mark,Abstract Mark,Letterform Mark,Emblem,Character,Web";}i:1;a:4:{i:0;s:9:"Logo Name";i:1;s:9:"logo_name";i:2;s:4:"text";i:3;s:69:"Please write the exact name as you would like to appear in your logo.";}i:2;a:4:{i:0;s:7:"Tagline";i:1;s:7:"tagline";i:2;s:4:"text";i:3;s:65:"What is your tagline if applicable. Do you want this in the logo?";}i:3;a:4:{i:0;s:19:"Color Preference(s)";i:1;s:17:"color_preferences";i:2;s:4:"text";i:3;s:81:"Do you have any colour preferences or any existing colours you want in your logo?";}i:4;a:4:{i:0;s:15:"Logo Attributes";i:1;s:15:"logo_attributes";i:2;s:4:"text";i:3;s:69:"What attributes of your business would you like your logo to reflect?";}i:5;a:4:{i:0;s:16:"Message Delivery";i:1;s:16:"message_delivery";i:2;s:4:"text";i:3;s:71:"What is the overall message you want to convey to your target audience?";}}'),
(6, 'Website', 'a:1:{i:0;a:4:{i:0;s:21:"Website Functionality";i:1;s:21:"website_functionality";i:2;s:4:"text";i:3;s:14:"Functionalityy";}}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
