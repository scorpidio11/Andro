<?php
session_start();
error_reporting(E_ERROR ^ E_NOTICE);
error_reporting(E_ALL ^ E_NOTICE);
define('SITEURL_TERMS','https://androdrox.com/trial/step1/');
define('APIURL','crmvlhealth.limelightcrm.com/admin/');
define('USERNAME','SalesPageUser');
define('PASSWORD','TFw6ZxKumNK3e');

// IN order to change discount product id
// go to main.js and  find $('#pop_prod_id').val(222);

// Main Product Information
define('CAMPAIGN_ID', 162);
define('PRODUCT_ID', 245);
define('PRODUCT_SHIPPING_ID', 3);

define('COMBO_CAMPAIGN_ID', 164);
define('COMBO_PRODUCT_ID', 249);
define('COMBO_SHIPPING_ID', 3); //Free Shipping //

// Upsell1  
define('UPSELL1_CAMPAIGN_ID', 165);
define('UPSELL1_PRODUCT_ID', 250);
define('UPSELL1_SHIPPING_ID', 3);  //Free Shipping//

// Upsell2 
define('UPSELL2_CAMPAIGN_ID', 170);
define('UPSELL2_PRODUCT_ID', 254);
define('UPSELL2_SHIPPING_ID', 3);  //Free Shipping //

// Expedited Shipping Information
define('EXSHIP_CAMPAIGN_ID', 171);
define('EXSHIP_PRODUCT_ID', 255);
define('EXSHIP_PRODUCT_50OFF', 256);
define('EXSHIP_SHIPPING_ID', 3);  //Free Shipping //

//// PREPAIDS ////
// Main Product
define('PREPAID_CAMPAIGN_ID', 163);
define('PREPAID_PRODUCT_ID', 248);
define('PREPAID_SHIPPING_ID', 3);  //Free Shipping //

//DIVERSION CONTROL (diversion will be 1 out of whatever diversion celing #)
define('DIVERSION_CELING', 5);

date_default_timezone_set('UTC');

$siteurl = SITEURL_TERMS; // leave this alone
$siteurl_terms = SITEURL_TERMS; //  URL for Terms, Contact and Privacy ONLY!!
$url = 'http://www.androdrox.com'; //  URL!!
$sitetitle = 'Androdorx'; // your site meta title
$LLproductName = 'Androdrox Workout'; // limelight product name
$trialprice = '4.95'; // trial price customers will be charged including shipping (no dollar sign)
$recurprice = '89.95'; // recurring price customers will be charged (no dollar sign)
$comboprice = '84.95'; // Combo price customers will be charged montly(no dollar sign)
$companyname = 'Androdrox'; // for the terms and conditions and footer
$companyemail = 'support@androdrox.com'; // for customer service
$companyphone = '877-236-0599'; // for customer service
$hours = '9am-5pm MST'; //call center hours
$restockingFee = '$14.95'; // restocking fee
$prepaidprice = '$65.95'; // Prepaid Price

// MAILING ADDRESS
$companyaddress = 'PO Box 52040';
$companycity = 'Phoenix';
$companystate = 'Arizona';
$companystateabv = 'AZ';
$companyzip = '85072-2040';

// RETURN ADDRESS (the address below is for merchants using TEN fulfillment)
$returnaddress = 'PO Box 52040';
$returncity = 'Phoenix';
$returnstate = 'Arizona';
$returnstateabv = 'AZ';
$returnzip = '85072-2040';

// DO NOT DELETE THIS

$agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
$browser = (strlen(strstr($agent, 'Firefox')) > 0) ? 'firefox' : '';
?>