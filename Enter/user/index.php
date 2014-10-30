<?php
	include 'core.php';
	include 'config.php';
	

	
if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged']))) && ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))
&& ((isset($_SESSION['AccType']))&&(($_SESSION['AccType']) == "user"))  
				){ 
				

			$user_id = $_SESSION['id'] ;
					
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
  <div id="gallery">
    <ul>
      <li class="placeholder" style="background-image:url(images/demo/gallery_default.jpg);">Image Holder</li>
      <li><a class="swap" style="background-image:url(images/demo/290x105.gif);" href="#gallery"><strong>Services</strong><span><img src="images/demo/gallery_1.jpg" alt="" /></span></a></li>
      <li><a class="swap" style="background-image:url(images/demo/290x105.gif);" href="#gallery"><strong>Products</strong><span><img src="images/demo/gallery_2.jpg" alt="" /></span></a></li>
      <li class="last"><a class="swap" style="background-image:url(images/demo/290x105.gif);" href="#gallery"><strong>Company</strong><span><img src="images/demo/gallery_3.jpg" alt="" /></span></a></li>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <div id="content">
      <h1>Appointments</h1>
    
	
          
		<?php
			require_once("library.php");
$dobbyg = new DataBase();
$dobbyg->dbconnect();

$strin2getAppointments = "SELECT    `doctorId` ,  `appointmentdate` 
FROM  `appointment` 
WHERE  `userID` = '$user_id'
ORDER BY  `appointment`.`appointmentdate` DESC
Limit 0,2 ";


//
$messUsers = $dobbyg->select_from_db("$strin2getAppointments");
$themess = $messUsers[1];
foreach ($themess as $mes){
			$name = $dobbyg->getDocname($mes['doctorId']);
			
			$dd = $mes['appointmentdate'];
	echo " <li class=\"comment_even\">

            <div class=\"author\"><span class=\"name\"><a href=\"#\">Your Appointment with Dr. $name</a></span> </div>
            <div class=\"submitdate\"><a href=\"#\"> Date: $dd</a></div>";
			if(date("Y-m-d") > $dd ){
			echo " <p color =\"red\"> Past</p>";
		  }else{
		  echo" <p color =\"green\"> Future</p>";
		  }
		  
         echo "
			<br/><p class=\"readmore\"><a href=\"appointment.php\">All records of Appointments &raquo;</a></p>

		 </li>";
		  
}
$dobbyg->dbclose();
		?>
          
	 
	
	    
	 <div  >
	   <?php
	 include "rightcol.php";
	 ?>
	 </div>
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
		  
		   <li>
            
       
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
