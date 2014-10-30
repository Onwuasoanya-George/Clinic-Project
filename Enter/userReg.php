<?php
include 'core.php';
include 'config.php';

$correct = true ;
$ERRORS = array();
if ((isset($_POST['firstname'])) || (isset($_POST['lastname'])) ||
	(isset($_POST['othername'])) ||	(isset($_POST['Uname'])) ||	
	(isset($_POST['pass'])) ||  (isset($_POST['cpass'])) ||	(isset($_POST['email'])))
	{
			/* Connect to database */
			require_once 'library.php';
			 $dbobj =  new DataBase();
			 //connect to db
			 $dbobj->dbconnect();

			 $firstname = trim($_POST['firstname']) == "" ?
			 $ERRORS[] ='<p class="asteric" align="center">ERROR: Enter your Firstname</p>' : 
			$dbobj->escape(trim($_POST['firstname']));

			$userty = $dbobj->escape(trim($_POST['userType']));
			$genty = $dbobj->escape(trim($_POST['genderType']));
			
			$phone1 = (!isset($_POST['phone']) || trim($_POST['phone']) == ""|| 
			 !@ereg('^([0-9]){11,13}$', $_POST['phone']))
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your phone number </p>' : 
			"tell:".$dbobj->escape(($_POST['phone'])).". ";
			
			
			 $lastname = (!isset($_POST['lastname']) || trim($_POST['lastname']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your Lastname</P>' : 
			$dbobj->escape(trim($_POST['lastname']));
			 
			 
			
			 $Uname = (!isset($_POST['Uname']) || trim($_POST['Uname']) == "") 
			? $ERRORS[] ='<p class="asteric" align="center">ERROR: Enter a User name</p>' : 
			$dbobj->escape($_POST['Uname']);


			 $pass = (!isset($_POST['pass']) || trim($_POST['pass']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter a Password</p>' : 
			$dbobj->escape($_POST['pass']);


			 $cpass = (!isset($_POST['cpass']) || trim($_POST['cpass']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your Confirm Password</p>' : 
			$dbobj->escape($_POST['cpass']);


			 $email = (!isset($_POST['email']) || trim($_POST['email']) == "" || 
			 !@ereg('^([a-zA-Z0-9_-]+)([\.a-zA-Z0-9_-]+)@([a-zA-Z0-9_-]+) ?(\.[a-zA-Z0-9_-]+)+$', $_POST['email'])) 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter a valid Email</p>' : 
			$dbobj->escape(trim($_POST['email']));
			
			
			
			
			if (!($pass==$cpass)){
				$ERRORS[] = '<p class="asteric" align="center">ERROR: Your passwords do not match.</p>';
				$correct = false ;
			}else{$correct = true ;}
			
			
			$chUser = array();
			$chEmail = array();
				if(@$userty == "doctor"){
							$theType = "doctor";
							$tableName = "doctor";
					}else{
					$theType = "users";
					}
					$query = "SELECT  `email` ,  `userName` 
					FROM  $theType ";
					
				if($runQuery = $dbobj->select_from_db($query)) 
					{
					
						$inc = 0 ;
						$runQ = $runQuery[1];
										foreach($runQ as $query_row)
											{
												$chUser[$inc] =  $query_row['userName'];
												$chEmail[$inc] =  $query_row['email'];
												$inc++ ;
											}
											  
						for($i=0; $i < $inc; $i++)
						{
							if($chUser[$i] == $Uname )	
							{
								$ERRORS[] = '<p class="asteric" align="center">ERROR: Your User name is already in Use. Try another User name.</p>';
								$correct = false ;
							}else{$correct = true ;}
							
							if($chEmail[$i] == $email )
							{
								$ERRORS[] = '<p class="asteric" align="center">ERROR: Your email address is already in Use. Try another email address.</p>';
								$correct = false ;
							}else{$correct = true ;}
						}
					}else{ 
					$ERRORS[] = '<p class="asteric" align="center">ERROR: Internal error, Contact Admin.</p>';
}
				
			
			if(sizeof($ERRORS) > 0) 
					{
					// format and display error list
					$correct = false ;
					$num_of_err = sizeof($ERRORS);
					$num_of_err2 =$num_of_err ;
					echo '<p class="asteric" align="center">'.sizeof($ERRORS).' error(s) were caught';
					foreach ($ERRORS as $e)
					{
						echo "$e";
					}
						$correct = false;
					}else{$correct = true ;}

					
			if(($correct == true ))
				{
							
						if(@$userty == "doctor"){
							$loginPage ="doctor/index.php";
							$theType = "doctor";
							$_SESSION['AccType'] = "doctor";
							$query2 = "INSERT INTO `doctor` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `gender`, `verified`, `released`, `userName`, `speciality`)
							VALUES (NULL, '$firstname', '$lastname', '$email','$phone1', '$pass','$genty','false','false', '$Uname', '7');";
						}else{
						$loginPage ="user/index.php";
						$theType = "users";
						$_SESSION['AccType'] = "user";
						$query2 = "INSERT INTO $theType (`id`, `fname`, `lname`, `email`, `password`, `phone`,`gender`,`userName`) 
							VALUES (NULL, '$firstname', '$lastname', '$email', '$pass','$phone1','$genty', '$Uname');";
						}
						
						
						if($runQuery2 = $dbobj->insert_db($query2)){
						
							$idquery = "Select id from ".$theType .
							" WHERE `" . $userNameField . "`='$Uname' AND `" . $userPasswordField . "`='$pass'";
							$query_run2 = $dbobj->select_from_db($idquery);
						$user_fname= $firstname ;
						$user_lname = $lastname ;
						$user_name = $Uname ;
						if ($query_run2[0] = 1){
							$user_idw = $query_run2[1];
							$user_idnumrow = $user_idw[0];
						
						foreach ($user_idw as $didi){
						$user_id =  $didi['id'];}
						if($tableName == "doctor"){
							$idquery2 = "Select speciality from ".$tableName .
							" WHERE `id`  = $user_id  ";
							$query_run3 = $dbobj->select_from_db($idquery2);
								$get_id2 = $query_run3[1];
									foreach ($get_id2 as $didi2){
									$doc_area =  $didi2['speciality'];}
									if($doc_area == 7){
									$loginPage = "doctor/newmessage.php";
									}
						}
                        }
						
							
							$_SESSION['isLoged'] = "yes";
							$_SESSION['userfname'] = $user_fname;
							$_SESSION['userlname'] = $user_lname;
							$_SESSION['Uname'] = $user_name;
							$_SESSION['id'] = $user_id;
							@$_SESSION['areaInt'] = $doc_area;
							header("Location: $loginPage");
							exit();
						}else{
							$correct = false ;
							$ERRORS[] = '<p class="asteric" align="center">ERROR: Internal error, Contact Admin.</p>';
							$num_of_err2 = sizeof($ERRORS);
						
						}
						if(!(@$num_of_err2 == @$num_of_err)){	
				 
							echo '<p class="asteric" align="center">'.sizeof($ERRORS).' error(s) was(were) caught';
							foreach ($ERRORS as $e)
							{
								echo "$e";
							}
							
							$correct = false;
								}else{$correct = true ;}
				
				}
	$dbobj->dbclose();
 }

?>
<!Doctype html>
<html>

<style type="text/css">
<!--
.asteric {
	color: #F00;
}


-->

.success {
	color: #0F3;
}
.success {
	color: #0F0;
}
.success {
	font-size: 18px;
}
.extralarge {
	font-size: 24px;
}
</style>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" >
  <table align="left" width="517" border="0" cellspacing="5" cellpadding="7" >
    <tr >
      <th width="133" height="40" scope="row">First name :</th>
      <td width="341" ><input  type="text" name="firstname" size="30" maxlength="30" required />
        <span class="asteric">*</span></td>
    </tr>
    <tr>
      <th scope="row">Last name :</th>
      <td ><input type="text" name="lastname" size="30" maxlength="30"  required/>
        <span class="asteric">*</span></td>
    </tr>
    
    <tr>
      <th scope="row">User name :</th>
      <td ><input   type="text" name="Uname" size="30" maxlength="30" required/>
        <span class="asteric">*</span></td>
    </tr>
    <tr>
      <th height="39" scope="row">Password :</th>
      <td ><input  type="password" name="pass" size="20" maxlength="20" required />
        <span class="asteric">*</span></td>
    </tr>
    <tr>
      <th scope="row">Confirm Password:</th>
      <td ><input  type="password" name="cpass" size="30" maxlength="30" required/>
        <span class="asteric">*</span></td>
    </tr>
	 <tr>
      <th scope="row">Email:</th>
      <td ><input  type="text" name="email" size="30" maxlength="30" required />
        <span class="asteric">*</span></td>
    </tr>
	<tr>
      <th scope="row">Phone  :</th>
      <td >
	  <input  type="number" name="phone" size="30" maxlength="30" required/>
       <span class="asteric">*</span></td>
    </tr>
	<tr>
      <th scope="row">I'm a :</th>
      <td >
	  <select name="userType" id="userType">
	  <option value="user"> User</option>
	  <option value="doctor"> Doctor</option>
	  
	  </select>
	  
        <span class="asteric">*</span></td>
    </tr>
	<tr>
      <th scope="row">Gender</th>
      <td >
	  <select name="genderType">
	  <option value="female"> Female</option>
	  <option value="male"> Male</option>
	  
	  </select>
	  
        <span class="asteric">*</span></td>
    </tr>
   
    <tr>
      <th scope="row"></th>
      <td >
      <input type="submit" name="Submit"  value="Submit" />
        <input type="reset" name="Reset"  value="Reset" />
        </td>
    </tr>
  </table>
  <p>&nbsp;</p>

  
  

</form>

