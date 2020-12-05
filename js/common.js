jQuery(document).ready(function(){

	var paymentForm = $('.membership_form');
	var price, plan_category, plan_name, plan_type, amount, gst;
	
	$("#submit-contact-button").click(function(){
		var form = $('#enquiryForm');
  	if(form[0].checkValidity() === false){    
      if(form[0][1].checkValidity() === false) {
        feedbackText($('.invalid-email'), form[0][1].value, "email id");
        $(form[0][1]).blur(function(){
            feedbackText($('.invalid-email'), form[0][1].value, "email id");
        });
      }
      if(form[0][2].checkValidity() === false) {
        feedbackText($('.invalid-phone'), form[0][2].value, "phone no.");
        $(form[0][2]).blur(function(){
            feedbackText($('.invalid-phone'), form[0][2].value, "phone no.");
        });
      }
      if(form[0][3].checkValidity() === false) {
      	$('.invalid-plan').show();
      	$('[name="plan_type"]').change(function() {
      		$('.invalid-plan').hide();
      	});
      }
      form.addClass('was-validated');
    }
		else {
			$('#preloader').fadeIn();
			$('.loader').fadeIn('slow');
			jQuery.ajax({
				beforeSend: function () {},
				type	: "POST",
				url		: "enquiry_code.php",
				data	: $('#enquiryForm').serialize(),
					success: function (res) {
						data_arr = res.split('@@');
						if(data_arr[0]=='succ') {
							$(".error").hide();
							window.location.href="thank-you.html";
						}
						else {
							document.getElementById("enquiryForm").reset();
							form.removeClass('was-validated');
							$('.loader').fadeOut();
							$('#preloader').fadeOut('slow');
							$(".error").css('display','flex')
						}
					},
					complete: function() {
						$(".error").hide();
					},
			});
			return false;
		}
	});

	$(document).on('click', '.error_close', function () {
		$('.error').fadeOut();
	});

	$(".planBtn").click(function() {
		price =  $(this).attr('value'); 
		plan_category = $(this).attr('data-pCategory');
		plan_name = $(this).attr('data-pName');
		plan_type = $(this).attr('data-pType');
		paymentForm[0].reset();
		$(".payment").toggle();
		$('body').toggleClass('form-modal-active');
		if(plan_category=='General') {
			$('.general').fadeIn('slow');
			$('.general .plan-form').delay(500).fadeIn('slow');
		} else if(plan_category=='Corporate') {
			gst = (18*price)/100;
			amount = Math.ceil((1*price) + gst);
			$('.corporate').fadeIn('slow');
			$('.corporate .plan-form').delay(500).fadeIn('slow');
			$(".corporate .payment").html(' ( Rs.'+amount+' ) ').css('display','inherit');
		}
	});

	$(document).on('click', '.close', function () {
		$('.plan-form').fadeOut('slow');
    $('.form-modal').delay(300).fadeOut('slow'); 
    $('body').toggleClass('form-modal-active');
    paymentForm.removeClass('was-validated');
  });

  $(document).on('keyup','.nom', function(){
  	var nom = $('.nom').val()
  	amount = nom * price;
  	gst = (18*amount)/100;
  	amount = Math.ceil(amount + gst);
  	if(nom !== '') {
  		$(".payment").html(' ( Rs.'+amount+' ) ').css('display','inherit');
  	}
  	else{
  		$(".payment").html('');
  	}
  });

  $('.membership_form').submit(function(event){
  	var form = $(this);
  	if(form[0].checkValidity() === false){    
      if(form[0][0].checkValidity() === false) {
        feedbackText($('.invalid-r-email'), form[0][0].value, "email id");
        $(form[0][0]).blur(function(){
            feedbackText($('.invalid-r-email'), form[0][0].value, "email id");
        });
      }
      if(form[0][1].checkValidity() === false) {
        feedbackText($('.invalid-r-phone'), form[0][1].value, "phone no.");
        $(form[0][1]).blur(function(){
            feedbackText($('.invalid-r-phone'), form[0][1].value, "phone no.");
        });
      }
      form.addClass('was-validated');
    }
    else{
			$('#preloader').fadeIn();
	    $('.loader').fadeIn('slow');
	    /********************************************************************
	    	Payment Code
			********************************************************************/
			jQuery.ajax({
				type: "POST",
				url: 'payment.php',
				data: {email: form[0][0].value, phone: form[0][1].value, amount: amount},
			
				success: function (obj, textstatus) {
					$('.loader').fadeOut();
					$('#preloader').fadeOut('slow');
						obj = JSON.parse(obj);
						var options = {
							"key": "rzp_live_IhvIUuVzOpQVTn", // Enter the Key ID generated from the Dashboard
							"amount": obj.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
							"currency": "INR",
							"name": "Sports Maidan",
							"description": "Payment for Membership",
							"image": "https://membership.sportsmaidan.com/img/logo_dark.png",
							"order_id": obj.id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
							"handler": function (response){
								if(formtype =='corporateForm'){
									$.ajax({
										type: "POST",
										url: 'payment_done.php',
										data: {payment_id: response.razorpay_payment_id, 
												order_id: response.razorpay_order_id, 
												signature: response.razorpay_signature,
												email: obj.email,
												phone: obj.phone,
												amount: obj.amount,
												plan_name: plan_name,
												plan_type: plan_type,
												plan_category: plan_category,
												company: $('#r_company').val()
											},
	
										  success: function(msg) {
											  if(msg.includes("done")){
												  window.location.href="payment-successful.html";
												// Payment Done
											  }else{
												// Payment Failed
											  }
										  },
										  error: function(){
											//console.log("error");
										}
									  });
								}else{
									$.ajax({
										type: "POST",
										url: 'payment_done.php',
										data: {payment_id: response.razorpay_payment_id, 
												order_id: response.razorpay_order_id, 
												signature: response.razorpay_signature,
												email: obj.email,
												phone: obj.phone,
												amount: obj.amount,
												plan_name: plan_name,
												plan_type: plan_type,
												plan_category: plan_category,
												nom: $('.nom').val()
											},
	
										  success: function(msg) {
											  if(msg.includes("done")){
												  window.location.href="payment-successful.html";
												// Payment Done
											  }else{
												// Payment Failed
											  }
										  },
										  error: function(){
											//console.log("error");
										}
									  });

								}
							},
							"prefill": {
								"name": "",
								"email": "",
								"contact": ""
							},
							"notes": {
								"address": "Razorpay Corporate Office"
							   },
							"theme": {
								"color": "#000000"
							}
					};
					var rzp1 = new Razorpay(options);
					rzp1.open();
				},
						
				error: function () {
					//console.log("errorrrr");
					},
				complete: function () {
				// Handle the complete event
					// alert("ajax completed " + cartObject.productID);
				}
			});
    }
  	event.preventDefault();
  });

  function feedbackText (element, value, text) {
    if(value == '') {
      element.html('Please enter your '+text);
    }
    else {
      element.html('Please enter a valid '+text); 
    }
  }

});




