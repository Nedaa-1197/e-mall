<?php

	include("../includes/connection.php");
	// To delete image from folder
	$query_folder = "SELECT * FROM category WHERE cat_id={$_GET['cat_id']}";
	$result       = mysqli_query($conn,$query_folder);
	$row          = mysqli_fetch_assoc($result);
	unlink("upload/{$row['cat_image']}");
	//to DELETE from database
	$query        = "DELETE FROM category WHERE cat_id={$_GET['cat_id']}";
	mysqli_query($conn,$query);
	//when it deleted go to the manage page
	header("location:manage_category.php");