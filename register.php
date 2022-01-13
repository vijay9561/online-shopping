<?php include("header.php"); ?>
<!--banner-->
<script>
function namer(){if($('#name').val()==''){}else{ $('#namer').html(' '); }}
function emailr(){if($('#email').val()==''){  }else{ $('#emailr').html(' ');
var email=$("#email").val();
		$.ajax({   
		url: "post.php?action=duplicateemailaddress",
		type: "POST",
		data: {email:email},
		success: function(data){
		if(data==1){
		} else{
		document.getElementById('email').value='';
		$('#emailr').html(email+'&nbsp;This Email ID already Registered')
		}
		}
		});
 }}
function refferal_idr(){if($('#refferal_id').val()==''){ $("#refferal_idr").css('color','red');  }else{ $('#refferal_idr').html(' ');
               var refferal_id=$("#refferal_id").val();
		$.ajax({   
		url: "post.php?action=checking_refferal_id",
		type: "POST",
		data: {refferal_id:refferal_id},
		success: function(data){
		if(data==1){
                  $("#refferal_idr").html('Valid Referral Name');
                  $("#refferal_idr").css('color','green');
		} else if(data==3){
		document.getElementById('refferal_id').value='';
		$('#refferal_idr').html(refferal_id+'&nbsp;This Refferal ID Already 5 users use')
                 $("#refferal_idr").css('color','red');
		}else{
                  document.getElementById('refferal_id').value='';
		 $('#refferal_idr').html(refferal_id+'&nbsp;  This Refferal ID Invalid')
                  $("#refferal_idr").css('color','red');
                 }
		}
		});
 }}
 
 function mobiler(){if($('#mobile').val()==''){}else{ $('#mobiler').html(' ');
          var  mobile=$("#mobile").val();
        $.ajax({   
		url: "post.php?action=mobile_vendors_duplication",
		type: "POST",
		data: {mobile:mobile},
		success: function(data){
		if(data==1){
		} else{
		document.getElementById('mobile').value='';
		$('#mobiler').html(mobile+'&nbsp;This Mobile Number Already Registered')
		}
		}
		});
        }}
 
function passwordr(){if($('#password').val()==''){}else{ $('#passwordr').html(' '); }}
function regiterusers(){
        var namecheck = /[A-Za-z]+$/;      
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
		var mobilenovalidation=/^\d{10}$/;
		var positvenumber=/[0-9 -()+]+$/;
		var chequeno=/^\d{6,14}$/;
	
		var  name=document.getElementById('name').value.trim();
	        var  email=document.getElementById('email').value.trim();
		var  mobile=document.getElementById('mobile').value.trim();
		var  password=document.getElementById('password').value.trim();
               
			if(name==''){
			$("#namer").html('Please enter name');
			return false;
			}
                        if (!(name.match(namecheck))) {
			$("#namer").html("Please enter valid name");	
			return false;
			}
			
			if(mobile==''){
			$("#mobiler").html('Please enter contact number');
			return false;
			}
			if (!(mobile.match(mobilenovalidation))) {
			$("#mobiler").html("Please enter valid contact number");	
			return false;
			}
			if(email==''){
			$("#emailr").html('Please enter email address');
			return false;
			}
			var email = email.toLowerCase();
			if (emailpattern.test(email) == false){
			$("#emailr").html("Please Enter Valid Email Address");					       
			return false;
			}
			if(password==''){
			$("#passwordr").html('Please enter password');
			return false;
			}
				
	}
	
	

</script>
<div class="banner-top">
	<div class="container">
		<h1>Register</h1>
		<em></em>
		<h2><a href="index.php">Home</a><label>/</label>Register</a></h2>
	</div>
</div>
<!--login-->
<div class="container">
		<div class="login">
                    <div class="col-md-3"></div>
			<form method="post" action="post.php?action=userregistration">
			<div class="col-md-6 login-do">
                            <div class="panel panel-default">
                             <div class="panel-heading"><h2 class="panel-title">Registration For Buy Mart Trade India </h2></div>
                             <div class="panel-body">
			<div class="login-mail">
					<input type="text" placeholder="Name"  name="name" id="name" onChange="namer()">
					<i  class="glyphicon glyphicon-user"></i>
			
				</div>
                            <span id="namer" style="color:red;"></span>
                           
									<div class="login-mail">
					<input type="text" placeholder="Mobile Number" id="mobile" name="mobile" onChange="mobiler();">
					<i  class="glyphicon glyphicon-phone"></i>
				
				</div>
                            <span id="mobiler" style="color:red;"></span>
                                       
				<div class="login-mail">
					<input type="text" placeholder="Email"  id="email" name="email" onChange="emailr();">
					<i  class="glyphicon glyphicon-envelope"></i>
				
				</div>
					<span id="emailr" style="color:red;"></span>
				<div class="login-mail">
					<input type="password" placeholder="Password"  id="password" name="password" onChange="passwordr();">
					<i class="glyphicon glyphicon-lock"></i>
				
				</div>
					<span id="passwordr" style="color:red;"></span>
				  <!-- <a class="news-letter " href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>Remember Password</label>
					   </a>-->
                                   <br>
				<label class="hvr-skew-backward">
                                   
					<input type="submit" value="Submit" onClick="return regiterusers()">
				</label>
			
			</div>
                             </div>
			</div>
			
			
			<div class="clearfix"> </div>
			</form>
		</div>
<br /><br />
</div>

<!--//login-->

		<!--brand-->
		<!--<div class="container">
			<div class="brand">
				<div class="col-md-3 brand-grid">
					<img src="images/ic.png" class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src="images/ic1.png" class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src="images/ic2.png" class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src="images/ic3.png" class="img-responsive" alt="">
				</div>
				<div class="clearfix"></div>
			</div>
			</div>-->
			
		<!--//footer-->
	<?php include("footer.php"); ?>