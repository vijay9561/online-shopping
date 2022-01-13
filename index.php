
<!--banner-->
<?php include("header.php"); ?>
<style>
.bannersmallimages{
 width:30%;
 height:230px;
}
@media(max-width:500px){
.bannersmallimages{
 width:35%;
 height:100px;
}
}
.carousel {
    position: relative;
    margin-top:100px;
}
</style>
<script>
$('#carouselExampleIndicators').carousel({
        interval: 4000
    })


</script>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/sliderimage.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="images/sliderimage.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="images/sliderimage.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
	<!--content-->
		<div class="content">
			<div class="container">
				<!--products-->
			<div class="content-mid">
				<h3>Latest Product</h3>
				 <?php $query=mysql_query("select *from product_details order by pid desc limit 0,12");  //echo "select *from product_details order by pid desc limit 0,8"; ?>
				<label class="line"></label>
				<div class="mid-popular row">
				<?php if(mysql_num_rows($query)>=1){ while($rows=mysql_fetch_array($query)) {   $productimages=mysql_query("select *from product_images where pid=".$rows['pid']." order by piid asc");
				 $images=mysql_fetch_array($productimages);
				?>
					<div class="col-md-3 item-grid simpleCart_shelfItem" style="margin-bottom:30px;">
					<div class=" mid-pop">
					<div class="pro-img">
						<img src="admin/images/product/<?php echo $images['product_path']; ?>" class="img-responsive product-home-images" alt="">
						<div class="zoom-icon ">
				<!--<a href="admin/images/product/<?php echo $images['product_path']; ?>" rel="title" class="b-link-stripe b-animate-go  thickbox picture"><i class="glyphicon glyphicon-search icon "></i></a>-->
						<a href="product-details.php?details=<?php echo $rows['pid']; ?>"><i class="glyphicon glyphicon-eye-open icon"></i></a>
						<?php if(isset($_SESSION['ID'])) { ?>
						<a  style="cursor:pointer;"  onClick="return wislistaddedproducts(<?php echo $rows['pid'] ?>)" class=""><span class="glyphicon glyphicon-heart icon" aria-hidden="true"></span></a>
						<?PHP }else{ ?>
						<a href="login.php" class=""><span class="glyphicon glyphicon-heart icon" aria-hidden="true"></span></a>
						<?php } ?><br />
						<p style="background-color:#FF0000; color:#FFFFFF">
						
						</p>
						</div>
						</div>
						<div class="mid-1">
						<div class="women">
						<div class="women-top">
						<?php $maincategory=mysql_query("select *from category where cid='".$rows['category_id']."'"); $cat=mysql_fetch_array($maincategory);?>
							<span><?php echo $cat['category_name']; ?></span>
							<?php  $title = (strlen($rows['title'])>15) ? substr($rows['title'],0,12).'...' : $rows['title']; ?>
							<h6><a href="product-details.php?details=<?php echo $rows['pid']; ?>"><?php echo $title; ?></a></h6>
							</div>
							<div class="img item_add">
							<?php if(isset($_SESSION['ID'])) { ?>
								<!--<a style="cursor:pointer; " onClick="return addproductincart(<?php echo $rows['pid']; ?>)" title="Add Cart"><img src="images/ca.png" alt=""></a>-->
								<?php if($rows['product_quantity']<=10){ ?>
								<span>Left <?php echo $rows['product_quantity']; ?></span>
								<?php } ?>
								<?php }else{ ?>
								
								<!--<a href="login.php" title="Add Cart"><img src="images/ca.png" alt="" ></a>-->
								<?php if($rows['product_quantity']<=10){ ?>
								<!--<span>Left <?php echo $rows['product_quantity']; ?></span>-->
								<?php } ?>
								<?php } ?>
							</div>
							<div class="clearfix"></div>
							</div>
							<div class="mid-2">
								<p ><label>Rs.<?php echo $rows['price']; ?> INR</label><em class="item_price">Rs <?php echo $rows['discount_price']; ?> INR</em>
								<br />
								<input type="checkbox" name="cbox"  onClick="mycheckedboxmy(<?php echo $rows['pid']; ?>)"  id="checkid<?php echo $rows['pid']; ?>" title="Compare Item" /> Compare Item
								
								</p>
								  <!-- <div class="block">
									<div class="starbox small ghosting"> </div>
								</div> -->
								
								<div class="clearfix"></div>
							</div>
							
						</div>
					</div>
					</div>
					<?php } } ?>
				
				</div>
			</div>
			<!--//products-->
			<!--brand-->
	
			<!--<div class="brand row">
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
			</div>-->
			<!--//brand-->
			</div>
			
		</div>
	<!--//content-->
	<!--//footer-->
	<style>
	
	</style>
	
	<?php include("footer.php"); ?>
	
	<script>
		
	</script>
