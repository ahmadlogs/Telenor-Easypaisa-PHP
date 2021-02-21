<?php 
/* 
| Developed by: Tauseef Ahmad
| Last Upate: 16-12-2020 01:18 PM
| Facebook: www.facebook.com/ahmadlogs
| Twitter: www.twitter.com/ahmadlogs
| YouTube: https://www.youtube.com/channel/UCOXYfOHgu-C-UfGyDcu5sYw/
| Blog: https://ahmadlogs.wordpress.com/
 */ 
 
include_once 'include/config.php';  

date_default_timezone_set('Asia/Karachi');
//60 seconds = 1 minutes
ini_set('max_execution_time', 60);

$product_id = $_GET['product_id'];

$results = $db->query("SELECT * FROM product WHERE product_id = ".$product_id); 
$row = $results->fetch_array();

$product_name = $row['name'];
$product_price = $row['price'];


//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
//1.
$amount = $product_price;
//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN


//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
//2.
//makinging order id, usually it comes from database
$DateTime 	 = new DateTime();
$orderRefNum = $DateTime->format('YmdHis');
//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN


//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
//3.
//to make expiry date and time add one hour to current date and time
//format: YYYYMMDD HHMMSS
$ExpiryDateTime = $DateTime;
$ExpiryDateTime->modify('+' . 1 . ' hours');
$expiryDate = $ExpiryDateTime->format('Ymd His');
//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN



//--------------------------------------------------------------------------------
//$post_data

$post_data =  array(
	"storeId" 			=> STORE_ID,
	"amount" 			=> $amount,
	"postBackURL" 		=> POST_BACK_URL1,
	"orderRefNum" 		=> $orderRefNum,
	"expiryDate" 		=> $expiryDate, 	  	//Optional
	"merchantHashedReq" => "",				  	//Optional
	"autoRedirect" 		=> "1",				  	//Optional
	"paymentMethod" 	=> "MA_PAYMENT_METHOD",	//Optional
);
//OTC_PAYMENT_METHOD
//MA_PAYMENT_METHOD
//CC_PAYMENT_METHOD

//--------------------------------------------------------------------------------

$_SESSION['post_data'] = $post_data;

//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
//4.
//$sorted_string
//make an alphabetically ordered string using $post_data array above
//and skip the blank fields in $post_data array
$sortedArray = $post_data;
ksort($sortedArray);
$sorted_string = '';
$i = 1;

foreach($sortedArray as $key => $value){
	if(!empty($value))
	{
		if($i == 1)
		{
			$sorted_string = $key. '=' .$value;
		}
		else
		{
			$sorted_string = $sorted_string . '&' . $key. '=' .$value;
		}
	}
	$i++;
}	
// AES/ECB/PKCS5Padding algorithm
$cipher = "aes-128-ecb";
$crypttext = openssl_encrypt($sorted_string, $cipher, HASH_KEY, OPENSSL_RAW_DATA);
$HashedRequest = Base64_encode($crypttext);
//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

$post_data['merchantHashedReq'] =  $HashedRequest;

//echo $sorted_string; 
//echo '<br>'; 
//echo $HashedRequest; 
//echo '<br>';
//exit;

//insert $post_data array into database for validating secure hash
?>

<?php include("include/header.php"); ?>

<!-- container --> 
  <section class="showcase">
    <div class="container">
      <div class="pb-2 mt-4 mb-2 border-bottom">
        <h2><?php echo TITLE;?> - Checkout</h2>
      </div>      
      <span id="success-msg" class="payment-errors"></span>   
      
    <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 pb-5">
    <div class="row"></div>
        <!--Form with header-->
            <div class="card border-gray rounded-0">
                <div class="card-header p-0">
                    <div class="bg-gray text-left py-2">
                        <h5 class="pl-2"><strong>Product Name: </strong><?php echo $product_name;?></h5> 
                        <h6 class="pl-2"><strong>Product Price: </strong> <?php echo $product_price;?> PKR</h6>
                    </div>
                </div>

<!-- MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM -->
<!-- Telenor EasyPay payment form -->
<!-- MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM -->

<form action="<?php echo TRANSACTION_POST_URL1;?>" method="POST" id="myCCForm">
<input type="hidden" name="amount" value="<?php echo $post_data['amount'];?>">
<input type="hidden" name="storeId" value="<?php echo $post_data['storeId'];?>">
<input type="hidden" name="postBackURL" value="<?php echo $post_data['postBackURL'];?>">
<input type="hidden" name="orderRefNum" value="<?php echo $post_data['orderRefNum'];?>">
<input type="hidden" name="expiryDate" value="<?php echo $post_data['expiryDate'];?>">
<input type="hidden" name="autoRedirect" value="<?php echo $post_data['autoRedirect'];?>">
<input type="hidden" name="merchantHashedReq" value="<?php echo $post_data['merchantHashedReq'];?>">
<input type="hidden" name="paymentMethod" value="<?php echo $post_data['paymentMethod'];?>">

<!-- MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM -->

<div class="card-body p-3">   
	<h2>Pay With</h2>
	<div class="input-group-text"><img src="<?php echo BASE_URL?>images/telenor-logo.png"></div>
	<br>
	<div class="text-right">
		<a href="index.php" id="payBtn" class="btn btn-primary py-2">Back</a> 
		<button type="buttom" id="payBtn" class="btn btn-info py-2">Proceed to Checkhout</button>
	</div>
	
</div>
</form>



                
            </div> 
              <div>                
                </div>
          </div>
        </div>
    </div>
  </section>



<?php include("include/footer.php"); ?>
