<?php include 'config.php'; ?>

<div id="contactModal" class="reveal-modal" data-reveal>
	<h2>Contact Us</h2> 
 	<p>Scroll and Read Below</p>
	<div class="CodeRay">
  		<div>
   			<p class="lead">Need to get in touch?</p> 
   			<p><b>Contact us by email:</b> <?php echo $companyemail ?></p>
   			<p><b>Contact us by phone:</b> <?php echo $companyphone ?></p>
   			<p class="lead">Need to arrange a return?</p> 
   			<p>All returns must be accompanied by a Return Merchandise Authorization (RMA) number. To get an RMA, please call customer support at <?php echo $companyphone ?>.</p>
   			<p><strong>Return Address:</strong></p>
   			<p><?php echo $LLproductName ?> Returns<br />
      		<?php echo $returnaddress ?><br />
      		<?php echo $returncity ?>, <?php echo $returnstateabv ?> <?php echo $returnzip ?></p>
    		<p class="lead">Send us a postcard:</p>
   			<p><?php echo $companyname ?><br />
      		<?php echo $companyaddress ?><br />
      		<?php echo $companycity ?>, <?php echo $stateabv ?> <?php echo $companyzip ?></p>
  		</div>
 	</div>
  	<a class="close-reveal-modal">&#215;</a>
</div>