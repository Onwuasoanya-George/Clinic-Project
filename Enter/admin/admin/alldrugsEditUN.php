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
                    <h1 class="page-header">All Unavailable Drugs</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Drugs
                            
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
	  
	  $theSel = "select * from pharm where available = 'false'
		
	  ";
	  $gtDocN = $dobbybb->select_from_db($theSel);
	  $getDoc = $gtDocN[1];
	  $getD = $gtDocN[0];
	  echo "
	  Total Drugs  are $getD  <br /><br /> 
	  
	  <table width=\"400px\" border=\"10\">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;&nbsp;Name</th>
													 <th>&nbsp;&nbsp;Option</th>
													 
                                                </tr>
                                            </thead>
                                            <tbody>";
	foreach( $getDoc as $gd){
	 $fnamee = $gd['drugname'];	 
	  $id2 = $gd['id'] ;
		echo "
		
		<tr>
		
			
			<td >&nbsp;&nbsp; $fnamee</td>
			<td>&nbsp;&nbsp;
			<form  action=\"edit_MU.php\" method=\"POST\" enctype=\"application/x-www-form-urlencoded\" 	name=\"del\">   
			    	<input type=\"submit\"   value=\"Set Available\" />
            	<input name=\"deltoken\" type=\"hidden\"  value=\"$id2\">
				<input name=\"fromtype\" type=\"hidden\"  value=\"staff\">
				</form>
			</td>
			
			
		</tr>
		 ";	 
	 }
	 	
	 
		?>
		
                                        
                                               
                                            </tbody>
                                        </table>
                                    </div>
									<br />
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
                  <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        
                      <!-- /.panel-body -->
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