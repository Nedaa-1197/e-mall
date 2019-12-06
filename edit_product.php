<?php 
include('../includes/connection.php');
//the action will start if user press on button
if(isset($_POST['submit'])){
	$product_name  = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_desc  = $_POST['product_desc'];
	//udate data
	$query = "UPDATE product SET product_name = '$product_name' , product_price ='$product_price' , product_desc = '$product_desc' WHERE product_id = {$_GET['product_id']}";
	//perform query
	mysqli_query($conn,$query);
    header("location:manage_product.php");
    
} 
    
    //fetch old data form database
    $query  = "select * from product where product_id={$_GET['product_id']}";
    $result = mysqli_query($conn,$query);
    $row    = mysqli_fetch_assoc($result);

include('../includes/admin_header.php'); ?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update Product</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Product</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                                <input id="cc-pament" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['admin_email'] ?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product Price</label>
                                                <input id="cc-name" name="product_price" type="double" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $row['admin_password'] ?>">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                             <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product Description</label>
                                                <input id="cc-name" name="product_desc" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error"  value="<?php echo $row['full_name'] ?>">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                           
                                            
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="payment-button-amount">Update Product</span>
                                                    
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           </div>                           
                                </div>
                                </div>
                                </div>
                                 

<?php include('../includes/admin_footer.php'); ?>