<?php 

include 'inc/config.php'; 

$arrFields = $userdata = $errMsg = array();
$first_name ='';
$last_name ='';
$address = '';
$city = '';
$country = 'US';
$state = '';
$zipcode = '';
$phone = '';
$email = '';

if (isset($_GET['AFID'])) {
	$_SESSION['order']['afid'] = $_GET['AFID'];
}

if (isset($_GET['SID'])) {
	$_SESSION['order']['sid'] = $_GET['SID'];
}

if (isset($_GET['C1'])) {
	$_SESSION['order']['c1'] = $_GET['C1'];
}

if (isset($_GET['C2'])) {
	$_SESSION['order']['c2'] = $_GET['C2'];
}

if (isset($_GET['click_id'])) {
	$_SESSION['order']['click_id'] = $_GET['click_id'];
}

if (isset($_SESSION['order']['user_info'])) {
	$userdata = $_SESSION['order']['user_info'];
	$first_name = $userdata['first_name'];
	$last_name = $userdata['last_name'];
	$address = $userdata['address'];
	$city = $userdata['city'];
	$state = $userdata['state'];
	$zipcode = $userdata['zipcode'];
	$phone = $userdata['phone'];
	$email = $userdata['email'];
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'add') {
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$address = trim($_POST['address']);
	$city = trim($_POST['city']);
	$state = trim($_POST['state']);
	$zipcode = trim($_POST['zip_code']);
	$phone = trim($_POST['phone']);
	$email = trim($_POST['email']);
	$order_placed = "No";
	$status = "1";
	
	$errMsg = array();
	if ($first_name == '') {
		$errMsg['error'] = 'Please enter first name';
		$arrFields['first_name'] = '';
	}
	if ($last_name == '') {
		$errMsg['error'] = 'Please enter last name';
		$arrFields['last_name'] = '';
	}

	if ($address == '') {
		$errMsg['error'] = 'Please enter address';
		$arrFields['address'] = '';
	}

	if ($city == '') {
		$errMsg['error'] = 'Please enter city';
		$arrFields['city'] = '';
	}	
	if ($state == '') {
		$errMsg['error'] = 'Please select state';
		$arrFields['state'] = '';
	}

	if ($zipcode == '') {
		$errMsg['error'] = 'Please enter zipcode';
		$arrFields['zipcode'] = '';
	}

	if ($phone == '') {
		$errMsg['error'] = 'Please enter phone';
		$arrFields['phone'] = '';
	}

	if ($email == '') {
		$errMsg['error'] = 'Please enter email';
		$arrFields['email'] = '';
	}

	if ($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errMsg['error'] = 'Please enter valid email';
		$arrFields['email'] = '';
	}
	
	$arrFields = array(
		"first_name" => $first_name, 
		"last_name" => $last_name, 
		"address" => $address, 
		"city" => $city, 
		"state" => $state, 
		"country" => $country, 
		"zipcode" => $zipcode, 
		"phone" => $phone, 
		"email" => $email,
		"order_placed" => $order_placed,
		"status" => $status
	);

	if (count($errMsg) < 1) {
		$_SESSION['order']['address_info']["SA"] = $arrFields;
		$_SESSION['order']['user_info']= $arrFields;	
		//print_r($_POST);
		/*echo '<pre>';
		print_r($_SESSION['order']);
		echo '</pre>';
		exit;	*/
		include_once 'post_user.php';
	} else {
		$errMsg['error'] = 'Please enter all mandatory fields.';
	}
	//print_r($errMsg);
	//exit;
}
?>

