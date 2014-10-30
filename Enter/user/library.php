<?php
/* just so u kno, I'm the el Magnifico. 
Muahahahahahahahahahahahahah. U get the point. 
..... Doro Genius !!!
*/

// data base class

 class DataBase{
 
  const dbname = 'clinic_manager';
  const dbhostname = 'localhost';
  const dbpassword = '';
  const dbusername = 'root';
  
  private $query, $rs;
  public $connect,$to_be_escaped;
  
  // close db
 function dbclose(){
 $check = mysqli_close($this->connect);
	 if($check){
	 //echo "DB Connection closed";
	 }
 
 }
 
 // connect to db 
 function dbconnect(){
	// using mysqli
	$this->connect = new mysqli($this::dbhostname,$this::dbusername,$this::dbpassword,$this::dbname);
	if(mysqli_connect_error($this->connect)){
		//echo "failed to connect ".mysqli_connect_error();
		}
	
	else{
		//print ("Conected to DB server");
	}
	
 }
 // select fuction
 public function select_from_db($query){
	 $this->query =$query ;
	$data = array();
	 $rs = $this->connect->query($this->query);
	if ($rs === false){
	trigger_error(''.$this->connect->error, E_USER_ERROR);	
	} else{
		$numrows = $rs->num_rows;
		for($i=0; $i<$numrows; $i++){
			 $data[] = $rs->fetch_assoc();
		}
		$rs->free();
		return $numrows_and_data = array($numrows,$data);
	}
	
 }
 
 // update function
 public function update_db($query){
	$this->query =$query ;
	$rs = $this->connect->query($this->query);
	if ($rs === false){
	trigger_error(''.$conection->error, E_USER_ERROR);	
	} else{
		return "SUCCESS";
	}
 }
 
 //insert function
 public function insert_db($query){
 $this->query =$query ;
	$data = array();
	$rs = $this->connect->query($this->query);
	if ($rs === false){
	trigger_error(''.$conection->error, E_USER_ERROR);	
	} else{
		return "SUCCESS";
	}
	
}

public function escape($string){
		$this->to_be_escaped = $string;
		$fire = $this->connect->real_escape_string($this->to_be_escaped);
		return $fire;
}

public function sendMessage($message, $fromtype, $toType, $senderid, $receiverid){
		$this->to_be_escaped = $message;
		$fire = $this->connect->real_escape_string($this->to_be_escaped);
		$isSent = "false";
		$dID = $receiverid;
		$sID = $senderid;
		$date = date("Y-m-d");
		if($fromtype =="admin"){
			if($toType == "doctor"){
				$query = "
				INSERT INTO  `messagesfromstaff` (
				`id` ,
				`staffId` ,
				`docid` ,
				`message` ,
				`date`
				)
				VALUES (
				NULL ,  '1',  '$dID',  '$fire',  '$date'
				);

				";
			$theresul =  $this->insert_db($query);
			$isSent = "Message Sent";
			}else{
			
			}
			//$isSent = "true";
		}else if($fromtype == "user"){
			if($toType == "doctor"){
			$isSent = "false";
				$dID = $receiverid;
				$sID = $senderid;
				$date = date("Y-m-d");
			
			$query = "
				INSERT INTO  `messagesfromusers` (
				`id` ,
				`docId` ,
				`userid` ,
				`message` ,
				`date`
				)
				VALUES (
				NULL ,  '$dID',  '$sID',  '$fire',  '$date'
				);

				";
			$theresul =  $this->insert_db($query);
			$isSent = "Message Sent";
				
			}
		}
		return $isSent;
}
public function checkAppointment($senderid, $thedate){
$check_availability_query = "SELECT `userID` FROM `appointment` WHERE `appointmentdate` = '$thedate'
	and `userID` = '$senderid'";
			$d_data = $this->select_from_db($check_availability_query);
			if($d_data[0]>0){
				return "false";
			}else{
			return  "true";
			}

}
public function makeAppointment( $senderid,$receiverId){
		$isSent = " ";
		$inserted ="false";
		$today = date('Y-m-d');
		$checker = $this->checkAppointment($senderid, $today);
			if($checker == "true"){
				
				do{
				$check_availability_query = "SELECT `doctorId` FROM `appointment` WHERE `appointmentdate` = '$today'";
					$d_data = $this->select_from_db($check_availability_query);
					$d_Ddd = $d_data[0];
				
					if($d_data[0]>9){
					
						$today = date("Y-m-d",strtotime("$today +1 day"));	
						
						$checker = $this->checkAppointment($senderid, $today);
						if($checker == "true"){
						
						$check_availability_query2 = "SELECT `doctorId` FROM `appointment` WHERE `appointmentdate` = '$today'";
						$d_data2 = $this->select_from_db($check_availability_query2);
							if($d_data2[0]>9){
								$inserted = "false";
							}else{
								$inserted = "true";
								$check_availability_query3 = "INSERT INTO  `appointment` (
									`id` ,
									`doctorId` ,
									`userID` ,
									`appointmentdate`
									)
									VALUES (
									NULL ,  '$receiverId',  '$senderid',  '$today'
									); ";
								$d_data3 = $this->insert_db($check_availability_query3);
							}
						}else{
							$inserted ="true";
							$isSent = "You already have an appointment scheduled for $today";
						}
						
						
					}else{
						$inserted = "true";
						$check_availability_query3 = "INSERT INTO  `appointment` (
								`id` ,
								`doctorId` ,
								`userID` ,
								`appointmentdate`
								)
								VALUES (
								NULL ,  '$receiverId',  '$senderid',  '$today'
								); ";
							$d_data3 = $this->insert_db($check_availability_query3);
					}
				}while($inserted =="false");
					//$isSent = "You appointment have been scheduled for $today";
			}else{
			$isSent = "You already have an appointment scheduled for $today";
		}
		return $isSent;
}

public function  pharmQuery($string){
		$this->to_be_escaped = $string;
		$fire = $this->connect->real_escape_string($this->to_be_escaped);
		$token = strtok($fire," ");
		$word = array();
		$newword = " ";
		while($token !== false){
			
			$word[] = $token;
			$token = strtok(" ");
		}
		
		if(sizeof($word) != 0){
		
			foreach($word as $wd){
			$newword = $newword." '%".$wd."%' OR `drugname` like  ";
			}
			$firesuper = " SELECT * FROM  `pharm` WHERE  `drugname` like  ".$newword."'%$word[0]%'";
			$thedrugs =  $this->select_from_db($firesuper);
			
		}
		
		return $thedrugs;
		
}

function getDocname($id){
	$str = "SELECT  `fname` ,  `lname` 
				FROM  `doctor` 
				WHERE  `id` = '$id'";
		$ntrue = $this->select_from_db($str);
		
		$ntrueval = $ntrue[1];
		foreach($ntrueval as $val){
			$firstname = $val['fname'];
			$lstname = $val['lname'];
		}
			return $firstname." ".$lstname;
			
			}

public function getAllDocs(){
		$str = "SELECT  `id`, `fname` ,  `lname` 
				FROM  `doctor` 
				";
		$ntrue = $this->select_from_db($str);
		$doc_names = array();
		$doc_ids = array();
		$ntrueval = $ntrue[1];
		foreach($ntrueval as $val){
			$firstname = $val['fname'];
			$lstname = $val['lname'];
			$docId = $val['id'];
			$doc_names[] = " $firstname $lstname ";
			$doc_ids[] = "$docId ";
		}
		return $returnVals = array($doc_names, $doc_ids);
	}
}

 
 
 // class for checking log table
 
 
?>