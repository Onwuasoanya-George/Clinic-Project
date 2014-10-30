
<?php
require_once("library.php");
$dobbyg = new DataBase();
$dobbyg->dbconnect();

$strin2getMessageusers = "SELECT `id`, `message` ,  `userid` ,  `date` 
FROM  `messagesfromusers` 
WHERE  `docId` = '$user_id' and `deleated` = 'false'
ORDER BY  `messagesfromusers`.`date` DESC 
Limit 0,1";


//
echo "<h1>Resent Message From Users</h1>";
$messUsers = $dobbyg->select_from_db("$strin2getMessageusers");
$themess = $messUsers[1];
foreach ($themess as $mes){
			$name = $dobbyg->getUsername($mes['userid']);
			$msg = $mes['message'];
			$dd = $mes['date'];
			$id2 = $mes['id'];
	echo " <li class=\"comment_even\">
            <div class=\"author\"><span class=\"name\"><a href=\"#\"> $name</a></span> <span class=\"wrote\">wrote:</span></div>
            <div class=\"submitdate\"><a href=\"#\">$dd</a></div>
            <p>$msg</p>
			<form  action=\"dper.php\" method=\"POST\" enctype=\"application/x-www-form-urlencoded\" 	name=\"del\">   
			    	<input type=\"submit\"   value=\"Delete\" />
            	<input name=\"deltoken\" type=\"hidden\"  value=\"$id2\">
				<input name=\"fromtype\" type=\"hidden\"  value=\"staff\">
				</form>
          </li>";
}
//?>
<p>&nbsp;</p>
        <p class="readmore"><a href="messages.php">All Messages &raquo;</a></p><br/>


<?php
echo "<h1>Resent Message from Staffs</h1>";
$strin2getMessagestaff = "SELECT `id`, `message` ,  `staffId` ,`docid` ,  `date` 
FROM  `messagesfromstaff` 
WHERE  `docId` = '$user_id' and `deleated` = 'false'
ORDER BY  `messagesfromstaff`.`date` DESC 
Limit 0,1";
$messStf = $dobbyg->select_from_db("$strin2getMessagestaff");
$themessStf = $messStf[1];
foreach ($themessStf as $mes){
			$name = $dobbyg->getDocname($mes['staffId']);
			$msg = $mes['message'];
			$dd = $mes['date'];
			$id = $mes['date'];
	echo " <li class=\"comment_even\">
            <div class=\"author\"><span class=\"name\"><a href=\"#\"> $name</a></span> <span class=\"wrote\">wrote:</span></div>
            <div class=\"submitdate\"><a href=\"#\">$dd</a></div>
            <p>$msg</p>
			<form  action=\"dper.php\" method=\"POST\" enctype=\"application/x-www-form-urlencoded\" 	name=\"del\">   
			    	<input type=\"submit\"   value=\"Delete\" />
            	<input name=\"deltoken\" type=\"hidden\"  value=\"$id\">
				<input name=\"fromtype\" type=\"hidden\"  value=\"staff\">
				</form>
          </li>";
}



?>
<p>&nbsp;</p>
        <p class="readmore"><a href="messages.php">All Messages &raquo;</a></p>
