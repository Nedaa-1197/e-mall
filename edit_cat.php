<?php 
include('../includes/connection.php');
//the action will start if user press on button
if(isset($_POST['submit'])){
	$cat_name   = $_POST['cat_name'];
    //Get data from files
    $cat_image  = $_FILES['cat_image']['name'];
    $tmp_name   = $_FILES['cat_image']['tmp_name']; 
    $path       = "upload/";
    move_uploaded_file($tmp_name, $path.$cat_image);
	//udate data
    if ($_FILES['cat_image']['error']==0) {
        $query = "UPDATE category SET cat_name = '$cat_Name',cat_image='$cat_image' WHERE cat_id = {$_GET['cat_id']}";
    }else{
        $query="UPDATE category SET cat_name ='$cat_name' WHERE cat_id{$_GET['cat_id']}";
    }
	
	//perform query
	mysqli_query($conn,$query);
    header("location:manage_category.php");
    
} 
    
    //fetch old data form database
    $query  = "select * from category where cat_id={$_GET['cat_id']}";
    $result = mysqli_query($conn,$query);
    $row    = mysqli_fetch_assoc($result);

include('../includes/admin_header.php'); ?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Credit Category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Category</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input id="cc-pament" name="cat_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['cat_name'] ?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Ctegory Image</label>
                                                <input id="cc-pament" name="cat_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                            </div> 
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="payment-button-amount">Update Category</span>
                                                    
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