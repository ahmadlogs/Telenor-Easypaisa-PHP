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

//$_GET['status']     	= "000";
//$_GET['desc'] 			= "completed";
//$_GET['orderRefNumber'] = "12345678";

$order_status 	= $_GET['status'];
$order_desc 	= $_GET['desc'];
$orderRefNumber = $_GET['orderRefNumber'];

$post_data = $_SESSION['post_data'];

?>

<?php include("include/header.php");?>

<!-- container --> 
  <section class="showcase">
    <div class="container">
      <div class="pb-2 mt-4 mb-2 border-bottom">
        <h2><?php echo TITLE;?> - Order Complete</h2>
      </div>     
      
    <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 pb-5">
    <div class="row"></div>
        <!--Form with header-->
            <div class="card border-gray rounded-0">
                <div class="card-header p-0">
                    <div class="bg-gray text-left py-2">
                        <h6 class="pl-2"><strong>Amount: </strong> <?php echo $post_data['amount'];?> PKR</h6>
                    </div>
                </div>

                <div class="card-body p-3"> 
					<div class="input-group-text"><img src="<?php echo BASE_URL?>images/telenor-logo.png"></div>
					<h4 class="bg-red">Your order has been <?php echo $order_desc;?></h4><hr>
					<h6>Order Status: <?php echo $order_status;?></h6><hr>
					<h6>Your order referance number is: <?php echo $orderRefNumber;?></h6><hr>
                    
                    <div class="text-right">
                        <a href="index.php" id="backBtn" class="btn btn-primary py-2">Back</a> 
                    </div>
                    
                </div>
                
            </div> 
			
          </div>
        </div>
    </div>
  </section>
  
  <?php include("include/footer.php"); ?>