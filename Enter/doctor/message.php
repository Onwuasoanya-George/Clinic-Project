<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	background-image: url(../loginpage_images/bg.png);
}
#prop{
	background-color:#09C;
	width: auto;
	height:auto;
	
	
	
	}
#prop table tr td p strong {
	font-size: xx-large;
}
#prop table tr td #area {
	font-size: large;
}
#prop table tr td #area #speciality {
	font-size: xx-large;
}
#speciality {
	font-size: xx-large;
}
#speciality {
	font-weight: bold;
}
</style>
</head>

<body>
 <div align="center" id="prop" >
   <span id="speciality">One More thing</span>
<table width="552" border="1">
  <tr>
    <td width="340"  > <p>&nbsp;</p>
      <p><strong>You need to tell us your Speciality</strong></p>
      <p>&nbsp;</p>
      <form  action="updateDoc.php" method="post" enctype="multipart/form-data" name="area"  id="area">
        <label for="speciality">   <span id="speciality">My Speciality</span>:  </label>
        <select name="speciality" id="speciality">
        <option> Nurse </option>
        <option> Opticain </option>
        <option> Dentist </option>
        <option> Pediatric </option>
        <option selected="selected"> Surgeon </option>
        </select>
      </form></td>
  </tr>
</table>

</div>
</body>
</html>
