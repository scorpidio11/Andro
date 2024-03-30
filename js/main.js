$(document).ready(function () {
	$('#shipping_form').validate({
        errorPlacement: function(error, element) {
			//do not display error 
        },
        rules: {
            first_name: {
                required: true,
                lettersonly: true
            },
            last_name: {
                required: true,
                lettersonly: true
            },
            email: {
                required: true,
                email: true
            },
            address: {
                required: true
            },
            state: {
                required: true
            },
            phone: {
                required: true,
                phoneUS: true,
                maxlength: 10,
                minlength: 10,
                digits: true
            },
            zip_code: {
                required: true,
                maxlength: 6,
                minlength: 5,
                digits: true
            },
            city: {
                required: true,
                minlength: 2
            }
        },
        messages: {
            first_name: {
                required: 'Please enter your First Name',
                lettersonly: 'First Name must be letters only'
            },
            last_name: {
                required: 'Please enter your Last Name',
                lettersonly: 'Last Name must be letters only'
            },
            city: {
                required: 'Please enter your City',
                minlength: 'Your City name can\'t be less than 2 letters'
            },
            zip: {
                required: 'Please enter your ZIP code',
                minlength: 'Your ZIP code can\'t be less than 5 characters',
                maxlength: 'Your ZIP code can\'t be more than 5 characters',
                digits: 'Your ZIP code must use digits only'
            },
            address: {
                required: 'Please enter your address'
            },
            state: {
                required: 'Please select your state'  
            },
            email: {
                required: 'Please enter your email address',
                email: 'Please enter a valid email address'
            },
            phone: {
                required: 'Please enter a valid US phone!',
                maxlength: 'A valid US phone number can\'t be more than 10 digits',
                minlength: 'A valid US phone number can\'t be less than 10 digits',
                digits: 'Please digits only'
            }
        },
        onkeyup: false,
        highlight : function (element) {
			$(element).removeClass('valid');
			$(element).addClass('invalid');
        },
        unhighlight : function (element) {
            $(element).removeClass('invalid');
			$(element).addClass('valid');
        }
	});


	$('#LinkButton1').click(function() {
		if ($('#shipping_form').valid()) {
			$('#shipping_form').submit();
		}
	});

	$.validator.addMethod(
	    "expiration",
	    function(value, element) {
			var year = '20' + $('#Year').val();
			var month = $('#Month').val().replace(/^0+/, "");
			var result;
			
			if ($('#Month').val() !== '' && $('#Year').val() !== '') {
				// if expired
				var result =  (new Date(year, month) < new Date()) ? false : true;
				if (result == false) {
					$('#Month').removeClass('valid');
					$('#Month').addClass('invalid');
				}
				return result;
			} else {
				return false;
			}
	    },
	    "Please select a valid (not expired) Month and Year"
	);

	$('#checkout').validate({
        errorPlacement: function(error, element) {
           //do not display error 
			// error.insertAfter(element);
   //          error.addClass('valid_error');
        },
        rules: {
            cc_type: {
                required: true
            },
            cc_number: {
                required: true,
                digits: true,
				minlength: 16
            },
            fields_expmonth: {
                required: true
            },
            fields_expyear: {
                required: true,
				expiration: true
            },
            cc_cvv: {
                required: true,
                digits: true,
				minlength: 3
            }
        },
        messages: {
            cc_type: {
                required: 'Please select your Card Type' 
            },
            cc_number: {
                required: 'Please enter your Card Number',
                digits: 'Please numbers only'
            },
            fields_expmonth: {
                required: 'Please select your Expiration Month'
            },
            fields_expyear: {
                required: 'Please select your Expiration Year'
            },
            cc_cvv: {
                required: 'Please enter your CVV code',
                digits: 'Please numbers only'
            }
        },
        onkeyup: false,
        highlight : function (element) {
			$(element).removeClass('valid');
			$(element).addClass('invalid');
			var year = '20' + $('#Year').val();
			var month = $('#Month').val().replace(/^0+/, "");
			
			if ($('#Month').val() !== '' && $('#Year').val() !== '') {
				var result =  (new Date(year, month) < new Date()) ? false : true;
				if (result == false) {
					$('#Month').removeClass('valid');
					$('#Month').addClass('invalid');
					$('#Year').removeClass('valid');
					$('#Year').addClass('invalid');
				} else if (result == true) {
					$('#Month').removeClass('invalid');
					$('#Month').addClass('valid');
					$('#Year').removeClass('invalid');
					$('#Year').addClass('valid');
				}
			}
        },
        unhighlight : function (element) {			
			$(element).removeClass('invalid');
			$(element).addClass('valid');

			var year = '20' + $('#Year').val();
			var month = $('#Month').val().replace(/^0+/, "");
			if ($('#Month').val() !== '' && $('#Year').val() !== '') {
				var result =  (new Date(year, month) < new Date()) ? false : true;
				if (result == true) {
					$('#Month').removeClass('invalid');
					$('#Month').addClass('valid');
					$('#Year').removeClass('invalid');
					$('#Year').addClass('valid');
				} else if (result == false) {
					$('#Month').removeClass('valid');
					$('#Month').addClass('invalid');
					$('#Year').removeClass('valid');
					$('#Year').addClass('invalid');
				}
			}
        }
	});

	$('#LinkButton2').click(function() {
		if ($("#terms").is(':checked') == true) {
			if ($('#checkout').valid()) {
				submitOrder();
			}
		} else {
			alert('Please agree with terms and conditions');
			return false;
		}
	});

var location = window.location.pathname;
	
	if (navigator.userAgent.indexOf("Firefox") < 0) {
		var location = window.location.pathname;

		if (location == '/trial/step1/index.php' || location == '/trial/step1/') {
			bioEp.init({
				width: 680,
				height: 400,
				cookieExp: 0
			});
		} else if (location == '/trial/step1/checkout.php') {
			// set default price
			var value = '$4.95';
			$('#price').text(value);
			$('#total').text(value);
			// activate popup
			bioEp.init({
				width: 680,
				height: 400,
				cookieExp: 0
			});
		}
	}

 if (location == '/trial/step1/checkout.php') {
  // set default price
  var value = '$4.95';
  $('#price').text(value);
  $('#total').text(value);
 }
	// 222 is discount product id
	// it is not possible  to link php server side to js 
	//  it will require to develop ajax call which is wating of time, 
	// I will reference it in config
	$('#discount_pop').click(function() {
		bioEp.hidePopup();
		console.log('hide');
		//change display price
		var value = '$2.97';
		$('#price').text(value);
		$('#total').text(value);
		// show discount applied html section
		$('.discount').show();
		$('#pop_prod_id').val(272);
	});
	
	$('#main_pop').click(function() {
		bioEp.hidePopup();
	});

    $(".scroll-btn").click(function () {
        $('html,body').animate({
            scrollTop: $(".form-section-inner").offset().top
        }, 2500);
        $("#first_name").focus();
    });
    if ($("#validator").is(":visible")) {
        $('html,body').animate({
            scrollTop: $(".form-section-inner").offset().top
        }, 2500);
        $("#first_name").focus();
    }

    $('#orderbutton').removeClass("buttonhide");
    $('#loader_area').addClass("buttonhide");

});

