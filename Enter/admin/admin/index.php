<?php
	include 'core.php';
	include 'config.php';
	

	
if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged']))) && ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))  
				){ 
				

			$user_id = $_SESSION['id'] ;
					
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Clinic</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

   
    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php
		
		include "header_admin.php";
		?>

            <div class="navbar-default navbar-static-side" role="navigation">
               <?php
			   include "side_nav.php";
			   ?>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Doctors
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="row">
                            <div >
                                    <div class="table-responsive">
									
										<?php
		 require_once("library.php");
	  $dobbybb = new DataBase();
	   //connect to db
	  $dobbybb->dbconnect();
	  
	  $theSel = "select * from doctor
		limit 0,5
	  ";
	  $gtDocN = $dobbybb->select_from_db($theSel);
	  $getDoc = $gtDocN[1];
	  $getD = $gtDocN[0];
	  $nD = $dobbybb->countdoc();
	  echo "
	  Total Registered Doctors is/are $nD  <br /><br />
	  
	  <table width=\"670px\" border=\"10\">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
													 <th>Email</th>
													 <th>Phone</th>
                                                    <th>Verified</th>
                                                    <th>Released</th> 
                                                </tr>
                                            </thead>
                                            <tbody>";
	foreach( $getDoc as $gd){
	 $fnamee = $gd['fname'];
	 $namee =  $gd['lname'];
	 $emailee = $gd['email'];
	 $phoneee = $gd['phone'];
	 $veree = $gd['verified'] ;
	  $releee = $gd['released'] ;
		echo "
		
		<tr>
		
			
			<td > $fnamee $namee</td>
			<td>$emailee</td>
			<td>$phoneee</td>
			<td>$veree</td>
			<td>$releee</td>
			
		</tr>
		 ";	 
	 }
	 	
	 
		?>
		
                                        
                                               
                                            </tbody>
                                        </table>
                                    </div>
									<br />
									<p> <a href="alldoctors.php"> View all</a>&nbsp;</p>
									<br /><br /><br />
                                    <!-- /.table-responsive -->
                              </div>
                                <p>&nbsp;</p>
                               
                          </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  <div >
                        
                        
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Users
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-4">

                                    <div class="table-responsive">
                                        
											<?php
		 require_once("library.php");
	  $dobbybb = new DataBase();
	   //connect to db
	  $dobbybb->dbconnect();
	  $theSel = "select * from users 
limit 0,5	  ";
	  $gtDocN = $dobbybb->select_from_db($theSel);
	  $getDoc = $gtDocN[1];
	  $getD = $gtDocN[0];
	$nD = $dobbybb->countdoc();
	  echo "
	  Total Registered Doctors is/are $nD  <br /><br />
	  
	  <table width=\"670px\" border=\"10\">
                                            <thead>
                                                <tr>
                                                    <th >Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
	foreach( $getDoc as $gd){
	 $fnamee = $gd['fname'];
	 $namee =  $gd['lname'];
	 $emailee = $gd['email'];
	 $phoneee = $gd['phone'] ;
		echo "
		
		<tr>
		
			
			<td > $fnamee $namee</td>
			<td>$emailee</td>
			<td>$phoneee</td>
		</tr>
		 ";	 
	 }
	 	
	 
		?>
                                                
                                              
                                               
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                            </div>
                                <p> <a href="allusers.php"> View all</a>&nbsp;</p>
                               
                          </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  
                    <!-- /.panel -->
                </div>
                     
                    <!-- /.panel -->
                </div>
                
                
                <!-- /.col-lg-8 -->
                
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

   

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

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