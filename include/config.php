<?php 
/* 
| Developed by: Tauseef Ahmad
| Last Upate: 16-12-2020 01:18 PM
| Facebook: www.facebook.com/ahmadlogs
| Twitter: www.twitter.com/ahmadlogs
| YouTube: https://www.youtube.com/channel/UCOXYfOHgu-C-UfGyDcu5sYw/
| Blog: https://ahmadlogs.wordpress.com/
 */  
 
if(!session_id()){
    session_start();
}

/*NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
| Telenor EasyPay configuration 
|NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
 */

define('STORE_ID', 'ENTER_STORE_ID_HERE');
define('HASH_KEY', 'ENTER_HASH_KEY_HERE');
define('POST_BACK_URL1', 'http://localhost/easypay/order_confirm.php');
define('POST_BACK_URL2', 'http://localhost/easypay/order_complete.php');

//Live
define('TRANSACTION_POST_URL1', 'https://easypay.easypaisa.com.pk/easypay/Index.jsf');
define('TRANSACTION_POST_URL2', 'https://easypay.easypaisa.com.pk/easypay/Confirm.jsf');

//Sandbox Testing
//define('TRANSACTION_POST_URL1', 'https://easypaystg.easypaisa.com.pk/easypay/Index.jsf');
//define('TRANSACTION_POST_URL2', 'https://easypaystg.easypaisa.com.pk/easypay/Confirm.jsf');



/*NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN 
| Database configuration 
||NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
 */ 

define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'ENTER_DB_USER_HERE'); 
define('DB_PASSWORD', 'ENTER_DB_PASS_HERE'); 
define('DB_NAME', 'easypaisa_db');


define('BASE_URL', 'http://localhost/easypay/');

define('TITLE', 'Telenor EasyPay Payment Gateway Integration in PHP');

include_once 'include/db_connect.php';