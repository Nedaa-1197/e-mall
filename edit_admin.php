<?php 
include('../includes/connection.php');
//the action will start if user press on button
if(isset($_POST['submit'])){
	$email    = $_POST['admin_email'];
	$passwoed = $_POST['admin_password'];
	$fullname = $_POST['full_name'];
	//udate data
	$query = "UPDATE admin SET admin_email = '$email', admin_password ='$passwoed' , full_name = '$fullname' WHERE admin_id = {$_GET['admin_id']}";
	//perform query
	mysqli_query($conn,$query);
    header("location:manage.php");
    
} 
    
    //fetch old data form database
    $query  = "select * from admin where admin_id={$_GET['admin_id']}";
    $result = mysqli_query($conn,$query);
    $row    = mysqli_fetch_assoc($result);

include('../includes/admin_header.php'); ?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update Admin</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                                <input id="cc-pament" name="admin_email" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['admin_email'] ?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Admin Password</label>
                                                <input id="cc-name" name="admin_password" type="password" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $row['admin_password'] ?>">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                             <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Admin Full Name</label>
                                                <input id="cc-name" name="full_name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error"  value="<?php echo $row['full_name'] ?>">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                           
                                            
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="payment-button-amount">Update Admin</span>
                                                    
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