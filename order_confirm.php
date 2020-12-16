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
//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

//$_GET['auth_token'] =  '123456789qwertumnbvc76543';

$auth_token = $_GET['auth_token'];

$post_data = $_SESSION['post_data'];

//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
?>

<?php include("include/header.php");?>

<!-- container --> 
  <section class="showcase">
    <div class="container">
      <div class="pb-2 mt-4 mb-2 border-bottom">
        <h2><?php echo TITLE;?> - Confirm Order</h2>
      </div>      
      <span id="success-msg" class="payment-errors"></span>   
      
	  
	  <!-- Telenor EasyPay payment form -->
    <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 pb-5">
    <div class="row"></div>
        <!--Form with header-->
            <div class="card border-gray rounded-0">
                <div class="card-header p-0">
                    <div class="bg-gray text-left py-2">
                        <h6 class="pl-2"><strong>Price: </strong> <?php echo $post_data['amount'];?> PKR</h6>
                    </div>
                </div>


<!-- MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM -->
<!-- Telenor EasyPay payment form -->
<!-- MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM -->

<form action="<?php echo TRANSACTION_POST_URL2;?>" method="POST" id="myCCForm">

<input name="postBackURL" value="<?php echo POST_BACK_URL2;?>" type="hidden" />
<input name="auth_token" value="<?php echo $auth_token;?>" type="hidden" />

<!-- MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM -->



                <div class="card-body p-3">   
					<div class="input-group-text"><img src="<?php echo BASE_URL?>images/telenor-logo.png"></div>
					<h5>Please confirm your order to proceed</h5>
                    
                    <div class="text-right">
                        <button type="buttom" id="confirmBtn" class="btn btn-info py-2">Confirm Order</button>
                    </div>
                    
                </div>
                
            </div> 
			
          </div>
        </div>    
    </form>
    </div>
  </section>