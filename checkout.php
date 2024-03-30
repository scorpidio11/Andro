<?php 

include 'inc/config.php'; 

$current_4_year = date('Y');
$current_2_year = date('y');
$billing_info = array();

$state = $_SESSION['order']['address_info']['SA']['state'];
if (empty($_SESSION['order']) || empty($_SESSION['prospectId'])) {
	exit;
}

if (!empty($_SESSION['order']['address_info']['BA'])) {
	$billing_info = $_SESSION['order']['address_info']['BA'];
} else {
	$billing_info = $_SESSION['order']['address_info']['SA'];
}

$shippinginfo = array();
$first_name = '';
$last_name = '';
$user_info = $_SESSION['order']['user_info'];
$first_name = $user_info['first_name'];
$last_name = $user_info['last_name'];

?>

<!doctype html>
<html lang="en">
	<head id="Head1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?=$sitetitle?></title>
		<link rel="icon" href="images/favicon.ico" sizes="16x16" type="image/png" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="js/tooltip.css" />
		<script type="text/javascript" src="js/bioep.min.js"></script>
        <style type="text/css">
            .buttonhide {display:none;}
            #loader_area { 
				background-color: #2391dc; 
				color: #fff; font-size: 12px; 
				line-height: 16px; 
				margin: 5px auto 7px; 
				padding: 8px; 
				text-align: center; 
			}
            #error{
				background-color:red;
				margin-bottom:20px;
				text-align:left;
			}
        </style>    	
	</head>
	<body id="checkout-hybrid" lang="en" locale="en" class="checkout" >
    	<form method="post" action="" id="checkout">
			<input id="pop_prod_id" type="hidden" name="pop_prod_id" value="">
	    	<header class="header-inner">
				<div class="site-secure">
					<img src="images/site-security-img.png" width="112" alt="site security" />
				</div>
				<div class="container">
					<div class="inner-logo">
						<img src="images/inner-logo.png" width="318" alt="Logo" />
					</div>
	    			<div class="order-banner clearfix">
	    				<div class="order-product">
	        				<div class="order-product-head clearfix">
			                	<ul>
			                    	<li>Product</li>
			                        <li>Price</li>
			                    </ul>
	            			</div>
	            			<div class="order-inner-product clearfix">
	            				<div class="order-product-img">
									<img src="images/img1.png" width="120" alt="product image" />
								</div>
	                			<div class="order-product-content">
	                    			<table width="100%">
	                    				<thead>
	                            			<tr>
	                                			<td colspan="2">
	                                    			<div id="error" class="buttonhide">
	                                        			<span id="validator" style="visibility:hidden;"></span>
	                                    			</div>
	                                			</td>
	                            			</tr>
	                            			<tr>
	                                			<td>
													<h5>1 Bottle of <?php echo$LLproductName ?></h5>
	                                				<p class="sm-txt">Order your 30 day supply today!</p>
												</td>
	                                			<td valign="top">
													<h5 class="orange">Free</h5>
												</td>
	                            			</tr>
	                            			<tr>
	                            				<td colspan="2">&nbsp;</td>
	                            			</tr>
	                        			</thead>
	                            		<tbody>
		                                	<tr>
		                                    	<td>Shipping:</td>
		                                    	<td id="price"></td>
		                                	</tr>
		                                	<tr class="discount grey-bg bold buttonhide">
						                    	<td>
													<strong>Shipping Discount Applied</strong>
												</td>
						                    	<td>
													<strong>-40%</strong>
												</td>
					                    	</tr>
		                                	<tr class="yellow-bg bold">
						                    	 	<td style="color:white;">Total</td>
						                    	<td style="color:white;" id="total"></td>
					                    	</tr>
		                            	</tbody>
	                    			</table>
	                			</div>
	            			</div>
			                <div class="table-style order-arrive">
			                	<div class="table-cell-align"></div>    
			                </div>
	            			<div class="table-style order-arrive">
	            				<div class="table-cell-align">
	                				<img src="images/united-states.png" width="142" alt="united states"/>
	                			</div>    
			                    <div class="table-cell-align">
									Your order will ship within 1 business day.
			                    </div>
	           				</div>
			                <!--        <div class="table-style hide-for-phone-only">
			                	<div class="table-cell-align">
			                    	<img src="images/256bitssl.png" width="126" alt="" />
			                    </div>
			                    <div class="table-cell-align">
			                    	<img src="images/verisign.png" width="93" alt="" />
			                    </div>
			                    <div class="table-cell-align">
			                    	<img src="images/hacker-safe.png" width="81" alt="" />
			                    </div>
			                    <div class="table-cell-align">
			                    	<img src="images/mcafee.png" width="102" alt="" />
			                    </div>    
			                </div> -->

 						 	<div  class="mobile_hide" style="padding:20px;text-align:justify; font-size:0.7rem; line-height:1rem;  ">
								<b>Trial Terms and Conditions</b>
				        				Try our 14-day free sample of <?php echo $sitetitle?> to discover its great benefits. You pay only $<?php echo $trialprice?> with no obligation to buy in the future, as long as you call to cancel within 18 days of placing your order. Even if you cancel during the free-trial period, the product(s) are yours to keep and you will not be charged anything other than what you pay today. No commitments. No hassles. If you do not call us at <?php echo $companyphone?> to cancel within 18 days of ordering your samples (allow 4 days to process and ship your 14-day trial product), you will be enrolled in our Membership program. As a member, you will be sent a one-month supply of <?php echo $sitetitle?> 18 days from now, and every 30 days thereafter, for just $<?php echo $recurprice?> plus free shipping and handling. Call to change the shipping frequency or cancel at anytime with no penalty. If at any point, you return the product(s) to us, it is your responsibility to pay for return shipping and handling. Please reference our refund and return policy if you have any questions. You understand that this consumer transaction involves negative options and that You may be liable for payment of future good and services under the terms of the agreement if you fail to notify the supplier not to supply the goods or service described. By submitting your order, You are providing your electronic signature authorizing future charges as described, if you do not cancel. you understand that subscription enrollment applies to the bank, debit card, or credit card account that you designate. You acknowledge that the bank, debit card, or credit card account that you designated, will be cached (Encrypted through the Payment Card Industry Data Security Standard (PCI).) until you terminate the subscription.
				                </div> 
	        			</div>
		        		<div class="order-form">
			            	<div class="payment-head">
			                	<h3 style="color:white;">Final Step:</h3>
			                    <h6 style="color:white;">Payment Information</h6>
			                </div>
			                <ul class="payment-icons-list clearfix">
			                	<li><img src="images/visa2.png" width="51" alt="Visa" /></li>
			                    <li><img src="images/mastercard2.png" width="51" alt="Mastercard" /></li>
			                    <li><img src="images/discover.png" width="51" alt="discover" /></li>
			                </ul>
			            	<div id="payment-form">
				              	<div class="form-col">  
				                	<label>Payment Method</label>
				                 	<select id="cc_type" class="validate[required]" name="cc_type">
										<option value="">Select Payment Method</option>
										<option value="visa">Visa</option>
										<option value="master">MasterCard</option>
									</select>
				              	</div>
				              	<div class="form-col">  
				                	<label>Card Number</label>
				                  	<input class="validate[required]" name="cc_number" maxlength="16" tabindex="1" id="CC_Number" pattern="[0-9]*" type="tel" placeholder="Card Number" />
				              	</div>
				              	<div class="form-col2 clearfix">
									<div class="form-col1-2">
				                		<label>Card Expiry Date</label>
				              			<select class="validate[required]" name="fields_expmonth" id="Month" tabindex="2" title="Expiration Month">
											<option value="">Select Month</option>
											<option value="01">Jan (1)</option>
											<option value="02">Feb (2)</option>
											<option value="03">Mar (3)</option>
											<option value="04">Apr (4)</option>
											<option value="05">May (5)</option>
											<option value="06">Jun (6)</option>
											<option value="07">Jul (7)</option>
											<option value="08">Aug (8)</option>
											<option value="09">Sep (9)</option>
											<option value="10">Oct (10)</option>
											<option value="11">Nov (11)</option>
											<option value="12">Dec (12)</option>
										</select>
				                	</div>
				                	<div class="form-col1-2">  
				                  		<label>&nbsp;</label>
				                  		<select class="validate[required]" name="fields_expyear" id="Year" tabindex="3">
											<option value=''>Select Year</option>
											<?php for($i=0; $i < 15; $i++) { 
												$current_4year = $current_4_year + $i;
												$current_2year = $current_2_year + $i;  ?>
								  				<option  value='<?php echo $current_2year; ?>'><?php echo $current_4year; ?></option>
											<?php } ?>
										</select>
				                	</div>  
				              	</div>
				              	<div class="form-col2 clearfix">
									<div class="form-col1-2">
				                  		<label>Security Code</label>
				                    	<input class="validate[required]" name="cc_cvv" maxlength="3" id="CVV" tabindex="4" type="tel" pattern="[0-9]*" placeholder="CVV" autocomplete="off" exp="cvv" />
				                	</div>
				                	<div class="form-col1-2">  
				                  		<label>&nbsp;</label>
				                  		<label>
											<a href="#" data-reveal-id="where-to-find-security" class="form-secure-link">Where can I find my Security Code?</a>
										</label>
				                	</div>

								

				                </div>
			                	<div class="order-form-type-container">
			                    	<!-- content to be appended via js-->
			                	</div>
								
			                	<div class="clear"></div>
			                	<div id="loader_area" style="display: none;">
						            <img src="images/global/loadingicon.gif" alt="Processing your order. . ." /><br>Processing your order. . . <br>
						            Do not click the Refresh or Back button or your transaction may be interrupted.
					            </div>
				                <div class="submit-btn pulse" id="orderbutton">
				                    <a id="LinkButton2" class="btn sub-btn2 btnsub" href="javascript:void(0);">
				                	    <i class="right-arrow2"></i> SEND MY ORDER
				                    </a>
				                </div>
				                <div class="secure-form2 sm-txt">
				                	<i class="secure-lock2"></i> Secure 256-bit SSL Encryption
				                </div>  

 								<div class="secure-form2 sm-txt" style="text-align:left; font-size:0.6rem; line-height:1rem;  ">
									<div><input id="terms" name="terms" type="checkbox" checked value="yes"><label> 
									<b class="mobile_hide"> I understand and agree to the Terms and Conditions to the left. </b>
									<b class="desktop_hide"> I understand and agree to the Terms and Conditions. </b></label></div><br>
				               
				                </div>  

 						 	<div  class="desktop_hide" style="padding:5px;text-align:justify; font-size:0.7rem; line-height:1rem;  ">
								<b>Trial Terms and Conditions</b>
				           			Try our 14-day free sample of <?php echo $sitetitle?> to discover its great benefits. You pay only $<?php echo $trialprice?> with no obligation to buy in the future, as long as you call to cancel within 18 days of placing your order. Even if you cancel during the free-trial period, the product(s) are yours to keep and you will not be charged anything other than what you pay today. No commitments. No hassles. If you do not call us at <?php echo $companyphone?> to cancel within 18 days of ordering your samples (allow 4 days to process and ship your 14-day trial product), you will be enrolled in our Membership program. As a member, you will be sent a one-month supply of 
