<?php include("header.php"); 
$cities=mysql_query("select *from cities group by city_state");
$cities1=mysql_query("select *from cities order by city_name asc");
?>
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
function vendor_store_namer(){if($('#vendor_store_name').val()==''){ $("#vendor_store_namer").css('color','red');  }else{ $('#vendor_store_namer').html(' ');}}
 
function passwordr(){if($('#password').val()==''){}else{ $('#passwordr').html(' '); }}
function city_namer(){ if($("#city_name").val()==""){ }else{ $("#city_namer").html(" "); } }
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
 function state_namer(){ if($("#state_name").val()==""){ }else{ 
           var state_name=$("#state_name").val();
           
            $.ajax({   
		url: "post.php?action=getstatecityname",
		type: "POST",
		data: {state_name:state_name},
		success: function(data){
		if(data){
              //  $("#getdata").html(data);
                $("#getdata").fadeOut().html(data).fadeIn('slow');
		}
		}
		});
            $("#state_namer").html(" ") } } 
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
                var vendor_store_name=document.getElementById('vendor_store_name').value.trim();
                var state_name=document.getElementById('state_name').value.trim();
                var city_name=document.getElementById('city_name').value.trim();
		
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
                        if(vendor_store_name==''){
			$("#vendor_store_namer").html('Please enter store or agency name');
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
                        if(state_name==''){
			$("#state_namer").html('Please select state');
			return false;
			}
                        if(city_name==''){
			$("#city_namer").html('Please select city name');
			return false;
			}
				
	}
        function submit_otp(){
            var chequeno=/^\d{6,6}$/;
           var otp=$("#otp").val();
           var id_numbers=$("#id_numbers").val();
           if(otp==""){
            $("#otpr").html("Please enter OTP");
            return false;
           }
        if (!(otp.match(chequeno))) {
                    $("#otpr").html("Please enter valid 6 digit OTP");	
                    return false;
                    }
            $("#otpr").html(" ");
               $.ajax({   
		url: "post.php?action=OTPverfication",
		type: "POST",
		data: {otp:otp,id_numbers:id_numbers},
		success: function(data){
                  if(data==1){
                    window.location='login.php'; 
                    }else{
                    $("#otpr").html("Your entered otp invalid");
                    return false;
                    }  
		}
	   });       
        }
	
	

</script>
<div class="banner-top">
	<div class="container">
		<h1>Vendor Registration</h1>
		<em></em>
		<h2><a href="index.php">Home</a><label>/</label>Vendor Registration</h2>
	</div>
</div>
<!--login--> 
<div class="container">
		<div class="login row">
                  
                    <div class="col-md-3"></div>
			
                           
			<div class="col-md-6 login-do">
                            <?php if(isset($_SESSION['SUCESS'])){ ?><div class="alert alert-success"><?php echo $_SESSION['SUCESS']; ?></div><?php unset($_SESSION['SUCESS']); } ?>
                          <?php if(isset($_GET['verify_mobile'])){ ?>
                         <div class="panel panel-default">
                           <div class="panel-heading"><h2 class="panel-title">One Time Password</h2></div>
                             <div class="panel-body">
                                 <div class="form-group">
                                     <label>Enter OTP</label>   
                                     <input type="password" class="form-control" name="otp" placeholder="Enter OTP" id="otp">
                                     <input type="hidden" name="id_numbers" id="id_numbers" value="<?php echo $_GET['verify_mobile']; ?>">
                                     <span id="otpr" style="color:red;"></span>
                                 </div> 
                                 <div class="form-group">
                                     <input type="button" onclick="return submit_otp()" class="btn btn-primary" value="Submit OTP">   
                                 </div>
                             </div>   
                           </div>
                        <?php }else{ ?>
                           <form method="post" action="post.php?action=Vendor_Registrations">
                            <div class="panel panel-default">
                             <div class="panel-heading"><h2 class="panel-title">Vendor Registration</h2></div>
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
					<input type="text" placeholder="Store Name / Agency Name"  name="vendor_store_name" id="vendor_store_name" onChange="vendor_store_namer()">
					<i  class="fa fa-building"></i>
			
				</div>
                            <span id="vendor_store_namer" style="color:red;"></span>

					
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
                                        <div class="form-group">
                                            <br>
                                            <select type="text" placeholder="Password" class="form-control"  id="state_name" name="state_name" onChange="state_namer();">
                                            <option value="">Select State</option> 
                                            <?php while($row=mysql_fetch_array($cities)){ ?>
                                             <option value="<?php echo $row['city_state']; ?>"><?php echo $row['city_state']; ?></option> 
                                            <?php } ?>
                                        </select>
					
				</div>
					                                        
			  <span id="state_namer" style="color:red;"></span>
                          
                           <div class="form-group" id="getdata">
                                           
                                            <select type="text" placeholder="Password" class="form-control"  id="city_name" name="city_name" onChange="city_namer();">
                                            <option value="">Select City</option> 
                                            <?php while($row=mysql_fetch_array($cities1)){ ?>
                                             <option value="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option> 
                                            <?php } ?>
                                        </select>
					
				</div>
                          <span id="city_namer" style="color:red;"></span>
				  <!-- <a class="news-letter " href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>Remember Password</label>
					   </a>-->
                                   <br>
                                   
                                   
                                   
				<label class="hvr-skew-backward">
                                   
					<input type="submit" value="Submit" onClick="return regiterusers()">
				</label>
			
			</div>
                             </div>
                           </form>
                          <?php } ?>
                        </div>
			<!--<div class="col-md-6 login-right">
				 <h3>Completely Free Account</h3>
				 
				 <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio 
				 libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
				<a href="login.php" class="hvr-skew-backward">Login</a>

			</div>-->
			
			<div class="clearfix"> </div>
			
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