<!doctype html>
<html lang="en">
	<head id="Head1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title><?= $LLproductName ?></title>
		<link rel="icon" href="images/favicon.png" sizes="16x16" type="image/png" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/animate.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
			#error { 
				margin-left: 23; 
				border: 1px dotted red; color: red; font-size: 14px; 
				padding: 10px; 
				text-align: center; 
				background: url(images/topfade-red.gif) repeat-x top; 
			}
			.hide { display: none; }
			#bio_ep_close {
			    position: absolute;
			    left: 100%;
				padding-top:7px;
			    margin: -8px 0 0 -12px;
			    width: 25px;
			    height: 25px;
			    color: #fff;
			    font-size: 13px;
			    font-weight: bold;
			    text-align: center;
			    border-radius: 50%;
			    background-color: #555555;
			    cursor: pointer;
			}
		</style>
		<link rel="icon" type="image" href="images/favicon.png" />
		<link href="fonts.googleapis.com/cssaa4a.css?family=Open+Sans:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
	</head>
	<body id="landing-de" lang="en" locale="en" class="landing home header-fixed">
		<form method="post" action="" id="shipping_form">
			<input type="hidden" name="action" value="add" />
        	<header>
				<div class="site-secure">
					<img src="images/site-security-img.png" width="112" alt="site security" />
				</div>
    			<div class="top-header">
    				<div class="container">
        				<div class="warning-notice-timer sm-hide">
							<span class="alert-color">Warning: </span> Due to extremely high media demand, there is limited supply of 
							<span class="product-name"><?php echo$LLproductName ?></span> in stock as of  
							<span class="today"></span>
							<span class="hurry">. HURRY! 
							<!-- 	<span id="stopwatch"></span> -->
							</span>
						</div>
        			</div>
    			</div>    
				<div class="container">
        			<div class="header-section clearfix">
        				<div class="logo">
							<img src="images/logo.png" alt="Logo" />
						</div>
            			<div class="right-header">
            				<div class="right-heaader-section clearfix">
                				<div class="header-risk-trial">Get Your Risk Free Trial Today 
									<img src="images/header-arrow.png" width="10" alt="" />
								</div>
                    			<button type="button" class="btn header-btn heartbeat scroll-btn"><i class="right-arrow"></i> Get my risk free trial</button>
                			</div>
            			</div>
        			</div>
    			</div>
			</header>
			<div class="banner">
				<div class="container">
					<div class="banner-col clearfix">
        				<div class="banner-col1">
							<img src="images/inner-banner-logo.png" width="" alt="" />
                			<div class="sapill wow zoomIn">
                				<!-- <b style="font-size:0.8rem; vertical-align: super;">Key Ingredients</b> 5% Minoxidil<br/> -->
								<span style="padding-bottom:10px;">WORKOUT GAME CHANGER</span>
								<!-- Mind-Blowing Results! -->
                			</div>
                			<ul style="list-style: none !important;">
								
								<li>Helps Gain Strength Fast</li>
							
                				<li>Helps Reinvent Your Body</li>
							<li>Helps Enhance Sexual Stamina</li>
								
							
                			</ul>
            				<button type="button" class="btn btn-block banner-btn heartbeat scroll-btn" onclick="#form-box"><i class="right-arrow2"></i> Get my risk free trial</button>
            			</div>
            			<div class="banner-col2">
            				<div class="banner-right">
                				<div class="banner-right-img clearfix">

<div > <ul class="banner-right-hurry"> <li>Hurry! Only 250 trial sent per day! <br/>
Limit 1 per Customer
</li></ul></div>
	                    			<ul class="banner-right-list">
                        				<li class="wow zoomOut">&nbsp;</li>
                            			<li class="wow zoomOut">&nbsp;</li>
                        			</ul>
	                				<img  class="wow zoomIn" src="images/img1.png" width="200" alt="" />
                    			</div>
                    			<div class="clear"></div>
                    			<ul class="banner-client-icon clearfix">
                        			<!-- <li><img src="images/ba-client1.png" width="41" alt="" /></li>	
                        			<li><img src="images/ba-client2.png" width="33" alt="" /></li>	
                        			<li><img src="images/ba-client3.png" width="37" alt="" /></li>	
                        			<li><img src="images/ba-client4.png" width="41" alt="" /></li>	
                        			<li><img src="images/ba-client5.png" width="75" alt="" /></li>	 -->
								</ul>
                			</div>
            			</div>
        			</div>    	
    			</div>	
    			<!-- <div class="dr-img">
					<img src="images/Dr.png" width="95" alt="" />
				</div> -->
			</div>
			<div class="mb-banner">
				<img src="images/mb-banner.jpg" width="100%" alt="Banner" />
			</div>
			<div class="tab-banner">
				<div class="container">
					<img src="images/tab-banner.jpg" width="100%" alt="Banner" />
    				<button type="button" class="btn banner-btn heartbeat scroll-btn" onclick="#form-box"><i class="right-arrow2"></i> Get my risk free trial</button>
     			</div>
			</div>
			<section class="mental-ability">
    			<div class="container">
					<h2 class="bold-blk">
					<span class="skyblue">SAFE AND BACKED BY SCIENCE</span><!-- <h4>Invented by Physicians and
					Backed by Clinical Studies</h4> -->
					
					</h2>
        			<div class="mental-ability-inner clearfix">
            			<div class="mental-ability-img">
							<img src="images/graph.jpg"  alt="">
						</div>
            			<div class="mental-ability-content">



		<p><span class="firstLetter">A</span>s men get older, testosterone levels begin to drop. In fact, after age 30, your testosterone levels drop by 2-4% per year. 
