<?php
//echo $d=$_POST['propic'];
@session_start();
 $prop = @$_FILES['propic']['name'];
if ((isset($prop)) && !empty($prop)){
require_once("library.php");
$dobby6 = new DataBase();
$dobby6->dbconnect();

$propErrors = array();
$prop = @$_FILES['propic']['name'];
			$propprefix= "propic/";
				  $propextention1 = strtolower(substr($prop,strpos($prop,'.') + 1 ));
				  $propsize1 = @$_FILES['propic']['size'];
				  $max_propsize1 = 1536000;
				  $proptype1 = @$_FILES['propic']['type'];
				  $proptmp_name1 = @$_FILES['propic']['tmp_name'];
				//check if the name of the file is already being use by another dude/babe  
				$propnamecheck = array();
				
				$propquery1 = " SELECT profilepic FROM doctor";
				$proprun_query = $dobby6->select_from_db($propquery1);
				$proprun_data = $proprun_query[1];
				if (!empty($proprun_query)){
					foreach($proprun_data as $get_prop_assoc ){
						$propnamecheck[] = $get_prop_assoc['profilepic'];
						}
							for($dsprop =0; $dsprop< sizeof($propnamecheck); $dsprop++){
							//check if name file is already used.
							if(($propprefix.$prop == $propnamecheck[$dsprop] ))
							{   $propErrors[] = '<p class="asteric" align="center">ERROR: The name of the Picture file you entered is already being used my another
							person. You can rename the picture or choose another picture entirely.</p>';  
								$prop_error_message= "Error Is Alailable";
								}
								
							}
							
						 //do this if name file is not used.
						 //Query db for
				if((isset($prop) )&& (empty(@$prop_error_message))){
						 if ((!empty($prop) ) )
								{
									if((( $propextention1=='jpg' )&& ($proptype1 == 'image/jpeg' )) || 
										 (( $propextention1=='png' )&& ($proptype1 == 'image/png'))|| 
										 (( $propextention1=='gif' )&& ($proptype1 == 'image/gif' ))
										 ) 
										 
											{
													 if (!($propsize1 > $max_propsize1))
													 {
															$proplocation = 'propic/';
															 move_uploaded_file($proptmp_name1,$proplocation.$prop);
															  $part1 = $dobby6->escape("$proplocation$prop");
															 //echo 'Uploaded';
															 //do upload magic
															 $uploadmagic = "UPDATE  $databaseName.`doctor` SET  `profilepic` =  '$part1' 
															 WHERE  `doctor`.`id` = $user_id;";
															echo $runUploadQueryMagic = $dobby6->update_db($uploadmagic);
															 if(!empty($runUploadQueryMagic )){
																$prop_success_message = "Profile picture has successfully been changed";
																$_SESSION['succ'] = $prop_success_message;
																header("location:changepropic.php");
															 }
															 
													 }
													 else{ 
													 $prop_error_message= "Error Is Alailable";
													 $propErrors[] ='<p class="asteric" align="center">ERROR:Picture File too large.</p>';}
											}
									else{  
									$prop_error_message= "Error Is Alailable";
									$propErrors[] = "<p class=\"asteric\" align=\"center\">ERROR: $prop  file is not a valid image</p>";} 		
								 }
								 
								 
								 }
						
					}else{
					$prop_error_message= "Error Is Alailable";
									$propErrors[] = "<p class=\"asteric\" align=\"center\">Sorry, Error have been encountered. contact Admin.</p>";		
								
					}
					
				$dobby6->dbclose();
				}				
				
// display error message
 if(!(@$prop_error_message == NULL))
  {
			echo "<table width=\"100%\"  border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#750707\">
						<tr>
							<td><div align=\"center\"><strong>
							<font color=\"#000\">";
				for($j=0; $j< sizeof($propErrors); $j++ ){
				
				echo @$propErrors[$j]."<br />" ;
				}
			echo			"</font></strong></div></td>
						</tr>
					</table> ";
  }
 @$prop_success_message = $_SESSION['succ'] ;
  if(!(@$prop_success_message == NULL))
  {
			echo "<table width=\"100%\"  border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#0F0\">
						<tr>
							<td><div align=\"center\"><strong>
							<font color=\"#000\">";
				
			echo @$prop_success_message."<br />" ;
				
			echo			"</font></strong></div></td>
						</tr>
					</table> ";
					//header("location:changepropic.php");
					
  }
  ?>
  <!DOCTYPE html>
  <html>
	<head>
	<meta charset = "utf-8">
	</head>
	<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
 <table align="center" width="517" border="0" cellspacing="5" cellpadding="7" >
<tr>
 <th scope="row"> Choose Picture </th>
      <td bgcolor="#66CC00"><input type="file" accept = "image/*" name="propic"  /><br/> Picture should not be more than 1.5mb</td>
    </tr>
	<tr>
      <th scope="row">&nbsp;</th>
      <td bgcolor="#FFFFFF">
        <input type="submit" name="button"  value="Submit" />
        <input type="reset" name="Reset"  value="Reset" />
      </td>
    </tr>
	<table>
	</form>
	</body>
	
	
	
	
	
	
	
	