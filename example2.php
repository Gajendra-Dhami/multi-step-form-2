<!DOCTYPE html>
<html>
<head>
<style>
body{
	font-family:verdana;
	margin:0px;
}
 
.form-wrapper{
	margin:10px;
}
 
.form-wrapper label{
	display:block;
	font-size:14px;
}
 
.form-wrapper input[type=text], .form-wrapper input[type=email]{
	margin-bottom:5px;
	width:180px;
	height:20px;
	border:1px solid #eeeeee;
}
.form-wrapper span{
	color:#ee0000;
}
 
.form-wrapper input[type=submit]{
	display:block;
	margin-top:5px;
	border:0px;
	background:#ee0000;
	color:#ffffff;
	height:30px;
	border-radius:5px;
}
 
.form-wrapper input[type=submit]:hover{
	background:#ee0022;
}
 
.form-wrapper textarea{
	border:1px solid #eeeeee;
}
 
 
.response_msg{
	margin-top:10px;
	font-size:13px;
	background:#E5D669;
	color:#ffffff;
	width:250px;
	padding:3px;
	display:none;
}
 
h2{font-size:20px;}	
</style>
</head>
<body>
<div class="form-wrapper">
<h2>jQuery Form validation example without plugin</h2>
<form name="contact-form" action="" method="post" id="contact-form">
	<label>Name <span>*</span></label>
	<input type="text" name="your_name" id="name">
 
	<label>Email <span>*</span></label>
	<input type="text" name="your_email" id="email">
 
	<label>Phone <span>*</span></label>
	<input type="text" name="your_phone" id="phone">
 
	<label>Comment <span>*</span></label>
	<textarea name="comments" cols="28" rows="5" id="comment"></textarea>
	<input type="submit" name="submit" value="Submit" id="submitForm">
</form>
 
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
function checkNameEmpty(inputID)
{
	$(inputID).blur(function(){
 
		if($(this).val() == '')
		{
			$(this).css('border','1px solid red');
			
		}
		else
		{
			$(this).css('border','1px solid green');
			
		}
	});
}
 
 
//regex to validate email
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
 
 
// validation for email input using validateEmail Function
function checkValidEmail(emailInputID)
{
	$(emailInputID).blur(function(){
		var email = $(emailInputID).val();
		if (validateEmail(email)) 
		{
			$(this).css('border','1px solid green');
			
		} 
		else 
		{
			$(this).css('border','1px solid red');
		}
	});
		
	
}
 
 
// regex to validate phone
function validatePhone(inputtxt) {
	
	//+XX-XXXX-XXXX
	//+XX.XXXX.XXXX
	//+XX XXXX XXXX
			
	var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
	if(inputtxt.match(phoneno)) 
	{
		return true;
	}  
	else 
	{  
		return false;
	}
}
 
 
// validation for phone input using validatePhone Function
function checkvalidPhoneNumber(phoneInputID)
{
	
	$(phoneInputID).blur(function(){
		var phone = $(phoneInputID).val();
		var getPhone = validatePhone(phone);
		if(getPhone)
		{
			$(this).css('border','1px solid green');
		}
		else
		{
			$(this).css('border','1px solid red');
		}
		
	});
}
 
 
function checkComment(commentID)
{
		$(commentID).blur(function(){
 
		if($(this).val() == '')
		{
			$(this).css('border','1px solid red');
			
		}
		else
		{
			$(this).css('border','1px solid green');
			
		}
	});
}
 
 
$(document).ready(function(){
	
	//run time form validation
	checkNameEmpty("#name");
	checkValidEmail("#email");
	checkvalidPhoneNumber("#phone");
	checkComment("#comment");
		
	//when click on submit
	$("#submitForm").click(function(){
		
		
		if($("#name").val() == '')
		{
			$("#name").css('border','1px solid red');
			return false;	
		}
		
	
		if($("#email").val() == '')
		{
			$("#email").css('border','1px solid red');
			return false;
		}
		
		if($("#email").val() != '')
		{
			var email = $("#email").val();
			if (!validateEmail(email)) 
			{
				return false;
			} 
		}
		
		
		if($("#phone").val() == '')
		{
			$("#phone").css('border','1px solid red');
			return false;
		}
		
		
		if($("#phone").val() != '')
		{
			var getPhone = validatePhone($("#phone").val());
			if(!getPhone)
			{
				return false;
			}
		}
		
		
		if($("#comment").val() == '')
		{
			$("#comment").css('border','1px solid red');
			return false;	
		}
		
				
	});
	
});
 
</script>
</body>
</html>