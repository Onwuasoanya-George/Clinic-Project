<?php
	include 'core.php';
	include 'config.php';
	

	
if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged']))) && ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))
&& ((isset($_SESSION['AccType']))&&(($_SESSION['AccType']) == "user"))  
				){ 
				

			$user_id = $_SESSION['id'] ;
			if(@$_POST['submitID'] == 1){
				 if(empty(@$_POST['docIDs'])){
					$message =  "You have to click on one of the Doctors";
				 }else{
					 require_once("library.php");
					  $dobbybb4 = new DataBase();
					   //connect to db
					  $dobbybb4->dbconnect();
					  $receiver = $_POST['docIDs'];
					  $id = "$user_id";
					  $isSent = $dobbybb4->makeAppointment( $id, $receiver);
					  if(!empty($isSent)){
						$sent_message =  $isSent;
					  }
				 }
		}
					
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>The Clinic</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<body id="top">


<?php 
include "header_user.php";
?>

<div class="wrapper col2">
  
</div>
<div class="wrapper col4">
  <div id="container">
    <div id="content">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
		<br /><br /><br />
          <legend>Contact Form</legend>
          
          </label><br /><br />
		  <label for="nameOfDocs" class = "margin"><b> Select The Doctor to Make an appointment with:  </b></label><br/><br/>
		<?php
		 require_once("library.php");
	  $dobbybb = new DataBase();
	   //connect to db
	  $dobbybb->dbconnect();
	  $gtDocN = $dobbybb->getAllDocs();
	  $getDocName = $gtDocN[0];
	  $getDocID = $gtDocN[1];
	  $dSixe= sizeof($getDocName)-1;
	  for($i=0; $i<(sizeof($getDocName)-1); $i++){
		echo "
		<input type=\"radio\" name=\"docIDs\" id =\"docIDs\" value=\"$getDocID[$i]\">$getDocName[$i]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
		 ";	 
	 }
	 echo "
		<input type=\"radio\" checked =\"checked\" name=\"docIDs\" id =\"docIDs\" value=\"$getDocID[$dSixe]\">$getDocName[$dSixe] 
			&nbsp;&nbsp;
		 ";	
	 
		?><br /><br />
          
          <p>
            <input id="submitform" name="submitform" type="submit" value="Make appointment" />
            &nbsp;
			
			<input id="submitID" name="submitID" type="hidden" value="1" />
          </p>
        </fieldset>
      </form>
	  
	  
	  <?php  
  // display any error crap
   if(!(@$sent_message == NULL))
  {
			echo "<br /> <table width=\"100%\"  border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#0F0\">
						<tr>
							<td><div align=\"center\"><strong>
							<font color=\"#000\">";
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
    <div id="column">
      <div id="featured">
        <ul>
          <li>
            <h2>Book an Appointment</h2>
            <p class="imgholder"><a href="makeappointment.php"><img src="images/demo/appoint.png" alt="" /></a></p>
            <p>&nbsp;</p>
          </li>
		   <li>
            <h2>Send a Message</h2>
            <p class="imgholder"><a href="sendmessage.php"><img src="images/demo/message.png" alt="" /></a></p>
            <p>&nbsp;</p>
          </li>
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>


<?php 
include "footer_user.php";
?>

</body>
</html>
<?php 
}else{
	/* Disconnect from database */
	
 
	header("Location: $errpage");
	exit();
}
 ?>