function prepaidPopShow(){
	$('#popPP').show();
	$('#blanket').show();
	$('#checkout').hide();	
}

function prepaidPopHide(){
	$('#popPP').hide();
	$('#blanket').hide();
	$('#checkout').show();	
}

function submitPrepayOrder() {
	$("#LinkButton2").hide();

	var myform = $("#checkout");
	$.ajax({
		type : "post",
		url: "submit_prepaid.php",
		data: myform.serialize(),
		success: function(result) {
			var result = $.trim(result);
			console.log(result);
			$("#LinkButton2").show();
			if (result == "success") {
				window.location.href = "upsells/combo.php";
			} else if (result == "Please enter all mandatory fields.") {
				$('#notification').html('<div class="success" style="display: none;">'+result+'<img src="images/close.png" alt="" class="close" onclick="$(\'#notification\').hide();"/></div>');
				$("#downprocessing").hide();
				$("#btnorder_sub").show();
				$('.success').fadeIn('slow');
			} else {
				$('#notification').html('<div class="success" style="display: none;">'+result+'<img src="images/close.png" alt="" class="close" onclick="$(\'#notification\').hide();"/></div>');
				$('.success').fadeIn('slow');					
			}
		}
	});
}

function submitOrder() {
	$("#LinkButton2").hide();
	var myform = $("#checkout");
	$.ajax({
		type : "post",
		url: "submit_order.php",
		data: myform.serialize(),
		success: function(result){
			console.log(result);
			var result = $.trim(result);
			$("#LinkButton2").show();
			if (result == "success") {
				window.location.href = "upsells/combo.php";
			} else if (result == "Prepaid Credit Cards Are Not Accepted") {
				prepaidPopShow();
			} else if (result == "Please enter all mandatory fields.") {
				$('#notification').html('<div class="success" style="display: none;">'+result+'<img src="images/close.png" alt="" class="close" onclick="$(\'#notification\').hide();"/></div>');
				$("#downprocessing").hide();
				$("#btnorder_sub").show();
				$('.success').fadeIn('slow');
			} else {
				$('#notification').html('<div class="success" style="display: none;">'+result+'<img src="images/close.png" alt="" class="close" onclick="$(\'#notification\').hide();"/></div>');
				$('.success').fadeIn('slow');
			}
		}
	});
} 


wow = new WOW({
  boxClass:     'wow',
  animateClass: 'animated',
  offset:       0,  
  mobile:       true,
  live:         true 
})
wow.init();