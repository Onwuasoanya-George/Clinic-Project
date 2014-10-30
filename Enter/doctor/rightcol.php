 <div id="column">
		<div id="featured">
		<?php
	  require_once("library.php");
	  $dobby2 = new DataBase();
	  // connect to db
	  $dobby2->dbconnect();
	  // get pro pic and name
 $queryforpic = "SELECT UPPER(  `fname` ) AS firstname, UPPER(  `lname` ) AS lastname,`profilepic`,`verified`,`released`
FROM  `doctor` 
WHERE  `id` = $user_id ";


		$q_num  = 0 ;
		$dataset = array();
		$run_querynforpic = $dobby2->select_from_db($queryforpic) ;
		$queryn_numforpic = $run_querynforpic[0];
		$dataset = $run_querynforpic[1];
			if($queryn_numforpic  = 1){
					foreach($dataset as $runAssocnforpic){
						$prfname = $runAssocnforpic['firstname'];
						$prlname = $runAssocnforpic['lastname'];
						$prpic = $runAssocnforpic['profilepic'];
						$veri = $runAssocnforpic['verified'];
						$release = $runAssocnforpic['released'];
						
							}
							$fullname = $prfname." ".$prlname ;
							echo	"<div > <img class=\"imageview\"
							src= \"$prpic\" width=\"170\" height=\"170\"  /> <br />
								 <strong>$fullname</strong><br/>
									<a  href=\"changepropic.php\" id =\"buttnav2 \">change profile picture</a>
									</div>";
							}
							$dobby2->dbclose();
							
	  ?>
		
		</div>
      <div id="featured">
        <ul>
          <li>
            <h2>Status</h2>
			<?php
			 if (($veri == "true") && ($release == "false")){
			 $imagefile = "verified.png";
			 }else if(($veri == "true") && ($release == "true")){
			 $imagefile = "released.png";
			 }else{
			  $imagefile = "notverified.png";
			 }
			
           echo "<p class=\"imgholder\"><img src=\"images/demo/$imagefile\"  /></p>" ;
		   ?>
            <p>&nbsp;</p>
          </li>
        </ul>
      </div>
      <div class="holder" id="featured">
        <h2 align="center"><a href=""> Appointments </a> </h2>
        <p>&nbsp;</p>
        <ul>
		<?php
			require_once("library.php");
$dobbyg = new DataBase();
$dobbyg->dbconnect();

$strin2getAppointments = "SELECT    `userID` ,  `appointmentdate` 
FROM  `appointment` 
WHERE  `doctorId` = '$user_id'
ORDER BY  `appointment`.`appointmentdate` DESC
Limit 0,3 ";


//
$messUsers = $dobbyg->select_from_db("$strin2getAppointments");

$themess = $messUsers[1];
foreach ($themess as $mes){
			$name = $dobbyg->getUsername($mes['userID']);
			
			$dd = $mes['appointmentdate'];
	echo " <li class=\"comment_even\">

            <div class=\"author\"><span class=\"name\"><a href=\"#\"> Appointment with $name</a></span> </div>
            <div class=\"submitdate\"><a href=\"#\"> Date: $dd</a></div>";
			if(date("Y-m-d") == $dd ){
			echo " Today is ".date('Y-m-d');
			echo " <p color =\"red\"> Today</p>";
		  }elseif(date("Y-m-d") > $dd){
		  echo " Today is ".date('Y-m-d');
		  echo" <p color =\"green\"> Past</p>";
		  }else{
		  echo " Today is ".date('Y-m-d');
		   echo" <p color =\"green\"> Future</p>";
		  }
		  
         echo " </li>";
		  
}
$dobbyg->dbclose();
		?>
          
        </ul>
        <p>&nbsp;</p>
        <p class="readmore"><a href="appointment.php">All records &raquo;</a></p>
      </div>
    </div>