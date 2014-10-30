
<?php
require_once("library.php");
$dobbyg = new DataBase();
$dobbyg->dbconnect();

$strin2getAppointments = "SELECT    `userID` ,  `appointmentdate` 
FROM  `appointment` 
WHERE  `userID` = '$user_id'
ORDER BY  `appointment`.`appointmentdate` DESC ";


//
$messUsers = $dobbyg->select_from_db("$strin2getAppointments");
$themess = $messUsers[1];
foreach ($themess as $mes){
			$name = $dobbyg->getDocname($mes['userID']);
			
			$dd = $mes['appointmentdate'];
	echo " <li class=\"comment_even\">
            <div class=\"author\"><span class=\"name\"><a href=\"#\">Your Appointment with Dr. with $name</a></span> </div>
            <div class=\"submitdate\"><a href=\"#\">Scheduled Date: $dd</a></div>";
			if(date("Y-m-d") > $dd ){
			echo " <p color =\"red\"> Past</p>";
		  }else{
		  echo" <p color =\"green\"> Future</p>";
		  }
		  
         echo " </li>";
		  
}


?>
