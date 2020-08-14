<?php

include("db.php");

if(isset($_POST['add_categorie']))
{
	$cat_name=$_POST['cat_name'];
	if(empty($cat_name)){
		header('location:../categories.php?error= Catagory name required');
	}
	else
	{
		$query = "INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES (NULL, '$cat_name')";

		$run=mysqli_query($con,$query);

		if($run)
		{
			header('location: ../categories.php?success=categorie Added Successfully');		
		}
		else
		{
			header('location: ../categories.php?error=categorie Already Exist');
		}
	}
}


?>

<?php

if(isset($_POST['up_categorie']))
{
	$upcat=$_GET['upcatagory'];
	$upcat_name=$_POST['upcat_name'];
	if(empty($upcat_name)){
		header('location:../categories.php?uperror= Catagory name required');
	}
	else
	{
		$query = "UPDATE `categories` SET `cat_name` = '$upcat_name' WHERE `categories`.`cat_id` = $upcat";

		$run=mysqli_query($con,$query);

		if($run)
		{
			header('location: ../categories.php?upsuccess=categorie Added Successfully');		
		}
		else
		{
			header('location: ../categories.php?uperror=categorie Already Exist');
		}
	}
}


?>


