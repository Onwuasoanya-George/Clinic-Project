<?php
		include "login.php";
		 
		?>

<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel = "stylesheet" type = "text/css" href = "styles/login.css">

<title>Clinic</title>
</head>

<body>

	<div class="righty">
			<p>&nbsp;</p>
			<br/>
			<p class = "content"><img class = "title" src = 			   "loginpage_images/title.png" height = "100" width = "500">			</p>
			<p class = "content"><br>
  &nbsp&nbsp <img  class = "effect" id = "login_pictureuser" src = "loginpage_images/loginuser.png" width="269" height="67">
 <br>
   &nbsp&nbsp <img  class = "effect" id = "login_picturedoc" src = "loginpage_images/logindoc.png" width="269" height="67">
 <br>
  &nbsp&nbsp <br>
			  <br>
  &nbsp&nbsp <img  class = "effect" id = "register_picture" src = "loginpage_images/reg.png" height = "100" width = "500">	  </p>
  
  <p>Content for  class "maindraw" id "maindrawer" Goes gfd yer yukj yg akydgtfhuhjyukd ggf oagkh agf yghf gkhad
		afdkfh adshg dahjg g udf adhf ua</p>
</div>
	
	<div id="logdrawer" class="righty">
	<br />
		    
		    <div class="maindraw" id="maindrawer">
			
			<div id="defframe" >
		    
		    
		
		
	    </div>

		  <div id="regframe" >
		   <h2 align="center"> Register </h2>
		<?php
		 include 'userReg.php';
		?>
		
	    </div>
		<div id="logDocframe" >
		    
		   
		
		<form action="<?php 
		//echo $_SERVER['PHP_SELF']
		?>" method="post">
          <h2 align="center"> Doctors </h2>
           <strong> Username:</strong>
              <input type="text" name="userNamed"  value="" required/> <br/>
            
           <strong> Password:</strong>
              <input type="password" name="passwordd"  value="" required/>
           
            
             
            <p><a href="forgotpass.php">forgot password ? </a>
                <input type="submit" name="userlogin" id="login" value="Login" />
          	<input name="userType" type="hidden" id="userType" value="1" >
			<input name="submitID" type="hidden" id="submitID" value="1" >
		

            </p>
          
</form>
	    </div>
		<div id="logUserframe" >
		    
		   
		
		<form action="<?php 
		echo $_SERVER['PHP_SELF']
		?>" method="post">
          <h2 align="center"> Users </h2>
           <strong> Username:</strong>
              <input type="text" name="userName"  value="" required/> <br/>
            
           <strong> Password:</strong>
              <input type="password" name="password"  value="" required/>
           
            
             
            <p><a href="forgotpass.php">forgot password ? </a>
                <input type="submit" name="userlogin" id="login" value="Login"  />
				 <input name="userType" type="hidden" id="userType" value="2">
            <input name="submitID" type="hidden" id="submitID" value="1">
			

            </p>
          
</form>
	    </div>
		
		<div  > 
  <?php  
  // display any error crap
   if(!(@$sent_message == NULL))
  {
			echo "<br /> <table width=\"100%\"  border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#0F0\">
						<tr>
							<td><div align=\"center\"><strong>
							<font color=\"#F00\">";
				echo @$sent_message ;
			echo			"</font></strong></div></td>
						</tr>
					</table> ";
  }
  ?>
    <?php if(@$message != NULL){?>
	<br />
<table width="100%"  border="0" cellpadding="3" cellspacing="0" bgcolor="#FFCCCC">
  <tr>
    <td><div  align="center"><strong><font color="#FF0000"><h2><?=$message;?></h2></font></strong></div></td>
  </tr>
</table>
<?php } ?>
</div>
		
		</div>
</div>
<div class="righty">
			
			</div>



<script type="text/javascript" src="scripts/jquery-1.9.1.min.js"></script>
<script src="scripts/my_scripts.js"></script>   
</body>
</html>