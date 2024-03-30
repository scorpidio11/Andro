<?php include 'inc/config.php'; ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='msapplication-config' content='none'>
    <title><?php echo $sitetitle; ?> </title>
    <link rel='shortcut icon' type='image/ico' href='themes/responsive/favicon.ico'>
    <link rel='apple-touch-icon' sizes='57x57' href='themes/responsive/images/apple-icon-114.png'>
    <link rel='apple-touch-icon' sizes='114x114' href='themes/responsive/images/apple-icon-114.png'>
    <link rel='apple-touch-icon' sizes='72x72' href='themes/responsive/images/apple-icon-144.png'>
    <link rel='apple-touch-icon' sizes='144x144' href='themes/responsive/images/apple-icon-144.png'>
    <link rel="stylesheet" href="css/thanks.css">
	
	<style>
		table {
		  border-collapse: collapse;
		  margin: 10px 0px 30px 0px;
		  width:40%;
		}
		th,td {
		  border: 1px solid #cecfd5;
		  padding: 5px 10px;
		  font: 12px arial, sans-serif;
		}

		th {
		    background-color: #c9f4fc;;   
		}

		td {
		    background-color: #ffffff;;   
		}
		p {
		 font: 15px arial, sans-serif;	
		}

		@media only screen and (min-width: 760px) {	
			.term {
				width:40%;	
			}			
		}

		@media 
		only screen and (max-width: 760px),
		(min-device-width: 768px) and (max-device-width: 1024px)  {
			table {
				border-collapse: collapse;
				margin: 10px 0px 30px 0px;
				width:90%;
			}
			.term {
				width:90%;	
			}
		}
		@media only screen and (min-device-width : 320px) and (max-device-width : 480px)  {
			table {
				border-collapse: collapse;
				margin: 10px 0px 30px 0px;
				width:100%;
			}
		}

		.term p {
			font: 0.6em "Open Sans", sans-serif;
		}
	</style>
</head>
<body>
	<div id="notification" style="display:<?php echo count($errMsg)?'block':'none'?>"><div class="success"><?php echo '<br/>'. $errMsg; ?><img src="images/close.png" alt="" class="close" onClick="closeMessage();"/></div></div>
		<div class="row">  
			<div class="large-12 columns">
				<div align="center" style="margin: 5px;">
					<img src="images/thanksBg.jpg" width="80%" />
				</div>
				<?php if (isset($_SESSION['summary'])) :?>
					<div width="100%" align="center"  style="background: #f6f6f6; padding: 20px 20px 20px 20px;">
						<h5>Thank you for trying <?php echo $sitetitle;  ?></h5>
						<p>Product is in stock and will ship within the next 24 hours</p> <br/>
						<h4>ORDER INFORMATION </h4>
	 					<table border="5" cellpadding="4" cellspacing="3">
	   						<tr>
	      						<th align="left">
									<b>Item</b>
								</th>
	      						<th align="center">
									<b>Price</b>
								</th>
	   						</tr>
							<?php
								$total = 0;
							?>
							<?php foreach($_SESSION['summary'] as $k => $v) :?>
							<?php $total += $v['price'];?>
	   						<tr >
	      						<td><?=$v['name'];?></td>
	      						<td align="center"><?=$v['price'];?></td>
	   						</tr>
							<? endforeach;?>
	    					<tr align="center">
	      						<td align="right">
									<b>Billed on <?=date('Y-m-d');?> Total:</b>
								</td>
	      						<td>
									<b>$<?=$total;?></b>
								</td>
	   						</tr>
						</table>
					<!-- 	<div class="term" align="center" >
							<p>
								<b>Terms and conditions for Evaluastion auto shipment and billing</b> <br/>
								By placing your order you will be receiving a 14 day evaluation of for the price of $5.95 for Hair Regrowth Treatment and $4.95 for Advanced Hair Nutrition! We stand by our satisfaction Guarantee and our friendly customer service. You will also be enrolling into our convenient auto ship program once your evaluation expires. You understand that you are subscribing to a monthly shipment program and you will be charged $89.95 per month for Hair Regrowth Treatment $84.95.95 for Advanced Hair Nutrition. It starts 14 days from today and every 30 days thereafter unless cancelled. You also understand that you can cancel at any time, subject to the provisions of section 3, without further obligation by calling 877-659-3344, Monday - Friday between the hours of 9am-5pm MST. You will recieve your package within 2-5 business days of each payment. Please allow 2-5 Business days for your initial Bottle.
							</p> <br/>
						</div> -->	
					</div>
				<?php else : ?>
					<div width="100%" align="center"  style="background: #f6f6f6; padding: 20px 20px 20px 20px;">Thank you for visiting us!</div>
				<?php endif; ?>
			</div>
		</div>
	</div>    
    <div class='av-footer-bottom'>
		<div class='av-ma'>
			<p class='av-footer-copyright'>
				<span>Copyright &copy; <?= date('Y');?></span> <?php echo $sitetitle;  ?> Inc. All rights reserved
			</p>
			<ul class='clearfix av-footer-nav'>
				<li>
					<a href="javascript:void(0);"  onclick="javascript:window.open('inc/terms.php');">Terms and Conditions</a>
				</li>
				<li>
					<a href="javascript:void(0);"  onclick="javascript:window.open('inc/privacy.php');">Privacy Policy</a>
				</li>
				<li>
					<a href="javascript:void(0);"  onclick="javascript:window.open('inc/contact.php');">Contact Us</a>
				</li>
			</ul>
		</div>
	</div> 
	<?php session_unset(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100430029-1', 'auto');
  ga('send', 'pageview');

</script>
</body>

</html>