 <div id="column">
		<div id="featured">
		<?php
	  require_once("library.php");
	  $dobby2 = new DataBase();
	  // connect to db
	  $dobby2->dbconnect();
	  // get pro pic and name
 $queryforpic = "SELECT UPPER(  `fname` ) AS firstname, UPPER(  `lname` ) AS lastname,`profilepic`
FROM  `users` 
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
		<p class="readmore"><a href="appointment.php">All records of Appointments &raquo;</a></p>
		</div>
      
      
    </div>