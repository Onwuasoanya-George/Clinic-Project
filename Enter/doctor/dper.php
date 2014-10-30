<?php
include 'core.php';
	include 'config.php';
	
	
if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged']))) && ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))  
				){ 
				/* Connect to database */
					$user_id = $_SESSION['id'] ;
					require_once("library.php");
					$draco5 = new DataBase();
					$draco5->dbconnect();
					$getType = $_POST['fromtype'];
					$getId = $_POST['deltoken'];
					if($getType == "staff"){
						 $eQuery = "UPDATE  `messagesfromstaff` SET  `deleated` =  'true' WHERE  `id` =$getId  LIMIT 1";
						 $e_solution = $draco5->update_db($eQuery);
							if($e_solution=="SUCCESS"){
							header("Location: messages.php");
							exit();
							}else{  die ( 'Error, please contact admin. Thank You. ');}
					}else{
						 $eQuery = "UPDATE  `messagesfromstaff` SET  `deleated` =  'true' WHERE  `id` =$getId  LIMIT 1";
						 $e_solution = $draco5->update_db($eQuery);
							if($e_solution=="SUCCESS"){
							header("Location: messages.php");
							exit();
							}else{  die ( 'Error, please contact admin. Thank You. ');}
					}

			
		


/* Disconnect from database */
$draco5->dbclose();
}else{
	include 'config.php';
	header("Location: $errpage");

}
 ?>