<div class="wrapper col1">
  <div id="head">
    <h1><a href="#"> The Clinic</a></h1>
    <p> Doctor portal</p>
    <div id="topnav">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="thedrugs.php">Drug Store</a></li>
        <li ><a href="appointment.php">Appointments</a></li>
        <li ><a href="messages.php">Messages</a></li>
		<li ><a class="last" href="logoff.php">Logout</a></li>
      </ul>
    </div>
    <div id="search">
      <form action="drugstore.php" method="post">
        <fieldset>
          <legend>Drug Store Search</legend>
          <input type="submit" name="go" id="go" value="GO" />
          <input  name = "textfield"  type="text" value="Search the store&hellip;" 
		  onfocus="this.value=(this.value=='Search the store&hellip;')? '' : this.value ;" />
        </fieldset>
      </form>
    </div>
  </div>
</div>