<?php echo $sitetitle?> 18 days from now, and every 30 days thereafter, for just $<?php echo $recurprice?> plus free shipping and handling. Call to change the shipping frequency or cancel at anytime with no penalty. If at any point, you return the product(s) to us, it is your responsibility to pay for return shipping and handling. Please reference our refund and return policy if you have any questions. You understand that this consumer transaction involves negative options and that You may be liable for payment of future good and services under the terms of the agreement if you fail to notify the supplier not to supply the goods or service described. By submitting your order, You are providing your electronic signature authorizing future charges as described, if you do not cancel. you understand that subscription enrollment applies to the bank, debit card, or credit card account that you designate. You acknowledge that the bank, debit card, or credit card account that you designated, will be cached (Encrypted through the Payment Card Industry Data Security Standard (PCI).) until you terminate the subscription.
				                </div> 
			            	</div>
		        		</div>
	    			</div>
				</div>
			</header>
			<div class="container">
				<ul class="order-icons-list">
			    	<li><img src="images/privacy-verified.jpg" width="86" alt="privacy verified" /></li>
			    	<li><img src="images/certified-by.jpg" width="86" alt="certified" /></li>
			    	<li><img src="images/security-verified.jpg" width="86" alt="security verified" /></li>
			    	<li><img src="images/business-verified.jpg" width="85" alt="business verified" /></li>
			    	<li>&nbsp;&nbsp;<img src="images/visa2.png" width="51" alt="Visa" /></li>
			        <li><img src="images/shop-online-lock.png" width="187" alt="shop online" /></li>
			    </ul>
			</div>
			<div class="modals">
				<div id="where-to-find-security" data-reveal="" class="reveal-modal small cvv text-center">
			    	<div class="img-wrap text-center">
			        	<img src="images/cvv_picture.jpg" width="460" height="360" alt="" />
						<a class="close-reveal-modal">
							<i class="icon-close close-sign"></i>
						</a>
			   		</div>
			  	</div>
			</div>
		</form>

		<?php if ($browser !== 'firefox') :?>
		<div id="bio_ep_bg"></div>
		<div id="bio_ep">
			<div id="bio_ep_content">
				<img id="discount_pop" src="images/checkout_pop.jpg" />
			</div>
		</div>
		<?php endif;?>

		<!-- Prepaid POP NOT WORKING CHECK COMBO PAGE-->
		<div id="blanket" style="display:none"></div>
		<div id="popPP" style="display:none;">
			<input onclick="submitPrepayOrder();" type="image" src="images/intelleral-pp.jpg" alt="Sign Me Up!"  id="submitPP" />
			<br />
			<center>
				<br /><span style="font-size:14px;text-decoration:underline;" id="noPP" class="hoverHand"><a onclick="prepaidPopHide();">I know I will never see this offer again, but no thanks.</a></span>
			</center> 
			<div class="loading" id="processPP" style="display:none;">
				<center style="padding-bottom:10px;"><img width="65" vspace="5" height="65" src="images/loading.gif"></center>
			</div>
		</div>
		<!-- End Prepaid POP -->
		<footer class="inner-footer">
			<div class="container">
		    <ul class="footer-menu">
		        	<li><a class="fancybox fancybox.iframe" href="inc/terms.php">TERMS </a></li>
		            <li><a class="fancybox fancybox.iframe" href="inc/privacy.php">PRIVACY POLICY </a></li>
		            <li><a class="fancybox fancybox.iframe" href="inc/contact.php">CONTACT US</a></li>
		        </ul>
		        <div class="copyright"><?= date('Y');?> &copy; <?php echo$LLproductName ?></div>
		       	<p>*The statements made on this website have not been evaluated by the Food & Drug Administration (FDA). The FDA evaluates only foods and drugs, not supplements like those found in <?php echo$LLproductName ?>. <?php echo$LLproductName ?> is not intended to diagnose, prevent, treat, or cure any disease(s). Representations regarding the efficacy and safety of <?php echo$LLproductName ?> have not been scientifically substantiated or evaluated by the Food and Drug Administration. Our website may have testimonials, reviews, or advertisements that link to it. Please be aware, we do not have control over these other websites and therefore you should review all the claims from those websites with this website. We do not condone any specific results that they may claim. Any claims made may not be typical results, and your results may vary. The information provided on this website is not a substitute for a face-to-face consultation with your physician or health care professional and should not be construed as medical advice for you. Please consult your physician or health care professional before beginning any supplementation. If there is a change in your medical condition, please stop using <?php echo$LLproductName ?> immediately and consult your physician or health care professional. The testimonials on this website are unique cases and we do not guarantee that you will get similar results. Your results may vary. Individuals are remunerated. You hereby irrevocably waive any right you may have to join claims with those of others in the form of a class action or similar procedural device. Any claims arising out of, relating to, or connected with this must be asserted individually. <?php echo$LLproductName ?>is not affiliated with any media outlets mentioned on this website. All trademarks on , whether registered or not, are the property of their respective owners. </p>
		    </div>
		</footer>
	</body>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/all.js"></script>
	<script type="text/javascript" src="js/init.js"></script> 
    <script type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/wow.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/additional-methods.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-100430029-1', 'auto');
	  ga('send', 'pageview');
	</script>
</html>