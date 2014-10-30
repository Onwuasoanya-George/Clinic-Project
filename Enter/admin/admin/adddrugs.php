<?php
	include 'core.php';
	include 'config.php';
	

	
if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged']))) && ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))  
				){ 
				

			$user_id = $_SESSION['id'] ;
			
			if(@$_POST['submitID'] == 1){
			
				require_once("library.php");
					$draco5 = new DataBase();
					$draco5->dbconnect();
					$getType = $_POST['inserttoken'];
					
						 $eQuery = "
						 
						 INSERT INTO  `pharm` (
								`id` ,
								`drugname` ,
								`available`
								)
								VALUES (
								NULL ,  '$getType',  'true'
								);
								";
						 
						 
						 $e_solution = $draco5->insert_db($eQuery);
						 $sent_message = " Drug have been inserted ";
						 /* Disconnect from database */
							$draco5->dbclose();
			}
					
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
                    <h1 class="page-header">Add Drug</h1>
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
							
	 	
					<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="application/x-www-form-urlencoded" 	name="del">   
			    	<P >   &nbsp;&nbsp;&nbsp;Enter Name of Drug: </P>
            	<input name="inserttoken" type="text" required></input>
				<input id="submitID" name="submitID" type="hidden" value="1" />
					<input type= "submit"   value="&nbsp;&nbsp;&nbsp;Add to Drug store" />
			    	
				</form>
		
		 <?php  
  // display any error crap
   if(!(@$sent_message == NULL))
  {
			echo "<br /> <table width=\"100%\"  border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#0F0\">
						<tr>
							<td><div align=\"center\"><strong>
							<font color=\"#000\">";
				echo @$sent_message ;
			echo			"</font></strong></div></td>
						</tr>
					</table> ";
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