<?php include('header.php'); 
 mysql_query("delete from image where amid='1'");
		if(isset($_SESSION['JOBPORTALADMIN'])) { 
include_once "function.php";
if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;

	$setLimit = 100;
	$pageLimit = ($page * $setLimit) - $setLimit;
$query='';
//$query="select *from orders_details where status='recived' order by oid desc LIMIT ".$pageLimit." , ".$setLimit;
//$mysqluery=mysql_query($query);
if(isset($_GET['searchkeyowords'])){
$searchid=$_GET['searchkeyowords'];
$query="select *from product_return where  unique_id LIKE '%".$searchid."%' order by prid desc LIMIT ".$pageLimit." , ".$setLimit;
$mysqluery=mysql_query($query);
}else{
$query="select *from product_return  order by oid desc LIMIT ".$pageLimit." , ".$setLimit;
$mysqluery=mysql_query($query);
}

?>
<style>
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		<div id="loading" style="display:none;">
        <img id="loading-image" src="images/show_loader.gif" alt="Loading..." />
              </div>

			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Return Product Details</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Return Product Details</h1>
				<?php if(isset($_SESSION['SUCESSMSG'])){ ?>
				<div class="alert bg-success" role="alert">
			<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg><?php echo $_SESSION['SUCESSMSG']; ?><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
				<?php unset($_SESSION['SUCESSMSG']); } ?>
			</div>
		</div><!--/.row-->
		
		
	<?php if(isset($_GET['vieworders'])) { $mysql=mysql_query("select *from product_return where oid='".$_GET['order_id']."'"); $orders=mysql_fetch_array($mysql); ?>
	<div class="row">
		<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Order ID &nbsp;<a class="btn btn-primary" href="#"><?php echo $orders['unique_id']; ?> </a>&nbsp;&nbsp;<a href="return-orders.php" class="btn btn-danger">Back</a></div>
			<div class="panel-body">
			<div class="table-responsive">
			 <table id="datatable" class="table table-striped table-bordered">
			 <thead><tr>
			<th colspan="2" style="padding-left:20px;">Product Details</th>
			<th style="padding-left:20px;">Quntity</th>			
			<th style="padding-left:20px;">Prices</th>
			<th style="padding-left:20px;">Subtotal</th>
		  </tr>
		   </thead> 
		  <tbody>
		  <?php $orders_itmes=mysql_query("select pid,oid,uid,quantity from order_return_items where oid='".$orders['oid']."'");
		  $alltotal=''; $tot='';$qty='';$price=''; while($items=mysql_fetch_array($orders_itmes)){  
		   $product=mysql_query("select discount_price,title,description from product_details where pid='".$items['pid']."'"); $p=mysql_fetch_array($product);
		   $productimages=mysql_query("select *from product_images where pid=".$items['pid']." order by piid asc");
			 $images=mysql_fetch_array($productimages);
		   ?> 
		   <tr>
		   <td><img src="images/product/<?php echo $images['product_path']; ?>" class="img-responsive" style="width:150px;height:100px;" alt=""></td>
		   <td><?php echo $p['title']; ?><br> Order Date <?php echo $orders['return_date']; ?></td>
		   <td><?php echo $items['quantity']; ?></td>
		   <td>Rs.<?php echo $p['discount_price']; ?></td>
		   <td><?php $qty=$qty+$items['quantity']; echo $items['quantity']*$p['discount_price'];  $price=$price+$p['discount_price'];
		    $tot=$items['quantity']*$p['discount_price'];
		    $alltotal=$tot+$alltotal; ?></td>
		   </tr>
		   <?php } ?>
		   <tr><td></td><td></td><td>Total Qty:&nbsp;<?php echo $qty; ?></td><td>Total Price  Rs. <?php echo  $price; ?></td><td>Total Subprice <?php echo $alltotal; ?></td></tr>
		  </tbody>
		 
			 </table>
			 </div>
			 <?php /*?><div class="row">
			 <div class="col-md-12">
			 <h3>Delivery Address Details <?php $ordersdetails=mysql_query("select name,mobile_no,address,city,state,pincode,uid from address_details where uid='".$orders['uid']."'"); $add=mysql_fetch_array($ordersdetails); ?></h3>
			 <p><strong>To, <?php echo $add['name']; ?></strong> </p>
			 <p><strong>Address:&nbsp; <?php echo $add['address']; ?>&nbsp;&nbsp;,&nbsp;<?php echo $add['city']; ?>&nbsp;&nbsp;,&nbsp;<?php echo $add['state']; ?>&nbsp;-&nbsp;<?php echo $add['pincode']; ?></strong></p>	
			 <p><strong>Mobile Number:&nbsp; <?php echo $add['mobile_no']; ?></strong></p>		 
			 </div>
			 </div><?php */?>
			 <div class="row">
			 <div class="col-md-12">
			 <h3>Product Return Reason</h3>
			 <?php echo $orders['return_reason']; ?>
			 </div>
			 </div>
			</div>
			<div class="panel-footer">
			
			</div></div>
		</div></div>
	<?php }else{ ?>
		<div class="row">
		<div class="col-lg-12">
		<div class="form-group pull-right">
<form method="post">
<input type="text" id="search_id" placeholder="Order ID" value="<?php if(isset($_GET['searchkeyowords'])) { echo $_GET['searchkeyowords']; } ?>" required style="display: initial; width:auto;" title="Type Here" class="form-control">&nbsp;&nbsp;
<input type="submit" class="btn btn-primary" value="Search" onclick="return search_result()" />
</form>
</div>
		<div class="table-responsive">
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Customer Name</th>
                          <th>Mobile Number</th>
						   <th>Price</th>
						  <th>Return Date</th>
                          <th>Confirm Return  Date</th>
                          <th>Action </th>
                       
                        </tr>
                      </thead>

                      <tbody>
					  <?php 
					    $i=1;
						if(mysql_num_rows($mysqluery)>=1){
						while($row=mysql_fetch_array($mysqluery)){
						$currentusers=mysql_query("select name,email,rid,mobile from registration where rid='".$row['uid']."'"); $u=mysql_fetch_array($currentusers);
						$cal='';
						$total='';
						$orders_itmes=mysql_query("select pid,oid,uid,quantity from order_return_items where oid='".$row['oid']."'");
						while($items=mysql_fetch_array($orders_itmes)){
						 $product=mysql_query("select discount_price from product_details where pid='".$items['pid']."'"); $p=mysql_fetch_array($product);
						   $cal=$p['discount_price']*$items['quantity'];
						   $total=$total+$cal;
						}
 					   ?>
                        <tr>
                          <td><?php echo $row['unique_id']; ?></td>
						  <td><?php echo $u['name']; ?></td>
						   <td><?php echo $u['mobile']; ?></td> 
                           <td><?php echo $total; ?></td>
                          <td><?php echo $row['return_date']; ?></td>
						   <td>
						 <?php if($row['retrun_confrim_date']=='0000-00-00 00:00:00') { echo '<span style="color:red">Return Product Still Not Confirm</span>'; }else{ echo $row['retrun_confrim_date']; } ?>
						  </td>
                          <td>
						  <!--<a href="recived-orders.php?vieworders=opendata&catid=<?php echo $row['oid']; ?>"  class="btn btn-primary" title="Edit"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;-->
						     <?php if($row['status']=='inactive'){ ?>
						   <a  style="cursor:pointer;" class="btn btn-danger" title="Return Payment" onclick="return paymentreturns(<?php echo $row['oid']; ?>)">Return Payment</a>
						   <?php }else{ ?>
						     <a style="cursor:move;" class="btn btn-success" title="Return Payment">Return Payment Success</a>
						   <?php } ?>
						    <?php if(isset($_GET['searchkeyowords'])) { ?>
						  <a href="return-orders.php?vieworders=opendata&catid=<?php echo $row['order_id']; ?>&searchkeyowords=<?php echo $_GET['searchkeyowords']; ?>"  class="btn btn-primary" title="Edit"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;
						  <?php }else{ ?>
						    <a href="return-orders.php?vieworders=opendata&catid=<?php echo $row['order_id']; ?>"  class="btn btn-primary" title="Edit"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;
						  <?php } ?>
						</td>
                        </tr>
						<?php } }else{ ?>
						<tr><td colspan="7"><div class="alert alert-danger">No Any One Orders Return</div></td></tr>
						<?php } ?>
					
                      </tbody>
                    </table>
		</div>
		<div class="row">
				<div class="col-md-12">
				<?php if(isset($_GET['searchkeyowords'])) { echo returnorderssearchusers($setLimit,$page,$_GET['searchkeyowords']); }else { echo returnordersusers($setLimit,$page); } ?>
		</div>
			</div>
		</div>
		</div>
		<?php } ?>
		<br><br>
	</div>
	<?php include('footer.php'); ?>
	<script>
	function paymentreturns(id){
	var con=confirm('are you sure to return for the this orders payment!');
	if(con==true){
	$.ajax({
	url: "post.php?action=returnspaymentprocess",
	type: 'POST',
	data: {id:id},
	success: function(data) {
	if(data==1){
	location.reload();
	}else{ alert("Not Deleted")}
	}
	});
	}else{
	}
	}
	
	function search_result(){
var search_id=$("#search_id").val();
var search_id2=search_id.trim();
if(search_id==""){
 alert("Please enter keywords");
 return false;
}
window.location='return-orders.php?searchkeyowords='+search_id2;
return false;
}
	
		$(document).ready(function(){
		$('.pull-right').click(function(){
		$('.bg-success').hide();
		});
		});
</script>
	
<?php }else{  
   header('Location:login.php');
?>
<?php } ?>


