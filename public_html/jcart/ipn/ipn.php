<?php
/*
ipn.php - example code used for the tutorial:

PayPal IPN with PHP
How To Implement an Instant Payment Notification listener script in PHP
http://www.micahcarrick.com/paypal-ipn-with-php.html

(c) 2011 - Micah Carrick
*/

include_once('../jcart.php');

// tell PHP to log errors to ipn_errors.log in this directory
ini_set('log_errors', true);
ini_set('error_log', 'http://draft.lx2.com.my/lxii_ver4/public_html/jcart/ipn/ipn_errors.log');

// intantiate the IPN listener
include('../ipnlistener.php');
$listener = new IpnListener();

// tell the IPN listener to use the PayPal test sandbox
$listener->use_sandbox = true;

// try to process the IPN POST
try {
    $listener->requirePostMethod();
    $verified = $listener->processIpn();
} catch (Exception $e) {
    error_log($e->getMessage());
    exit(0);
}

if ($verified) {

    $errmsg = '';   // stores errors from fraud checks
    
    // 1. Make sure the payment status is "Completed" 
    if ($_POST['payment_status'] != 'Completed') { 
        // simply ignore any IPN that is not completed
        exit(0); 
    }

    // 2. Make sure seller email matches your primary account email.
    if ($_POST['receiver_email'] != 'lucian0014-facilitator@live.co.uk') {
        $errmsg .= "'receiver_email' does not match: ";
        $errmsg .= $_POST['receiver_email']."\n";
    }
    
    // 3. Make sure the amount(s) paid match
    // if ($_POST['mc_gross'] != '9.99') {
    //     $errmsg .= "'mc_gross' does not match: ";
    //     $errmsg .= $_POST['mc_gross']."\n";
    // }
    
    // // 4. Make sure the currency code matches
    // if ($_POST['mc_currency'] != 'USD') {
    //     $errmsg .= "'mc_currency' does not match: ";
    //     $errmsg .= $_POST['mc_currency']."\n";
    // }

    // 5. Ensure the transaction is not a duplicate.
    mysql_connect('localhost', 'lxcommy_newadmin', '1q2w3e4r5t') or exit(0);
    mysql_select_db('lxcommy_lxii_ver4') or exit(0);

    $txn_id = mysql_real_escape_string($_POST['txn_id']);
    $sql = "SELECT COUNT(*) FROM orders WHERE txn_id = '$txn_id'";
    $r = mysql_query($sql);
    
    if (!$r) {
        error_log(mysql_error());
        exit(0);
    }
    
    $exists = mysql_result($r, 0);
    mysql_free_result($r);
    
    if ($exists) {
        $errmsg .= "'txn_id' has already been processed: ".$_POST['txn_id']."\n";
    }
    
    if (!empty($errmsg)) {

        // manually investigate errors from the fraud checking
        $body = "IPN failed fraud checks: \n$errmsg\n\n";
        $body .= $listener->getTextReport();

        foreach ($jcart->get_contents() as $item){
            $body .= "+1 ";
        };

        $jcart->empty_cart();
        mail('lucian0014@live.co.uk', 'IPN Fraud Warning', $body);
        
    } else {

        // add this order to a table of completed orders
        $payer_email = mysql_real_escape_string($_POST['payer_email']);
        $mc_gross = mysql_real_escape_string($_POST['mc_gross']);
        $sql = "INSERT INTO orders VALUES 
        (NULL, '$txn_id', '$payer_email', $mc_gross)";
        
        if (!mysql_query($sql)) {
            error_log(mysql_error());
            exit(0);
        }
        
        // send user an email with a link to their digital download
        $to = filter_var($_POST['payer_email'], FILTER_SANITIZE_EMAIL);
        $subject = "Your digital download is ready";

        $textmessage = "";

        foreach ($jcart->get_contents() as $item){
            $textmessage .= "+1 ";
        };

        $jcart->empty_cart();
        mail($to, "Thank you for your order", $textmessage);
    }
    
} else {
    // manually investigate the invalid IPN
    mail('lucian0014@live.co.uk', 'Invalid IPN', $listener->getTextReport());
}

?>