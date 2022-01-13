
<style>
    
   .footerlogo{    width: 71%;} 
   @media(max-width:500px){
        .footerlogo{width:100%;} 
   }
</style>
<div class="footer">
	<div class="footer-middle">
				<div class="container">
					<div class="col-md-3 footer-middle-in">
                                            <a href="index.php"><img src="images/indiamartlogo.jpg" class="footerlogo" alt=""></a>
						<!--<p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>-->
					</div>
					
					<div class="col-md-3 footer-middle-in">
						<h6>Information</h6>
						<ul class=" in">
							<li><a href="#">About</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="#">Returns</a></li>
							<!--<li><a href="contact.html">Site Map</a></li>-->
						</ul>
						<ul class="in in1">
						   <?php if(isset($_SESSION['ID'])) { ?>
							<!--<li><a href="my-orders.php">Order History</a></li>-->
							<li><a href="wishlist.php">Wish List</a></li>
							<li><a href="my-profile.php">My Profile</a></li>
							<?php }else{ ?>
							<!--<li><a href="login.php">Order History</a></li>-->
							<li><a href="login.php">Wish List</a></li>
							<li><a href="login.php">Login</a></li>
							<?php } ?>
							
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-3 footer-middle-in">
						<h6>Contact Us</h6>
                                                <p>Buy Mart Trade India New Mondha Market, Cidco Nanded-431603, Maharashtra</p>
					</div>
					<div class="col-md-3 footer-middle-in">
						<h6>Newsletter</h6>
						<span>Sign up for News Letter</span>
							<form method="post">
								<input type="email" placeholder="Enter your E-mail" id="emailsubscriptionalerts" required>
									<label id="emailsubscriptionalertsr" style="color:red;"></label>
								<input type="button"  onclick="return userssubscription();" value="Subscribe">	
							</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<ul class="footer-bottom-top">
						<li><a href="#"><img src="images/f1.png" class="img-responsive" alt=""></a></li>
						<li><a href="#"><img src="images/f2.png" class="img-responsive" alt=""></a></li>
						<li><a href="#"><img src="images/f3.png" class="img-responsive" alt=""></a></li>
					</ul>
					<p class="footer-class">&copy; 2019 BUY MART TRADE INDIA. All Rights Reserved | Developed by  <a href="http://www.vjmsoftech.in" target="_blank">VJMSOFTECH</a> </p>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!--//footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- slide -->
<script src="js/bootstrap.min.js"></script>
<!--light-box-files -->
		<script src="js/jquery.chocolat.js"></script>
		<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
		<!--light-box-files -->
		<script type="text/javascript" charset="utf-8">
		$(function() {
			$('a.picture').Chocolat();
		});
		</script>
		
		<script src="js/imagezoom.js"></script>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
<div class="alert alert-success successmessages12" id="addcartsuccess" style="display:none;"></div>
<div class="alert alert-danger successmessages" id="addcartalreadyadded" style="display:none;"></div>
<div class="alert alert-danger successmessages" id="productoutoffstock" style="display:none;"></div>
<script>