<span class="orange">&nbsp; If you are looking for an edge, a secret weapon, that will help you push harder and maximize your potential… Well, we are here to help.</span> Androdrox is a safe way to boost free testosterone and burn fat.  Almost every man can benefit from a boost in free testosterone to intensify his experience in the gym and in the bedroom.	
</p>
<div class="ability-box clearfix">
<div class="ability-green-box">
<span class="black"><bold> STEP 1:</bold> ANDRODROX permeates your bloodstream.</span></div>
</div>

<div class="ability-box clearfix">
<div class="ability-green-box">
<span class="black"> 
									
<strong>STEP 2:</strong> The powerful ingredients spread throughout your body, optimizing your levels of free testosterone.
	</span></div>
		</div>
<div class="ability-box clearfix">
<div class="ability-green-box">
<span class="black"><strong>  RESULTS:</strong> More energy, enhanced muscle mass, decreased body fat and the sexual drive & performance that you’ve been looking for.
</span></div>
</div>



            			</div>
        			</div>
        			<div class="ability-list">
	            	<!-- 	<h5 class="orange">IQGENEX  Will:</h5> 
	            		<ul>
	                		<li>Increase Academic and Work Performance</li>
	                		<li>Study Less and Play Hard</li>
	                		<li>Blow Away the Competition at Job Interviews, Work or School</li>
	                		<li>Reduce Stress and Increase Your Happiness and Success Quotients</li>
	            		</ul>-->
	        		</div>
    			</div>    
			</section>
			<section id="steps-slider" class="brain-power steps-slider slider_wrap disable steps">
				<div class="container">
<h2 class="bold-blk">
		    		<span class="skyblue">TESTED PROVEN POWER</span>
						<!-- <span class="skyblue" style="font-size:0.6em;">No More Spikes, Crash and Caffeine Headaches</span> -->
					</h2>

	        		<div class="slider_ctrl">
              			<div class="slider-arrow left-arrow hide">
                			<div class="table">
	                  			<div class="table-cell">
									<i class="icon-circle-arrow-left"></i>
								</div>
                			</div>
              			</div>
	              		<div class="slider-arrow right-arrow hide">
	                		<div class="table">
	                  			<div class="table-cell">
									<i class="icon-circle-arrow-right"></i>
								</div>
	                		</div>
	              		</div>
	              		<ul class="after-before img_slides_wrap slides_wrap wrap steps clearfix">
	                		<li class="product active" id="steps-slide1">
	                    		<div class="brain-before step">
	            					<img src="images/before.png" alt="" />
	           					</div>
	                		</li>
	                		<li class="product" id="steps-slide2">
	                    		<div class="brain-after step">
	            					<img src="images/after.png" alt="" />
			            		</div>
	                		</li>
	              		</ul>
		              	<ul class="dotlist">
		             	 	<li class="dot-wrap active">
								<a class="dot" href="#steps-slide1"></a>
							</li>
		              		<li class="dot-wrap">
								<a class="dot" href="#steps-slide2"></a>
							</li>
		              	</ul>
            		</div>    
	    			
			       <ul class="brain-list clearfix">
			        	<li>
			            	<h5>Androdrox is proven to increase physical strength, aerobic performance, daily muscle fatigue, and enhanced muscle definition.</h5> <p>It will get rid yourself of unwanted waste that inhibits your body from building the muscles of your dreams. There’s nothing on the market that guarantees the results and benefits in the development of a lean muscular body like Androdrox.
</p>
			            </li>


	<li>
			            	<h5>
