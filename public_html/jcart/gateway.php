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

          // Offline
          $message = "New Order:\n\n";

          foreach ($jcart->get_contents() as $item)
          {
           $message .= 'Item: ' . $item['name'];
           $message .= "\nPrice: " . $item['price'];
           $message .= "\nQuantity: " . $item['qty'];
           $message .= "\n\n";
         }
         $mailSent = mail('tlyon_90@hotmail.com', 'Test Title', $message);
         // $cart->empty_cart();

         echo "<h1>Order Sent!</h1>".$message;
       }
     }
   }
   ?>