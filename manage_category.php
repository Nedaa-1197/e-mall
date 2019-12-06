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

	
	$query = "insert into category(cat_name,cat_image) values('$cat_name','$cat_image')";
	//perform query
	mysqli_query($conn,$query);
    //stop inserting data in the database when refreshing the page
    header("location:manage_category.php");
    exit;

}


include('../includes/admin_header.php'); 
?>
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
                                                <label for="cc-payment" class="control-label mb-1">Ctegory Name</label>
                                                <input id="cc-pament" name="cat_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                             <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Ctegory Image</label>
                                                <input id="cc-pament" name="cat_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                            </div> 
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="payment-button-amount">Save</span>
                                                    
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
                                                <th>Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           //to Read from database
                                            $query     = "SELECT * FROM category";
                                            $result    = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$row['cat_id']}</td>";
                                                echo "<td>{$row['cat_name']}</td>";
                                                echo "<td><img src='upload/{$row['cat_image']}'/></td>";
                                                echo "<td><a href='edit_cat.php?cat_id={$row['cat_id']}' class='btn btn-warning'>Edit</a></td>";
                                                echo "<td><a href='delete_cat.php?cat_id={$row['cat_id']}' class='btn btn-danger'>Delete</a></td>";
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