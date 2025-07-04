<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------
// PayPalPro library configuration
// ------------------------------------------------------------------------

// PayPal environment, Sandbox or Live
$config['sandbox'] = TRUE; // FALSE for live environment


// PayPal API credentials
// $config['paypal_api_username']	= 'sb-pir1a16681931_api1.business.example.com';
// $config['paypal_api_password']	= '4EMVJHBTU3XSY5EA';
// $config['paypal_api_signature'] = 'AAXUDeWm6RGbJ0GeUjbjQLb8U6hmAOf3PTYJfN9nUGEzkKmOAR.YljHt';


$config['paypal_api_username']	= settings()->paypal_username;
$config['paypal_api_password']	= settings()->paypal_password;
$config['paypal_api_signature'] = settings()->paypal_signature;