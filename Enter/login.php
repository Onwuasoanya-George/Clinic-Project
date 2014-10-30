<?php

/* Start session */
 @session_start();

/* Config file */

include('config.php');

/* Check for submition */
if(@$_POST['submitID'] == 1){
	
	/* Connect to database */
	require_once("library.php");
	$dobby1 = new DataBase();
	$dobby1->dbconnect();	
	/* sanitize and check info */
	
	if(@$_POST['userType'] == "1"){
	@$userName = $dobby1->escape($_POST['userNamed']);
	@$password = $dobby1->escape($_POST['passwordd']);
	 $tableName  = "doctor";
	  $type  = "doctor";
	 
	}else if(@$_POST['userType'] == "admin"){
	@$userName = $dobby1->escape($_POST['username']);
	@$password = $dobby1->escape($_POST['password']);
	 $tableName ="superadmain";
	  $type  = "admin";
	}else{
	$userNameField = 'userName';
	$userPasswordField = 'password';
	@$userName = $dobby1->escape($_POST['userName']);
	@$password = $dobby1->escape($_POST['password']);
	 $type  = "user";
	 
	 $tableName ="users";
	}
	
	
	if(@$userName == NULL) { $message = 'Please enter username.';}
	if(@$message == NULL && $password == NULL){ $message = 'Please enter password.';}
	
	if(@$message == NULL)
	{				
		$query = "SELECT * FROM " . $tableName .
		" WHERE `" . $userNameField . "`='$userName' AND `" . $userPasswordField . "`='$password'";
		$query_run = $dobby1->select_from_db($query);
		$query_rows = $query_run[0];
		$quey_data = $query_run[1];
		
		
		/* If usercount is more than 0 -> ok */
		if($query_rows == 1){
			/* Disconnect from database */
			//if($connectDatabase == TRUE){$action=FALSE;include('connect.php');}
			$idquery = "Select id from ".$tableName .
			" WHERE `" . $userNameField . "`='$userName' AND `" . $userPasswordField . "`='$password'";
			$query_run2 = $dobby1->select_from_db($idquery);
			foreach ($quey_data as $query_ru){
			 $user_fname = ($query_ru["fname"] );
			$user_lname = ($query_ru["lname"] );
			$user_name = ($query_ru["userName"] );
			}
	       
			$get_id = $query_run2[1];
			foreach ($get_id as $didi){
			$user_id =  $didi['id'];}
			
			if($tableName == "doctor"){
			$idquery2 = "Select speciality from ".$tableName .
			" WHERE `id`  = $user_id  ";
			$query_run3 = $dobby1->select_from_db($idquery2);
				$get_id2 = $query_run3[1];
					foreach ($get_id2 as $didi2){
					$doc_area =  $didi2['speciality'];}
					if($doc_area == 7){
					$loginPagedoc = "doctor/newmessage.php";
					}
		}
			
			echo @$_SESSION['isLoged'] = 'yes';
			echo @$_SESSION['userfname'] = $user_fname;
			echo @$_SESSION['userlname'] = $user_lname;
			echo @$_SESSION['Uname'] = $user_name;
			echo @$_SESSION['AccType'] = $type;
			echo @$_SESSION['id'] = $user_id;
			echo @$_SESSION['areaInt'] = $doc_area;
			/* add cookies ?
			if($useCookies == TRUE)
			{
				setcookie("isLoged", 'yes', time()+logedInFor, "/", ".$domainName", 1);
				setcookie("userName", $userName, time()+logedInFor, "/", ".$domainName", 1);
			}
			expire in 1 hour */
			$dobby1->dbclose();
			/* Redirect to login page */
			if(@$_POST['userType'] == "1"){
			header("Location: $loginPagedoc");
			}else if(@$_POST['userType'] == "admin"){
			header("Location: $loginPageadmin");
			}else{
			header("Location: $loginPageuser");
			}
			exit();
		} else {
					if(@$_POST['userType'] == "1"){
						$message = 'Invalid Doctor username and/or password!';
				}else if(@$_POST['userType'] == "admin"){
				$message = 'Invalid Admin username and/or password!';
				}else{
				$message = 'Invalid User username and/or password!';
				}
			
		}
		
		
	}

}
?>