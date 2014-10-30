<?php
	include 'core.php';
	include 'config.php';
	

	
if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged']))) && ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))  
&& ((isset($_SESSION['AccType']))&&(($_SESSION['AccType']) == "doctor"))
				){ 
				
			
			
			require_once("library.php");
				$dobby8 = new DataBase();
				$dobby8->dbconnect();
			
			$user_id = $_SESSION['id'] ;			
					
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
include "header_doc.php";
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
      <h1> <?=  @$_SESSION['userfname']." ". $_SESSION['userlname']. ""?></h1>
      <h2>Search Result</h2>
	  
    <?php
	if(((isset($_POST['textfield']))&&(!empty($_POST['textfield'])))  
				){
				
				?>
				
				 <table summary="Summary Here" cellpadding="0" cellspacing="0" align="center">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Available</th>
          </tr>
		   </thead>
				<?php
				$string  = $_POST['textfield'];
		$getresult = $dobby8->pharmQuery($string);
		$datafromQuery = $getresult[1];
		
		if($getresult != 0){
			foreach ($datafromQuery as $dq){
			$theid =  $dq['id'];
			$thedname =  $dq['drugname'];
			$theAva = $dq['available'];
			
			echo "  
				 <tr class=\"dark\">
				<td>$theid</td>
				<td>$thedname</td>
				<td>$theAva</td>
				</tr>";	
			}
		}else {
			echo " <h1 align=\"center\"> Found Nothing !!!  </h1>" ;
		}
		}else {
			echo " <h1 align=\"center\"> Found Nothing !!!  </h1>" ;
		}
	
	?>
        </tbody>
      </table>
    
     
      <div id="respond"></div>
    </div>
    <div id="column">
      <div id="featured">
        <ul>
          <li>
           
          </li>
        </ul>
      </div>
      <div class="holder" id="featured">
        
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php
include "footer_doc.php";
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
