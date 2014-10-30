<?php
include 'core.php';
	include 'config.php';
	
	
if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged']))) && ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))  
				){ 
				/* Connect to database */
					$user_id = $_SESSION['id'] ;
					
						header("Location: adddrugs.php");
					

			
		


/* Disconnect from database */
$draco5->dbclose();
}else{
	include 'config.php';
	header("Location: $errpage");

}
 ?>