<?php

	session_start();
	$ProductAction = $_GET["ProductAction"];
	
	require 'Connection.php';
	
	
	if($ProductAction == "Add")
	{
		$_ProductName = $_POST["ProductName"];
		$_ProductBrand = $_POST["ProductBrand"];
		$_ProductSize = $_POST["ProductSize"];
		$_ProductCategory = $_POST["ProductCategory"];
		$_ProductPrice = $_POST["ProductPrice"];
		
		$image = addslashes($_FILES['ProductImage']['tmp_name']);
		$name = addslashes($_FILES['ProductImage']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		
		$sql = "INSERT INTO `tbl_products`(`Productname`, `ProductBrand`, `ProductSize`,`ProductPrice`, `ProductCategory`, `ProductImageName`, `ProductImage`)" . 
		"VALUES ('$_ProductName','$_ProductBrand','$_ProductSize','$_ProductPrice','$_ProductCategory','$name','$image')";
		$res = mysqli_query($Conn,$sql);
		if($res)
		{
			echo '<script>window.open("Management_ProductsList.php","_self",null,true);</script>';
		}
		else
		{
			echo '<script>alert("FAILED!")</script>';
		}
	}else if($ProductAction == "Edit")
	{
		$_ProductName = $_POST["ProductName"];
		$_ProductBrand = $_POST["ProductBrand"];
		$_ProductSize = $_POST["ProductSize"];
		$_ProductCategory = $_POST["ProductCategory"];
		$_ProductPrice = $_POST["ProductPrice"];
		
		$image = addslashes($_FILES['ProductImage']['tmp_name']);
		$name = addslashes($_FILES['ProductImage']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		
		$_ProductID = $_GET["ProductID"];
		if(empty($_FILES['ProductImage']['tmp_name'])){
			$sql = "UPDATE `tbl_products` SET `Productname`='$_ProductName',`ProductBrand`='$_ProductBrand',`ProductSize`='$_ProductSize'," .
				   "`ProductPrice`='$_ProductPrice',`ProductCategory`='$_ProductCategory' WHERE `ProductID` =  $_ProductID";
			$res = mysqli_query($Conn,$sql);
			if($res)
			{
				echo '<script>window.alert("Product has been successfully updated!"); window.open("Management_ProductsList.php","_self",null,true)</script>';
			}
		}
		$sql = "UPDATE `tbl_products` SET `Productname`='$_ProductName',`ProductBrand`='$_ProductBrand',`ProductSize`='$_ProductSize'," .
			   "`ProductPrice`='$_ProductPrice',`ProductCategory`='$_ProductCategory'," .
			   "`ProductImageName`='$name',`ProductImage`='$image' WHERE `ProductID` = $_ProductID";
		$res = mysqli_query($Conn,$sql);
		if($res)
		{
			echo '<script>window.alert("Product has been successfully updated!"); window.open("Management_ProductsList.php","_self",null,true)</script>';
		}
	}else if($ProductAction == "Delete")
	{
		$_ProductID = $_GET["ProdID"];

		$sql = "Delete from `tbl_products` where `ProductID` = $_ProductID";
		$res = mysqli_query($Conn,$sql);
		if($res)
		{
			echo '<script>window.alert("Product has been successfully Deleted!"); window.open("Management_ProductsList.php","_self",null,true)</script>';
		}
		else {
            // Error handling
            $error_message = mysqli_error($Conn);
            echo '<script>window.alert("Failed to delete product! Error: '.$error_message.'"); window.open("Management_ProductsList.php","_self",null,true)</script>';
        }
	}

?>













