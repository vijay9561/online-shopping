<?php  include("header.php"); ?>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Login</h1>
		<em></em>
		<h2><a href="index.html">Home</a><label>/</label>Login</a></h2>
	</div>
</div>
<!--login-->
<div class="container">

		<div class="login">
		
			<form method="post" enctype="multipart/form-data" action="post.php?action=Loginusers">
			<div class="col-md-6 login-do">
			<?php if(isset($_SESSION['SUCESS'])){ ?><div class="alert alert-success"><?php echo $_SESSION['SUCESS']; ?></div><?php unset($_SESSION['SUCESS']); } ?>
			<?PHP if(isset($_SESSION['ERROR'])) { ?><div class="alert alert-danger"><?php echo $_SESSION['ERROR']; ?></div><?php unset($_SESSION['ERROR']); } ?>
			<?php if(isset($_GET['details'])){ ?>
			<input type="hidden" id="pid" name="pid" value="<?php echo $_GET['details']; ?>">
			<?php }else{ ?>
			<input type="hidden" id="pid" name="pid" value="">
			<?php } ?>
				<div class="login-mail">
					<input type="email" placeholder="Email" name="email" required="">
					<i  class="glyphicon glyphicon-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" name="Password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				   <a class="news-letter " href="#" data-toggle="modal" data-target="#ForgotPassword">
						Forget Password
					   </a>
				<label class="hvr-skew-backward">
					<input type="submit" value="login">
				</label>
			</div>
			<div class="col-md-6 login-right">
				 <h3>Completely Free Account</h3>
				 
                                 <p><strong>BUY MART Trade India</strong> offers everything from food to clothes to diapers, and provides a very large variety of merchandise. <strong>BUY MART Trade India</strong> has a website, where products can be bought or viewed online. <strong>BUY MART Trade India</strong> is the first Korean retailer to advance into India with the aim to become one of top leading global retailers.
                                     .</p>
				<a href="register.php" class=" hvr-skew-backward">Register</a>

			</div>
			
			<div class="clearfix"> </div>
			</form>
		</div>

</div>

<div class="modal fade" id="ForgotPassword"  data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Forgot Password</h4>
      </div>
      <div class="modal-body">
      <form  role="form" method="post" id="feedbackform"  enctype="multipart/form-data"> 
	  <span id="notfoundemailid" style="color:red"></span>
         <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="lastName">Enter Email<span class="star">*</span></label>
                <div class="col-md-9">
                    <input type="email" data-error="Please Enter Valid Email Address" id="email1" name="email1" onChange="emptyemailsvalidation()" placeholder="Your Email ID" class="form-control input-sm"/>
                 <div class="help-block with-errors" style="color:red" id="errormessageforgotpassword"></div>
				</div>
            </div>
        </div>     
        <div class="row">
		<div class="col-md-3"></div>
		
            <div class="col-md-9">
                <input type="button" value="Send" onClick="sendforgotpassword();" class="hvr-skew-backward btn-sm">
            </div>

        </div>
    </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<script>
function emptyemailsvalidation(){ if($('email1').val()==''){}else{ $("#errormessageforgotpassword").html(''); }}
function sendforgotpassword(){
		var email =document.getElementById('email1').value.trim();
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
		//var email=document.getElementById('forgotpasswordemails').value.trim();
		
				if(email==''){
				$("#errormessageforgotpassword").html('Please enter email address');
				 return false;
				    }
					var email1 = email.toLowerCase();
					if (emailpattern.test(email1) == false)
					{
					$("#errormessageforgotpassword").html("Please Enter Valid Email Address");       
					return false;}
		var postTo = 'post.php?action=SendForgotPassword';
		var data = { email:email,};
		jQuery.post(postTo, data,
		function(data) {
			if(data==1){
			window.location='login.php';	
			}if(data==2){ 
			       $('#notfoundemailid').html(email+"This Email ID Not Found The Database");
           }
			
		});
	}
	
</script>
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
			<!--//brand-->
			</div>
			<br /><br />
		</div>
	<!--//content-->
		<!--//footer-->
	<?php include("footer.php"); ?>