Taking Androdrox with your regular diet and exercise program provides a really easy and simple way to get that sculpted body.</h5> <p>It adds unmatched definition to your abs, legs and chest. Get ready to emerge as a more athletic, sculpted and attractive you. The incredible rush of energy you will feel daily, with Androdox, is amazing. The steady stream of energy and stamina are always good and will give you a ton of confidence throughout your day.</p>
			            </li>

			           <!--  <li>
			            	<h5> WGCP™ has been clinically shown to increase focus and concentration for 5 to 6 hours from participants of a clinical trial.* </h5>
							<p>WGCP™ delivers caffeine slowly over time. This is the key difference between IQGENEX  and every other caffeinated product out there. It allows the brain to replenish normal Dopamine levels before wearing off. Safe for long-term use.</p>
			            </li>
			            <li> 
			            	<h5>Working Memory</h5>
							<p>It is crucial to quickly mastering tasks and making you so efficient that you get the job done with extreme performance.</p>
			            </li>
			            <li>
			            	<h5>Information Processing</h5>
							<p>The speed with which your brain acts and sometimes the difference between success and failure is the lighting quick thinking that IQGENEX  provides.</p>
			            </li> -->
			        </ul> 
	        		<!-- <h5 class="skyblue">Extra Benefit:</h5><br />
	        		<p>Androdrox is proven to improve physical strength, aerobic performance, daily muscle fatigue, and enhanced muscle definition. It will rid your body of unwanted waste that delays your body from building the muscles of your dreams. There’s nothing on the market that guarantees results and benefits the development of a lean muscular body. 

Taking Muscle Growth with your regular diet and exercise program gives you a really easy and simple way to get that sculpted body. It adds unmatched definition to your abs, legs and chest. Get ready to emerge as a more athletic, built and attractive you.  The incredible rush of energy you feel daily with Androdox is amazing.  The pumps and stamina are always good and will give you a ton of confidence throughout your day. -->

<!-- 
L-Arginine is a precursor of nitric oxide in the human body. Clinical studies have discovered that nitric oxide is an essential compound that increases blood circulation and is important for normal sexual function in both men and women. -->
				</div>
			</section>
		<section class="genius">
				<div class="container">
    				<h2 class="bold-blk">
						<span class="skyblue">

DECLINING TESTOSTERONE <br/>
IS A HARSH REALITY

<br/></span>
					</h2>
        			<div class="genius-inner clearfix">
        				<div class="genius-img">
							<img src="images/product2.jpg" width="313" alt="" />
						</div>
            			<div class="genius-content">
						<p> <span class="firstLetter">A</span>s men  get older testosterone levels begin to drop. In fact after age 30 your testosterone levels drop by 2-4% per year.   Andordox supplements have been scientifically designed to provide a number of benefits to you, right away, with the positive results growing each month. </span>
					If you want maximum results, you need to continuously use the supplements daily for 90 days. 90 days of dedicated use and we guarantee you are going to experience these results! <br/><br/>

<span class="ability-green-box ">
								HIGHTENED ENDURANCE </span>
