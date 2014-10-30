<!DOCTYPE html >
<html>
<head>

<!--------------------
LOGIN FORM
by: Amit Jakhu
www.amitjakhu.com
--------------------->

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>

<!--STYLESHEETS-->
<link href="css/style.css" rel="stylesheet" type="text/css" />

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
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
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
	<?php
	include "login.php";?>
	
	
	
	
<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

	<!--HEADER-->
	 
    <div class="header">
    <!--TITLE--><h1 align ="center">Admin Login </h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Fill out the form below to login to  control panel.</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><input name="username" type="text" class="input username" value="Username" /><!--END USERNAME-->
    <!--PASSWORD--><input name="password" type="password" class="input password" value="Password"  /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
	<input name="submitID" type="hidden" id="submitID" value="1">
	<input name="userType" type="hidden" id="userType" value="admin" >
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="Login" class="button" /><!--END LOGIN BUTTON-->
	
    <!--REGISTER BUTTON <input type="submit" name="submit" value="Register" class="register" />  <!--END REGISTER BUTTON-->
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->


</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->
<?php if(@$message != NULL){
	?>
	<br />
<table width="100%"  border="0" cellpadding="3" cellspacing="0" bgcolor="#FFCCCC">
  <tr>
    <td><div  align="center"><strong><font color="#FF0000"><h2><?=$message;?></h2></font></strong></div></td>
  </tr>
</table>
<?php }
?>

</body>
</html>