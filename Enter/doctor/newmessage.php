<!DOCTYPE html >
<html>
<head>

<!--------------------
LOGIN FORM
by: Amit Jakhu
www.amitjakhu.com
--------------------->
<?php
include "library.php";
include "config.php";
 @session_start();
if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged']))) && ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))  
&& ((isset($_SESSION['AccType']))&&(($_SESSION['AccType']) == "doctor") &&(($_SESSION['areaInt']) == 7))
				){

				
 if(@$_POST['submitID'] == 1){

$dobby1 = new DataBase();
	$dobby1->dbconnect();	
	/* sanitize and check info */
	@$userName = $dobby1->escape($_POST['speciality']);
	switch(@$userName){
	case "Optician":
		@$intReference = 4 ;
		break;
	case "Pediatrics":
		@$intReference = 2 ;
		break;
	case "Nurse":
		 @$intReference = 3;
		break;
	case "Dentist":
		@$intReference =  5;
		break;
	
	default :
		 @$intReference = 1 ;  
		break;
		
	}
	$theid = $_SESSION['id'];
	$check = "UPDATE  `doctor` SET  `speciality` =  '$intReference'  WHERE  `id` = $theid";
	$thereturn = $dobby1->update_db($check);
	if(@$thereturn == "SUCCESS"){
	 @$_SESSION['areaInt'] = $intReference;
		header("Location: ../doctor");
	}else{
	  
	}
	}
?>

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form</title>

<!--STYLESHEETS-->
<link href="css2/style.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	
});
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon">
	
	</div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->
	
	
	
	
	
<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

	<!--HEADER-->
	 
    <div class="header">
    <!--TITLE--><h1 align ="center">One More Things !</h1><!--END TITLE-->
    <!--DESCRIPTION--><span><h3>Which kind of Doctor are you ?</h3></span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--Wat u are-->
	<label for="speciality"> </label>
   <select  class="input username" name="speciality" id="speciality">
        <option> Nurse </option>
        <option> Optician </option>
        <option> Dentist </option>
        <option> Pediatrics </option>
        <option selected="selected"> Surgeon </option>
        </select>
	<!--END wat u are-->
	
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
	<input name="submitID" type="hidden" id="submitID" value="1">
	<input name="userType" type="hidden" id="userType" value="admin" >
	
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="Continue" class="button" />
	
	<!--END LOGIN BUTTON-->
	
    <!--REGISTER BUTTON <input type="submit" name="submit" value="Register" class="register" />  <!--END REGISTER BUTTON-->
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->


</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->


</body>
</html>
<?php 
}else{
	/* Disconnect from database */
	
 
	header("Location: $errpage");
	exit();
}
?>