<span class="ability-green-box ability-box">INCREASED LEAN MUSCLE & BURN MORE FAT </span>
<span class="ability-green-box ability-box">INCREASED SEX DRIVE & STAMINA</span>
<span class="ability-green-box ability-box">FAST WORKOUT RECOVERY</span>
<!-- <span class="ability-green-box ability-box">FAT LOSS</span> -->
	</p>
							

								<!-- To measure the effects of WGCP™ on core executive functions used in standard academic study,
								the Cleveland Clinic used the ADHD core battery of the Cambridge neuropsychological test automated battery
								(CANTAB).
								 -->
								<!-- The study used the withdrawal design to examine the differential effects of WGCP™ and placebo in neurotypical college-age adults ages 18 to 25 years.

								WGCP is NOT an ADD/ADHD medication or cure, it is aclinically tested focus & study aid product. -->
															</p>
															<!--<span class="black bold">UNIVERSITY OF TAMPA</span>
															<p>Clinical study conducted by the University of Tampa shows 6 to 8 hours of sustained release energy with no crash.</p>
															 <ul class="genius-after-before clearfix">
								            					<li><img src="images/genius-ba1.jpg" width="500" alt="" /></li>
								            				</ul> -->
            			</div>
        			</div>
    			</div>
			</section>
					<section class="hard-clear">
				<div class="container">
    				<div class="hardclear-inner clearfix">
        				<div class="hardclear-content">
            				<h2 class="bold-blue">Feel More
								<span class="white">Desired</span> 
							</h2>
               <p> <b>Androdrox not only supports muscle growth but increases your sexual appetite, Androdrox alters your body’s chemistry to skyrocket virility, which increases your stamina keeping your partner satisfied through hours of amazing sex. <!-- Increased blood flow is the key to better sexual performance, harder, fuller erections and better workouts. --> Take Androdrox daily to boost your performance.</b></p> 
            			</div>
        				<div class="hardclear-img">
							<img src="images/blank1.png" alt="" />
						</div>
        			</div>
    			</div>
			</section>
			<section class="boosttest">
				<div class="container">
			    	<div class="boosttest-inner clearfix">
			        	<div class="boosttest-img">
							<img src="images/blank2.png" alt="" />
						</div>
			            		<div class="hardclear-content2">
			            	
								<h2 class="bold-blue"> Maximize Your<br /><span class="white"> Potential</span>
							</h2>
			              <p><b><br/>Androdrox is an all natural muscle building formula made to increase muscle strength, endurance, and protein output in your body. Our supplement will rid your body of unwanted waste that delays your body from building the muscles of your dreams.<!-- <span class="black bold">SUPERCHARGED BRAIN PERFORMANCE</span>. --></b></p> 
			            </div>
			        </div>
			    </div>
			</section>


			<section id="testimonials-slider" class="slider_wrap testimonial">
				<div class="container">
    				<!-- <h6>This is What</h6> -->
        			<h2 class="bold-blk">
					<span class="skyblue">
						VERY SATISFIED REAL CUSTOMERS </span>
					</h2>
        			<div class="slider_ctrl">
              			<div class="slider-arrow slider-left-arrow">
                			<div class="table">
                  				<div class="table-cell">
									<i class="testiminial-arrow-left"></i>
								</div>
                			</div>
              			</div>
              			<div class="slider-arrow slider-right-arrow">
                			<div class="table">
                  				<div class="table-cell">
									<i class="testiminial-arrow-right"></i>
								</div>
                			</div>
              			</div>
              			<ul class="img_slides_wrap slides_wrap wrap">
                			<li id="slide1" class="product active">
                    			<div class="testimonial-box clearfix">
                        			<div class="testimonial-img">
										<img src="images/testiminal-pf1.png" width="196" alt="" />
									</div>
                        			<div class="testimonial-content">
                            			<p>"The increased stamina is what really makes her happy." Most of the stuff out there is actually junk. But ANDRODROX seems to be the real exception. The lean muscle growth is there but for my wife, the increased stamina is what really makes her happy."</p>
                            			<div class="testi-name bold">Tom J. 52-year old  - Tampa, Florida</div>
                        			</div>
                    			</div>
                			</li>
                			<li id="slide2" class="product">
                      			<div class="testimonial-box clearfix">
			                        <div class="testimonial-img">
										<img src="images/testiminal-pf2.png" width="196" alt="" />
									</div>
		                    		<div class="testimonial-content">
		                        		<p>"I love the muscle gains but my increased hardness and stamina is what really excites me." I've been taking ANDRODROX for 2 months and have definitely noticed the change in my life. I love the muscle gains but my increased hardness and stamina is what really excites me."
										</p>
		                        		<div class="testi-name bold">Jared M. 42-year old  – Fullerton, California</div>
		                    		</div>
		                 		</div>
                			</li>
                			<li id="slide3" class="product">
                    			<div class="testimonial-box clearfix">
			                        <div class="testimonial-img">
										<img src="images/testiminal-pf3.png" width="196" alt="" />
									</div>
	                        		<div class="testimonial-content">
	                            		<p>"I've taken ANDRODROX months and added about an inch and a half in muscle mass" I've taken ANDRODROX for three months and added about an inch and a half in muscle mass on my arms and an inch on the chest. This stuff is the bomb. And my sex life and libido has never been"</p>
	                            		<div class="testi-name bold">
											Dr. Alex Maskar  33-year old – Bloomington, Indiana <br/>&nbsp;
										</div>
								 		
	                        		</div>
	                    		</div>
                			</li>
							<li id="slide4" class="product">
                    			<div class="testimonial-box clearfix">
			                        <div class="testimonial-img">
										<img src="images/testiminal-pf4.png" width="196" alt="" />
									</div>
	                        		<div class="testimonial-content">
	                            		<p>"With ANDRODROX, I've been able to achieve the growth in muscle mass I've always dreamed of "With ANDRODROX, I've been able to achieve the growth in muscle mass I've always dreamed of. Its the only supplement out there that actually works plus the added advantage of amazing stamina in the bedroom."</p>
	                            		<div id="pop" class="testi-name bold">
											Dave Zuroski 56-year old – Tucson, Arizona<br/>&nbsp;
										</div>
								 		
	                    		</div>
                			</li>
              			</ul>
            		</div>
					<ul class="dotlist">
	             	 	<li class="dot-wrap active"><a class="dot" href="#slide1"></a></li>
	              		<li class="dot-wrap"><a class="dot" href="#slide2"></a></li>
	              		<li class="dot-wrap"><a class="dot" href="#slide3"></a></li>
	              	</ul>        
    			</div>
			</section>
			<section id="index-form" class="form-section">
				<div class="container">
    				<div class="form-section-inner clearfix">
            			<div class="form-product">
            				<div class="form-product-img clearfix">
	                    		<ul class="form-product-list">
                        			<li class="wow zoomOut">&nbsp;</li>
                            		<li class="wow zoomOut">&nbsp;</li>
                        		</ul>
	                			<img class="wow zoomIn" src="images/img1.png" width="200" alt="" />
                    		</div>
            			</div>
            			<div class="form-box">
            				<h3>Where Can We Send <br />Your Risk Free Trial</h3>
                  			<div id="error" class="form-col hide" style="margin:0px;padding:0px;white-space:inherit">    
                      			<span id="validator" style="visibility:hidden;"></span>
                  			</div>
                  			<div class="form-col2 clearfix">
								<div class="form-col1-2">
                      				<label>First name</label>
                      				<input name="first_name" class="validate[required]" type="text" maxlength="30" id="first_name" tabindex="1" placeholder="First Name" />
                    			</div>
                    			<div class="form-col1-2">  
                      				<label>Last name</label>
                        			<input name="last_name" type="text" class="validate[required]" maxlength="30" id="last_name" tabindex="2" placeholder="Last Name" />
                    			</div>  
                  			</div>
                  			<div class="form-col">
                      			<label>Street</label>
                      			<input name="address" type="text" class="validate[required]" maxlength="100" id="address" tabindex="3" placeholder="Street" />
                  			</div>
                			<div class="form-col2 clearfix">
                    			<div class="form-col1-2">  
	                      			<label>Zip / Postcode</label>
	                        		<input name="zip_code" maxlength="5" class="validate[required]" id="zip_code" tabindex="4" type="tel" pattern="[0-9]*" placeholder="Zip Code" />
	               			    </div>  
								<div class="form-col1-2">
	                      			<label>State</label>
	                      			<select name="state" id="state" tabindex="5" placeholder="State" class="validate[required]">
										<option value="">State</option>
										<option value="AL">Alabama</option>
										<option value="AK">Alaska</option>
										<option value="AZ">Arizona</option>
										<option value="AR">Arkansas</option>
										<option value="CA">California</option>
										<option value="CO">Colorado</option>
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="DC">District Of Columbia</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="HI">Hawaii</option>
										<option value="ID">Idaho</option>
										<option value="IL">Illinois</option>
										<option value="IN">Indiana</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="ME">Maine</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI">Michigan</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NV">Nevada</option>
										<option value="NH">New Hampshire</option>
										<option value="NJ">New Jersey</option>
										<option value="NM">New Mexico</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="ND">North Dakota</option>
										<option value="OH">Ohio</option>
										<option value="OK">Oklahoma</option>
										<option value="OR">Oregon</option>
										<option value="PA">Pennsylvania</option>
										<option value="RI">Rhode Island</option>
										<option value="SC">South Carolina</option>
										<option value="SD">South Dakota</option>
										<option value="TN">Tennessee</option>
										<option value="TX">Texas</option>
										<option value="UT">Utah</option>
										<option value="VT">Vermont</option>
										<option value="VA">Virginia</option>
										<option value="WA">Washington</option>
										<option value="WV">West Virginia</option>
										<option value="WI">Wisconsin</option>
										<option value="WY">Wyoming</option>
									</select>
	                    		</div>
                  			</div>
	                  		<div class="form-col">  
		                    	<label>City</label>
		                    	<input name="city" type="text" maxlength="30" id="city" tabindex="6" placeholder="City" class="validate[required]"/>
		                  	</div>
	                  		<div class="form-col2 clearfix">
								<div class="form-col1-2">
	                      			<label>Phone</label>
	                        		<input name="phone" maxlength="10" id="phone" tabindex="7" type="tel" pattern="[0-9]*" class="validate[required]" placeholder="Phone" />
	                    		</div>
	                    		<div class="form-col1-2">  
	                      			<label>Email</label>
	                        		<input name="email" maxlength="50" id="email" tabindex="8" type="email" placeholder="Email" class="validate[required]"/>
	                    		</div>
	                    		<div class="submit-btn">
	                        		<a id="LinkButton1" class="btn sub-btn heartbeat btnsub" href="javascript:void(0);">
	                    	    		<i class="right-arrow2"></i> SEND MY RISK FREE TRIAL
	                        		</a>
	                    		</div>
			                    <div class="secure-form">
			                    	<i class="secure-lock"></i> Secure 256-bit SSL Encryption
			                    </div>  
	                  		</div>
            			</div>        
        			</div>
			        <div class="dr-img">
						<img src="images/Dr.png" width="95" alt="" />
					</div>
	    		</div>
			</section>

			<div class="footer-client">
				<div class="container">
		  				<ul>
	    				<li><img src="images/f-norton.png" width="99" alt="" /></li>
	    				<li><img src="images/f-mcafee.png" width="102" alt="" /></li>
	    				<li><img src="images/f-visa.png" width="84" alt="" /></li>
	    				<li><img src="images/f-mastercard.png" width="102" alt="" /></li>
	    			</ul>
				</div>
			</div>
			<footer class="inner-footer">
				<div class="container">
			    	<ul class="footer-menu">
			        	<li><a class="fancybox fancybox.iframe" href="inc/terms.php">TERMS </a></li>
			            <li><a class="fancybox fancybox.iframe" href="inc/privacy.php">PRIVACY POLICY </a></li>
			            <li><a class="fancybox fancybox.iframe" href="inc/contact.php">CONTACT US</a></li>
			        </ul>
			        <div class="copyright">
						<?= date('Y');?> &copy; <?php echo$LLproductName ?>
					</div>
			        <p>*The statements made on this website have not been evaluated by the Food & Drug Administration (FDA). The FDA evaluates only foods and drugs, not supplements like those found in <?php echo$LLproductName ?>. <?php echo$LLproductName ?> is not intended to diagnose, prevent, treat, or cure any disease(s). Representations regarding the efficacy and safety of <?php echo$LLproductName ?> have not been scientifically substantiated or evaluated by the Food and Drug Administration. Our website may have testimonials, reviews, or advertisements that link to it. Please be aware, we do not have control over these other websites and therefore you should review all the claims from those websites with this website. We do not condone any specific results that they may claim. Any claims made may not be typical results, and your results may vary. The information provided on this website is not a substitute for a face-to-face consultation with your physician or health care professional and should not be construed as medical advice for you. Please consult your physician or health care professional before beginning any supplementation. If there is a change in your medical condition, please stop using <?=$LLproductName;?> immediately and consult your physician or health care professional. The testimonials on this website are unique cases and we do not guarantee that you will get similar results. Your results may vary. Individuals are remunerated. You hereby irrevocably waive any right you may have to join claims with those of others in the form of a class action or similar procedural device. Any claims arising out of, relating to, or connected with this must be asserted individually. <?php echo$LLproductName ?> is not affiliated with any media outlets mentioned on this website. All trademarks on , whether registered or not, are the property of their respective owners. </p>
			    </div>
			</footer>
			<div id="bottom-floating-bar" class="floating-bar float">
				<button type="button" class="cta-btn float-btn heartbeat scroll-btn mobile-optn"><i class="right-arrow"></i> Get my risk free trial</button>
			</div>
		</form>

		<?php if ($browser !== 'firefox') :?>
			<div id="bio_ep_bg"></div>
			<div id="bio_ep">
				<div id="bio_ep_content">
					<a href="/trial/step1/#pop">
						<img id="main_pop" src="images/main_pop.jpg" alt="Claim your discount!" />
					</a>
				</div>
			</div>
		<?php endif;?>

	</body>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/all.js"></script>
	<script type="text/javascript" src="js/wow.js"></script>
	<script type="text/javascript" src="js/bioep.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/additional-methods.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>	
</html>