function userssubscription(){
        var email=$("#emailsubscriptionalerts").val();
			var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
		    if(email==''){
		      $("#emailsubscriptionalertsr").html("Please enter email address");
			  $('#emailsubscriptionalerts').css('border-color', 'red');
			  $("#emailsubscriptionalerts" ).focus();
		      return false;
		     }
			var email_id = email.toLowerCase();
			if (emailpattern.test(email_id) == false){
			$("#emailsubscriptionalertsr").html("Please Enter Valid Email Address");
			 $('#emailsubscriptionalerts').css('border-color', 'red');
			 $("#emailsubscriptionalerts" ).focus();	   
			return false;
			}
				$.ajax({
				url: "post.php?action=EmailsSubscriptions",
				type: 'POST',
				data: {email:email},
				success: function(data) {
				if(data==1){
				$("#addcartsuccess").show();
				$("#addcartsuccess").html('Newsletter subscribe successfully....');  
				$(document).ready(function(){ setTimeout(function(){ $("#addcartsuccess").fadeOut('slow'); }, 5000); });
				$("#emailsubscriptionalerts").val(" ");
				return false;
				}else{
				$("#addcartalreadyadded").show();
				$("#addcartalreadyadded").html(email+'&nbsp;This Email ID Already Subscribe');  
				$(document).ready(function(){ setTimeout(function(){ $("#addcartalreadyadded").fadeOut('slow'); }, 5000); });
				$("#emailsubscriptionalerts").val(" ");
				return false;
				}
			}
		});
	}

		function addproductincart(id){
				$.ajax({
				url: "post.php?action=add_to_cart",
				type: 'POST',
				data: {id:id},
				success: function(data) {
				if(data==5){
				$("#addcartalreadyadded").show();
				$("#addcartalreadyadded").html('Your cart add at time only 20 product');  
				$(document).ready(function(){ setTimeout(function(){ $("#addcartalreadyadded").fadeOut('slow'); }, 5000); });
				return false;
				}else if(data==1){
				$("#addcartalreadyadded").show();
				$("#addcartalreadyadded").html('This Item Already Added On Your Cart');  
				$(document).ready(function(){ setTimeout(function(){ $("#addcartalreadyadded").fadeOut('slow'); }, 5000); });
				return false;
				}else if(data==2){
			   $.ajax({
				url: "post.php?action=view_itmes_counts",
				type: 'POST',
				data: {},
				success: function(data) {
				$("#cartitmes").fadeOut().html(data).fadeIn('slow');
				}
				});
				$("#addcartsuccess").show();
				$("#addcartsuccess").html('Item Added Successfully On Your Cart');  
				$(document).ready(function(){ setTimeout(function(){ $("#addcartsuccess").fadeOut('slow'); }, 5000); });
				return false;
				}else{
				$("#productoutoffstock").show();
				$("#productoutoffstock").html('This Items Out Off Stock');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock").fadeOut('slow'); }, 5000); }); 
				return false;
				}
			}
		});
	}
	
	
	/*function addtotdetailscartoncart(id){
	             var qty=$(".value").text();
				// alert(qty);
				 //return false;
				$.ajax({
				url: "post.php?action=add_to_cart",
				type: 'POST',
				data: {id:id},
				success: function(data) {
				if(data==5){
				$("#addcartalreadyadded").show();
				$("#addcartalreadyadded").html('Your cart add at time only 20 product');  
				$(document).ready(function(){ setTimeout(function(){ $("#addcartalreadyadded").fadeOut('slow'); }, 5000); });
				return false;
				}else if(data==1){
				$("#addcartalreadyadded").show();
				$("#addcartalreadyadded").html('This Item Already Added On Your Cart');  
				$(document).ready(function(){ setTimeout(function(){ $("#addcartalreadyadded").fadeOut('slow'); }, 5000); });
				return false;
				}else if(data==2){
			   $.ajax({
				url: "post.php?action=view_itmes_counts",
				type: 'POST',
				data: {},
				success: function(data) {
				$("#cartitmes").fadeOut().html(data).fadeIn('slow');
				}
				});
				$("#addcartsuccess").show();
				$("#addcartsuccess").html('Item Added Successfully On Your Cart');  
				$(document).ready(function(){ setTimeout(function(){ $("#addcartsuccess").fadeOut('slow'); }, 5000); });
				return false;
				}else{
				$("#productoutoffstock").show();
				$("#productoutoffstock").html('This Items Out Off Stock');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock").fadeOut('slow'); }, 5000); }); 
				return false;
				}
			}
		});
	}*/
	
	
	
	function wislistaddedproducts(id){
	            $("#loading").show(); 
				$.ajax({
				url: "post.php?action=add_product_your_wish_list",
				type: 'POST',
				data: {pid:id},
				success: function(data) {
				if(data==0){
				$("#loading").hide(); 
				$("#addcartalreadyadded").show();
				$("#addcartalreadyadded").html('Your wishlist limit exceeded');  
				$(document).ready(function(){ setTimeout(function(){ $("#addcartalreadyadded").fadeOut('slow'); }, 5000); });
				return false;
				}else if(data==1){
				$("#loading").hide(); 
				$("#addcartsuccess").show();
				$("#addcartsuccess").html('This item added your wishlist successfully..');  
				$(document).ready(function(){ setTimeout(function(){ $("#addcartsuccess").fadeOut('slow'); }, 5000); });
				return false;
				}else{
				$("#loading").hide(); 
				$("#addcartalreadyadded").show();
				$("#addcartalreadyadded").html('This item already added on your Wishlist');  
				$(document).ready(function(){ setTimeout(function(){ $("#addcartalreadyadded").fadeOut('slow'); }, 5000); });
				return false;
			}
		 }
		});
	}
	</script>

<!-- slide -->



</body>
</html>