			<!--categories-->
				<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part1 = $components[2];

?>
<style type="text/css">
	.activeclass{}
	</style>    
				<!--initiate accordion-->
						<script type="text/javascript">
							$(function() {
							    var menu_ul = $('.menu-drop > li > ul'),
							           menu_a  = $('.menu-drop > li > a');
							    menu_ul.hide();
							    menu_a.click(function(e) {
							        e.preventDefault();
							        if(!$(this).hasClass('active')) {
							            menu_a.removeClass('active');
							            menu_ul.filter(':visible').slideUp('normal');
							            $(this).addClass('active').next().stop(true,true).slideDown('normal');
							        } else {
							            $(this).removeClass('active');
							            $(this).next().stop(true,true).slideUp('normal');
							        }
							    });
							
							});
						</script>
<!--//menu-->
 <section  class="sky-form">
					<h4 class="cate">My Account</h4>
					 <div class="row row1 scroll-pane">
						 <div class="col col-4">
						 <ul class="menu-drop1">
						  <li class=""><a href="my-profile.php" style="<?php if($first_part1=='my-profile.php') { echo 'color:#760075;'; }else{ echo ''; }?>">My Profile</a></li>
						 <li class=""><a style="<?php if($first_part1=='my-orders.php') { echo 'color:#760075;'; }else{ echo ''; }?>" href="my-orders.php">My Order</a></li>
						
						 <li class=""><a style="<?php if($first_part1=='wishlist.php') { echo 'color:#760075;'; }else{ echo ''; }?>" href="wishlist.php">My Wishlist</a></li>
						  <li class=""><a href="my-review.php" style="<?php if($first_part1=='my-review.php') { echo 'color:#760075;'; }else{ echo ''; }?>">My Reviews</a></li>
						  </ul>
						 </div>
					 </div>
				 </section> 				
				 
				 <div class=" rsidebar span_1_of_left">
						<h4 class="cate">Categories</h4>
						<?php $category=mysql_query("select category_name,status,date,cid from category order by cid desc"); ?>
							 <ul class="menu-drop">
							 <?php if(mysql_num_rows($category)>=1){ while($cat=mysql_fetch_array($category)){ 
							 $subcategory=mysql_query("select category_name,scid,mid from sub_category where mid='".$cat['cid']."'"); ?>
							<li class="item1"><a href="#"><?php echo $cat['category_name']; ?> </a>
								<ul class="cute">
								<?php if(mysql_num_rows($subcategory)>=1) { while($sub=mysql_fetch_array($subcategory)) { ?>
									<li class="subitem1"><a href="product.php?subcategory=<?php echo $sub['scid']; ?>"><?php echo $sub['category_name']; ?></a></li>
									<?php } }else{ ?>
									<li class="subitem1"><a href="#"><div class="alert alert-danger">No Found Subcategory</div></a></li>
									<?php } ?>
								</ul>
							</li>
							<?php } } ?>
						</ul>
					</div> 				 
				 
					
					 <!---->