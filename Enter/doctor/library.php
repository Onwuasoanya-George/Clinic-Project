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

public function sendMessage($message, $fromType, $toType, $id, $userid){
		$this->to_be_escaped = $message;
		$fire = $this->connect->real_escape_string($this->to_be_escaped);
		$isSent = "false";
		$datee = date('Y-m-d');
		
		if($fromtype =="admin"){
		$string = "INSERT INTO  `messagesfromusers` (
			`id` ,
			`docId` ,
			`userid` ,
			`message` ,
			`date`
			)
			VALUES (
			NULL ,  '$docid',  '7',  '$message',  '$datee'
			);
			";
			$this->insert_db($string);
			$isSent = "true";
		}else{
		$string = "INSERT INTO  `messagesfromstaff` (
			`id` ,
			`docId` ,
			`userid` ,
			`message` ,
			`date`
			)
			VALUES (
			NULL ,  '$docid',  '$userid',  '$message',  '$datee'
			);
			";
			$this->insert_db($string);
			$isSent = "true";
		}
		return $isSent;
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
	
	function getUsername($id){
	$str = "SELECT  `fname` ,  `lname` 
				FROM  `users` 
				WHERE  `id` = '$id'";
		$ntrue = $this->select_from_db($str);
		
		$ntrueval = $ntrue[1];
		foreach($ntrueval as $val){
			$firstname = $val['fname'];
			$lstname = $val['lname'];
		}
			return $firstname." ".$lstname;
			
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

 }
 
 // class for checking log table
 
 
?>