<?php
	include 'core.php';
	include 'config.php';
	

	
if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged']))) && ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))  
&& ((isset($_SESSION['AccType']))&&(($_SESSION['AccType']) == "user"))
				){ 
				
			if((($_SESSION['areaInt']) == "7")){
				header("Location: newmessage.php");
			}
			
			
			$user_id = $_SESSION['id'] ;
			$user_area_id = $_SESSION['areaInt'] ;
			
					
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Corporation | Style Demo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<body id="top">


<?php
include "header_user.php";
?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first"></li>
    </ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <div id="content">
      
      <div id="comments">
       <h2 align="center">Appointments</h2>
        <ul class="commentlist">
          
          <?php
		  include 'forappointment.php';
		  ?>
          
        </ul>
      </div>
     
      <div id="respond"></div>
    </div>
    <div id="column">
      <div id="featured">
       
      </div>
      <div class="holder" id="featured">
         <?php
	 include "rightcol.php";
	 ?>
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
	if($connectDatabase == TRUE){$action=FALSE;include('connect.php');}
 
	header("Location: $errpage");
	exit();
}
?>
