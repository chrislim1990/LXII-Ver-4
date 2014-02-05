<?php

// jCart v1.3
// http://conceptlogic.com/jcart/

// This file is called when any button on the checkout page (PayPal checkout, update, or empty) is clicked

// Include jcart before session start
include_once('jcart.php');

$config = $jcart->config;

// The update and empty buttons are displayed when javascript is disabled 
// Re-display the cart if the visitor has clicked either button
if ($_POST['jcartUpdateCart'] || $_POST['jcartEmpty']) {

  // Update the cart
  if ($_POST['jcartUpdateCart']) {
    if ($jcart->update_cart() !== true) {
      $_SESSION['quantityError'] = true;
    }
  }

  // Empty the cart
  if ($_POST['jcartEmpty']) {
    $jcart->empty_cart();
  }

  // Redirect back to the checkout page
  $protocol = 'http://';
  if (!empty($_SERVER['HTTPS'])) {
    $protocol = 'https://';
  }

  header('Location: ' . $protocol . $_SERVER['HTTP_HOST'] . $config['checkoutPath']);
  exit;
}

// THE VISITOR HAS CLICKED THE PAYPAL CHECKOUT BUTTON
else
{

   ///////////////////////////////////////////////////////////////////////
   ///////////////////////////////////////////////////////////////////////
   /*

   A malicious visitor may try to change item prices before checking out,
   either via javascript or by posting from an external script.

   Here you can add PHP code that validates the submitted prices against
   your database or validates against hard-coded prices.

   The cart data has already been sanitized and is available thru the
   $cart->get_contents() function. For example:

   foreach ($cart->get_contents() as $item)
      {
      $item_id   = $item['id'];
      $item_name   = $item['name'];
      $item_price   = $item['price'];
      $item_qty   = $item['qty'];
      }

   */
   ///////////////////////////////////////////////////////////////////////
   ///////////////////////////////////////////////////////////////////////

      $valid_prices = true;

   ///////////////////////////////////////////////////////////////////////
   ///////////////////////////////////////////////////////////////////////

   // IF THE SUBMITTED PRICES ARE NOT VALID
      if ($valid_prices !== true)
      {
      // KILL THE SCRIPT
        die($jcart['text']['checkout_error']);
      }

   // PRICE VALIDATION IS COMPLETE
   // SEND CART CONTENTS TO PAYPAL USING THEIR UPLOAD METHOD, FOR DETAILS SEE http://tinyurl.com/djoyoa
      else if ($valid_prices === true)
      {

        // Check which button users had press
        if ($_POST['jcartPaypalCheckout']=="Checkout with PayPal") {

          // PayPal
          // Paypal count starts at one instead of zero
          $count = 1;

    // Build the query string
          $queryString  = "?cmd=_cart";
          $queryString .= "&upload=1";
          $queryString .= "&charset=utf-8";
          $queryString .= "&currency_code=" . urlencode($config['currencyCode']);
          $queryString .= "&business=" . urlencode($config['paypal']['id']);
          $queryString .= "&return=" . urlencode($config['paypal']['returnUrl']);
          $queryString .= "&rm=" . urlencode($config['paypal']['rm']);
          $queryString .= '&notify_url=' . urlencode($config['paypal']['notifyUrl']);

          foreach ($jcart->get_contents() as $item) {

            $queryString .= '&item_number_' . $count . '=' . urlencode($item['id']);
            $queryString .= '&item_name_' . $count . '=' . urlencode($item['name']);
            $queryString .= '&amount_' . $count . '=' . urlencode($item['price']);
            $queryString .= '&quantity_' . $count . '=' . urlencode($item['qty']);

      // Increment the counter
            ++$count;
          }

    // Empty the cart
        $_SESSION["cartcheck"] = array();

          foreach ($jcart->get_contents() as $item){
            $_SESSION["cartcheck"][] = $item;
          };

         $jcart->empty_cart();

    // Confirm that a PayPal id is set in config.php
          if ($config['paypal']['id']) {

      // Add the sandbox subdomain if necessary
            $sandbox = '';
            if ($config['paypal']['sandbox'] === true) {
              $sandbox = '.sandbox';
            }

      // Use HTTPS by default
            $protocol = 'https://';
            if ($config['paypal']['https'] == false) {
              $protocol = 'http://';
            }

      // Send the visitor to PayPal
            @header('Location: ' . $protocol . 'www' . $sandbox . '.paypal.com/cgi-bin/webscr' . $queryString);
          }
          else {
            die('Couldn&rsquo;t find a PayPal ID in <strong>config.php</strong>.');
          }

        }else{

          $totalprice = 0;


          foreach ($jcart->get_contents() as $item){
            $itemtotal = $item["price"]*$item["qty"];
            $totalprice += $itemtotal;
          };

          // Offline
          $message = "New Order:\n\n";

          $message.= "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">\n"; 
          $message.= "<!-- saved from url=(0043)http://dialect.ca/premailer-tests/base.html --><html>\n"; 
          $message.= "<head>\n"; 
          $message.= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n"; 
          $message.= "<title>Premailer Test</title>\n"; 
          $message.= "<!-- <link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\"> --><link rel=\"stylesheet\" type=\"text/css\" href=\"http://draft.lx2.com.my/emailtest/styles.css\">\n"; 
          $message.= "<style type=\"text/css\">\n"; 
          $message.= "    @import url(http://fonts.googleapis.com/css?family=Raleway);\n"; 
          $message.= "    @import url(http://fonts.googleapis.com/css?family=Roboto+Slab);\n"; 
          $message.= "    @import url(http://fonts.googleapis.com/css?family=Open+Sans);\n"; 
          $message.= "  </style>\n"; 
          $message.= "<style type=\"text/css\"></style>\n"; 
          $message.= "</head>\n"; 
          $message.= "<body style=\"font-family: 'Roboto Slab', sans-serif; line-height: normal; font-style: normal; font-variant: normal; font-size: 11px; font-weight: normal; color: #000; background-color: #fff;\" bgcolor=\"#fff\">\n"; 
          $message.= "<div style=\"width: 100%; background-color: #fff; color: #000; margin: 2em 0;\">\n"; 
          $message.= "\n"; 
          $message.= "    <table width=\"650\" cellspacing=\"0\" cellpadding=\"0\" style=\"line-height: 130%; color: #4d4d4d; text-align: left; border-collapse: collapse; border-spacing: 0; margin: 0 auto; border: 1px solid #ccc;\"><tbody>\n"; 
          $message.= "<!-- Top frame row --><tr>\n"; 
          $message.= "<td width=\"25\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 1px; line-height: 1px; font-family: 'Roboto Slab', sans-serif; background-color: #fff; margin: 0; padding: 0;\" align=\"left\" bgcolor=\"#fff\" valign=\"top\"> </td>\n"; 
          $message.= "          <td width=\"600\" height=\"25\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\"> </td>\n"; 
          $message.= "          <td width=\"25\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 1px; line-height: 1px; font-family: 'Roboto Slab', sans-serif; background-color: #fff; margin: 0; padding: 0;\" align=\"left\" bgcolor=\"#fff\" valign=\"top\"> </td>\n"; 
          $message.= "        </tr>\n"; 
          $message.= "<!-- end of top frame row --><tr>\n"; 
          $message.= "<td width=\"25\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 1px; line-height: 1px; font-family: 'Roboto Slab', sans-serif; background-color: #fff; margin: 0; padding: 0;\" align=\"left\" bgcolor=\"#fff\" valign=\"top\"> </td>\n"; 
          $message.= "          <td width=\"600\" height=\"25\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\">\n"; 
          $message.= "\n"; 
          $message.= "            <!-- #content -->\n"; 
          $message.= "\n"; 
          $message.= "\n"; 
          $message.= "            <table width=\"600\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse: collapse; border-spacing: 0; border: 0;\"><tbody>\n"; 
          $message.= "<tr>\n"; 
          $message.= "<td width=\"150\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\">\n"; 
          $message.= "<img src=\"http://draft.lx2.com.my/emailtest/logo.jpg\" alt=\"Logo\" width=\"130\" height=\"107\"><br><br>\n"; 
          $message.= "</td>\n"; 
          $message.= "                  <td width=\"450\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\"> </td>\n"; 
          $message.= "                </tr>\n"; 
          $message.= "<tr>\n"; 
          $message.= "<td width=\"150\" style=\"text-align: left; vertical-align: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"middle\">\n"; 
          $message.= "<h1 style=\"font-family: 'Raleway'; font-weight: lighter; text-transform: uppercase; font-size: 25px; margin: 5px 0;\">Receipt</h1> #1000</td>\n"; 
          $message.= "\n"; 
          $message.= "                  <td width=\"450\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\">\n"; 
          $message.= "                    <table style=\"border-collapse: collapse; border-spacing: 0; border: 0;\"><tbody>\n"; 
          $message.= "<!-- Details --><tr>\n"; 
          $message.= "<td width=\"100\" style=\"text-align: left; vertical-align: top; border-top-width: 1px; border-top-color: #bbb; border-top-style: solid; border-bottom-width: 1px; border-bottom-color: #bbb; border-bottom-style: solid; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\">\n"; 
          $message.= "                            <span style=\"padding: 8px 0; border-bottom-style: solid; border-bottom-width: 1px; border-bottom-color: #ddd; width: 100%; display: block;\">Attn to</span>\n"; 
          $message.= "                            <span style=\"padding: 8px 0; border-bottom-style: solid; border-bottom-width: 1px; border-bottom-color: #ddd; width: 100%; display: block;\">Receipt #</span>\n"; 
          $message.= "                            <span style=\"border-bottom-style: none !important; border-bottom-color: #ddd; border-bottom-width: 1px; width: 100%; display: block; padding: 8px 0;\">Date Issued</span>\n"; 
          $message.= "                          </td>\n"; 
          $message.= "                          <td width=\"170\" style=\"text-align: left; vertical-align: top; border-top-width: 1px; border-top-color: #bbb; border-top-style: solid; border-bottom-width: 1px; border-bottom-color: #bbb; border-bottom-style: solid; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\">\n"; 
          
          //YOUR NAME
          $message.= "                            <span style=\"border-bottom-style: solid; border-bottom-color: #ddd; border-bottom-width: 1px; width: 100%; display: block; font-weight: bold; padding: 8px 0;\">".$_SESSION['actualname']."</span>\n"; 


          $message.= "                            <span style=\"border-bottom-style: solid; border-bottom-color: #ddd; border-bottom-width: 1px; width: 100%; display: block; font-weight: bold; padding: 8px 0;\">RECEIPT #</span>\n"; 

          $date = date('m/d/Y');
          $message.= "                            <span style=\"border-bottom-style: none !important; border-bottom-color: #ddd; border-bottom-width: 1px; width: 100%; display: block; font-weight: bold; padding: 8px 0;\">".$date." (UTC+8)</span>\n"; 


          $message.= "                          </td>\n"; 
          $message.= "                          <td width=\"20\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\">\n"; 
          $message.= "                             \n"; 
          $message.= "                          </td>\n"; 
          $message.= "                          <td width=\"150\" style=\"text-align: left; vertical-align: top; border-top-width: 1px; border-top-color: #bbb; border-top-style: solid; border-bottom-width: 1px; border-bottom-color: #bbb; border-bottom-style: solid; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 10px 0;\" align=\"left\" valign=\"top\">\n"; 
          $message.= "                            Total<br><span style=\"width: 100%; display: block; text-align: right; font-size: 25px; font-weight: bold; padding: 23px 0;\">\n"; 
          // Total Price 1
          $message.= "MYR ".number_format($totalprice, 2, '.', ',')."\n"; 


          $message.= "                            </span>\n"; 
          $message.= "                          </td>\n"; 
          $message.= "                        </tr>\n"; 
          $message.= "<!-- end of Details --><tr>\n"; 
          $message.= "<td width=\"450\" height=\"40\" colspan=\"4\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\">\n"; 
          $message.= "                             \n"; 
          $message.= "                          </td>\n"; 
          $message.= "                        </tr>\n"; 
          $message.= "<tr>\n"; 
          $message.= "<td width=\"450\" colspan=\"4\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\">\n"; 
          $message.= "                            <!-- Item List -->\n"; 
          $message.= "                            <table width=\"450\" style=\"border-collapse: collapse; border-spacing: 0; border: 0;\"><tbody>\n"; 
          $message.= "<tr style=\"border-top-width: 1px; border-top-color: #bbb; border-top-style: solid; border-bottom-width: 1px; border-bottom-color: #bbb; border-bottom-style: solid;\">\n"; 
          $message.= "<td width=\"50\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 10px 0;\" align=\"left\" valign=\"top\">Qty</td>\n"; 
          $message.= "                                  <td width=\"170\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 10px 10px 10px 0;\" align=\"left\" valign=\"top\">Item</td>\n"; 
          $message.= "                                  <td width=\"110\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 10px 10px 10px 0;\" align=\"left\" valign=\"top\">Individual Price</td>\n"; 
          $message.= "                                  <td width=\"110\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 10px 0;\" align=\"left\" valign=\"top\">Total</td>\n"; 
          $message.= "                                </tr>\n"; 

          // Individual Item Generation

          foreach ($jcart->get_contents() as $item)
          {
            $message.= "<!-- individual item --><tr>\n"; 
            $message.= "<!-- QTY --><td style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 10px 0;\" align=\"left\" valign=\"top\">".$item['qty']."</td>\n"; 
            $message.= "\n"; 
            $message.= "<!-- ITEM -->\n"; 
            $message.= "<td style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 10px 10px 10px 0;\" align=\"left\" valign=\"top\"><strong>".$item['name']."</strong></td>\n"; 
            $message.= "\n"; 
            $message.= "<!-- DESC -->\n"; 
            $message.= "<td style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 10px 0;\" align=\"left\" valign=\"top\">MYR ".number_format($item['price'], 2, '.', ',')."</td>\n"; 
            $message.= "\n"; 
            $message.= "<!-- TOTAL -->\n"; 
            $message.= "<td style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 10px 0;\" align=\"left\" valign=\"top\">MYR ".number_format($item['price']*$item['qty'], 2, '.', ',')."</td>\n"; 
            $message.= "</tr>\n"; 
            $message.= "<!-- end of individual item -->\n";
          };

          // End of Individual Item

          $message.= "</tbody></table>\n"; 
          $message.= "<!-- end of Item List -->\n"; 
          $message.= "</td>\n"; 
          $message.= "                        </tr>\n"; 
          $message.= "<tr>\n"; 
          $message.= "<td width=\"450\" colspan=\"4\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\">\n"; 
          $message.= "                            <!-- price row -->\n"; 
          $message.= "                            <table width=\"450\" style=\"border-collapse: collapse; border-spacing: 0; border: 0;\"><tbody><tr>\n"; 
          $message.= "<td width=\"300\" style=\"text-align: right; vertical-align: top; border-top-color: #bbb; border-top-width: 1px; border-top-style: solid; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 10px 0;\" align=\"right\" valign=\"top\">\n"; 
          $message.= "Total in MYR\n"; 
          $message.= "</td>\n"; 
          $message.= "<td width=\"150\" style=\"text-align: right; vertical-align: top; border-top-color: #bbb; border-top-width: 1px; border-top-style: solid; border-bottom-width: 1px; border-bottom-style: dotted; border-bottom-color: #ccc; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 10px 0;\" align=\"right\" valign=\"top\">\n"; 

          // Total Price 2
          $message.= "MYR ".number_format($totalprice, 2, '.', ',')."\n"; 

          $message.= "                                  </td>\n"; 
          $message.= "                                </tr></tbody></table>\n"; 
          $message.= "<!-- end of price row -->\n"; 
          $message.= "</td>\n"; 
          $message.= "                        </tr>\n"; 
          $message.= "</tbody></table>\n"; 
          $message.= "</td>\n"; 
          $message.= "                </tr>\n"; 
          $message.= "<tr>\n"; 
          $message.= "<td colspan=\"2\" height=\"50\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\"></td>\n"; 
          $message.= "                </tr>\n"; 
          $message.= "<tr>\n"; 
          $message.= "<!-- company details --><td width=\"130\" style=\"text-align: left; vertical-align: bottom; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: 16px; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0 15px 0 0;\" align=\"left\" valign=\"bottom\">\n"; 
          $message.= "                    <table style=\"border-collapse: collapse; border-spacing: 0; border: 0;\"><tbody>\n"; 
          $message.= "<tr>\n"; 
          $message.= "<td colspan=\"2\" style=\"text-align: right; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"right\" valign=\"top\">\n"; 
          $message.= "                            <strong>LXII Design Studio</strong>\n"; 
          $message.= "                          </td>\n"; 
          $message.= "                        </tr>\n"; 
          $message.= "<tr>\n"; 
          $message.= "<td width=\"115\" style=\"text-align: right; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 5px 0;\" align=\"right\" valign=\"top\">03 - 6241 8948</td>\n"; 
          $message.= "                          <td width=\"20\" style=\"text-align: right; vertical-align: top; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 5px 0;\" align=\"right\" valign=\"top\">T</td>\n"; 
          $message.= "                        </tr>\n"; 
          $message.= "<tr>\n"; 
          $message.= "<td width=\"115\" style=\"text-align: right; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 5px 0;\" align=\"right\" valign=\"top\">017 - 623 0327</td>\n"; 
          $message.= "                          <td width=\"20\" style=\"text-align: right; vertical-align: top; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 5px 0;\" align=\"right\" valign=\"top\">H</td>\n"; 
          $message.= "                        </tr>\n"; 
          $message.= "<tr>\n"; 
          $message.= "<td width=\"115\" style=\"text-align: right; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 5px 0;\" align=\"right\" valign=\"top\">services@lx2.com.my</td>\n"; 
          $message.= "                          <td width=\"20\" style=\"text-align: right; vertical-align: top; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 5px 0;\" align=\"right\" valign=\"top\">E</td>\n"; 
          $message.= "                        </tr>\n"; 
          $message.= "<tr>\n"; 
          $message.= "<td width=\"115\" style=\"text-align: right; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 5px 0;\" align=\"right\" valign=\"top\">www.lx2.com.my</td>\n"; 
          $message.= "                          <td width=\"20\" style=\"text-align: right; vertical-align: top; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 5px 0;\" align=\"right\" valign=\"top\">W</td>\n"; 
          $message.= "                        </tr>\n"; 
          $message.= "<tr>\n"; 
          $message.= "<td width=\"115\" style=\"text-align: right; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 5px 0;\" align=\"right\" valign=\"top\">A-6-3A, Casa Impian,<br>No.5, Jln 1/12 D,<br>Kpg Batu Muda, 51100,<br>KL, Malaysia</td>\n"; 
          $message.= "                          <td width=\"20\" style=\"text-align: right; vertical-align: top; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 5px 0;\" align=\"right\" valign=\"top\">A</td>\n"; 
          $message.= "                        </tr>\n"; 
          $message.= "</tbody></table>\n"; 
          $message.= "</td>\n"; 
          $message.= "                  <!-- end of company details -->\n"; 
          $message.= "\n"; 
          $message.= "                  <td style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\">\n"; 
          $message.= "                    <strong>Terms &amp; Conditions</strong>\n"; 
          $message.= "                    <ol>\n"; 
          $message.= "<li style=\"font-family: 'Open Sans', sans-serif; text-align: justify; margin-left: -10px; line-height: 15px; margin-bottom: 5px; font-size: 11px;\">Our first drafted design will be based on brief and descriptions as provided by CLIENT. If substantial amount of changes would be made on the original brief and leads to rejection of the initial design, the CLIENT will be separately charged with additional fee as creation of new design, concept or layout.</li>\n"; 
          $message.= "\n"; 
          $message.= "                      <li style=\"font-family: 'Open Sans', sans-serif; text-align: justify; margin-left: -10px; line-height: 15px; margin-bottom: 5px; font-size: 11px;\">An advance payment amounted 50% of the total fees must be paid upon signing this agreement.</li>\n"; 
          $message.= "\n"; 
          $message.= "                      <li style=\"font-family: 'Open Sans', sans-serif; text-align: justify; margin-left: -10px; line-height: 15px; margin-bottom: 5px; font-size: 11px;\">All balance payment must be paid before the final artwork file is given to CLIENT.</li>\n"; 
          $message.= "\n"; 
          $message.= "                      <li style=\"font-family: 'Open Sans', sans-serif; text-align: justify; margin-left: -10px; line-height: 15px; margin-bottom: 5px; font-size: 11px;\">The charging rate for specific design projects may be varied due to different requirements, features, and items purchased.</li>\n"; 
          $message.= "\n"; 
          $message.= "                      <li style=\"font-family: 'Open Sans', sans-serif; text-align: justify; margin-left: -10px; line-height: 15px; margin-bottom: 5px; font-size: 11px;\">Cheques should be crossed &amp; made payable to LXII DESIGN STUDIO (Maybank) 514338512604</li>\n"; 
          $message.= "\n"; 
          $message.= "                      <li style=\"font-family: 'Open Sans', sans-serif; text-align: justify; margin-left: -10px; line-height: 15px; margin-bottom: 5px; font-size: 11px;\">Once the payment is made, CLIENT must provide a copy of the bank-in slip as a proof.</li>\n"; 
          $message.= "                    </ol>\n"; 
          $message.= "                    􀁝 I understand, accept, and agree to the following terms and conditions applied.\n"; 
          $message.= "                  </td>\n"; 
          $message.= "                </tr>\n"; 
          $message.= "</tbody></table>\n"; 
          $message.= "<!-- end of #content -->\n"; 
          $message.= "</td>\n"; 
          $message.= "          <td width=\"25\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 1px; line-height: 1px; font-family: 'Roboto Slab', sans-serif; background-color: #fff; margin: 0; padding: 0;\" align=\"left\" bgcolor=\"#fff\" valign=\"top\"> </td>\n"; 
          $message.= "        </tr>\n"; 
          $message.= "<!-- bottom frame row --><tr>\n"; 
          $message.= "<td width=\"25\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 1px; line-height: 1px; font-family: 'Roboto Slab', sans-serif; background-color: #fff; margin: 0; padding: 0;\" align=\"left\" bgcolor=\"#fff\" valign=\"top\"> </td>\n"; 
          $message.= "          <td width=\"600\" height=\"25\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: 'Roboto Slab', sans-serif; margin: 0; padding: 0;\" align=\"left\" valign=\"top\"> </td>\n"; 
          $message.= "          <td width=\"25\" style=\"text-align: left; vertical-align: top; font-style: normal; font-variant: normal; font-weight: normal; font-size: 1px; line-height: 1px; font-family: 'Roboto Slab', sans-serif; background-color: #fff; margin: 0; padding: 0;\" align=\"left\" bgcolor=\"#fff\" valign=\"top\"> </td>\n"; 
          $message.= "        </tr>\n"; 
          $message.= "<!-- end of bottom frame row -->\n"; 
          $message.= "</tbody></table>\n"; 
          $message.= "</div>\n"; 
          $message.= "<div style=\"display: none;\">\n"; 
          $message.= "<a href=\"http://dialect.ca/premailer-tests/base.html#\" title=\"Edit settings\" style=\"background-image: url('chrome-extension://kkelicaakdanhinjdeammmilcgefonfh/images/icon_19.png');\"></a><span>Window size: </span><span>1920</span> x <span>1050</span><br><span>Viewport size: </span><span>1920</span> x <span>436</span>\n"; 
          $message.= "</div>\n"; 
          $message.= "</body>\n"; 
          $message.= "</html>\n"; 
          $message.= "\n";

         //HTML EMAIL TAG 
         $headers .= "MIME-Version: 1.0\r\n";
         $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

         $mailSent = mail('lucian0014@live.co.uk', 'Test Title', $message, $headers);
         $cart->empty_cart();

         echo "<h1>Order Sent!</h1>".$message;
       }
     }
   }
   ?>