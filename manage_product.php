<?php 
include('../includes/connection.php');
//the action will start if user press on button
if(isset($_POST['submit'])){
	$product_name  = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_desc  = $_POST['product_desc'];
	
	$query = "insert into product(product_name,product_price,product_desc) values('$product_name','$product_price','$product_desc')";
	//perform query
	mysqli_query($conn,$query);
   
    //stop inserting data in the database when refreshing the page
    header("location:manage_product.php");
    exit;

}


include('../includes/admin_header.php'); ?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Credit Product</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Product</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                                <input id="cc-pament" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product Price</label>
                                                <input id="cc-name" name="product_price" type="double" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                             <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product Description</label>
                                                <input id="cc-name" name="product_desc" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                           
                                            
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="payment-button-amount">Add</span>
                                                    
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           </div>
                            
                            



                             <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>cat #</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           //to Read from database
                                            $query     = "SELECT * FROM product";
                                            $result    = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$row['product_id']}</td>";
                                                echo "<td>{$row['product_name']}</td>";
                                                echo "<td>{$row['product_price']}</td>";
                                                echo "<td>{$row['product_desc']}</td>";
                                                echo "<td>{$row['cat_id']}</td>";
                                                echo "<td><a href='edit_product.php?product_id={$row['product_id']}' class='btn btn-warning'>Edit</a></td>";
                                                echo "<td><a href='delete_product.php?product_id={$row['product_id']}' class='btn btn-danger'>Delete</a></td>";
                                                echo "</tr>";
                                            }

                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                </div>
                                </div>
                                 

<?php include('../includes/admin_footer.php'); ?>