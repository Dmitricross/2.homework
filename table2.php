
<?php require_once ("header.php"); ?>
<?php
	
	//table
	//getting out confing
	
	require_once("../../config.php");
	
	//create connection to database
	
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_dmikab");
	
	//SQL sentence

	if(isset($_GET["delete"])) {


		echo "Deleting row with id:".$_GET["delete"];

		$stmt = $mysql->prepare("Update homework SET deleted=NOW() Where id = ?");

		echo $mysql->error;

		//replace the ?
		$stmt->bind_param("i", $_GET["delete"]);
		
		if($stmt->execute()) {

			echo "deleted successfully";
		}else{

			echo $stmt->error;
		}

		//close the statement, so others can use connection

		$stmt->close();
	}
	
	$stmt = $mysql->prepare("SELECT id, First_Name, Last_Name, E_mail, Message, result, notification FROM homework WHERE deleted IS NULL ORDER BY created DESC LIMIT 10");
	
	//if error in sentense
	
	echo $mysql->error;
	
	$stmt->bind_result( $id, $First_Name, $Last_Name, $E_mail, $Message, $result, $notification);
	
	$stmt->execute();

	$table_html = "";

$table_html .="<table class='table table-striped'>";
$table_html .="<tr>";
$table_html .="<th>Fist name</th>";
$table_html .="<th>Last Name</th>";
$table_html .="<th>E-mail</th>";
$table_html .="<th>Message</th>";
$table_html .="<th>Result</th>";
$table_html .="<th>notification</th>";
$table_html .="<th>Delete</th>";
$table_html .="</tr>";


	
	//Get result
	//we have multiple rows
	while($stmt->fetch()){


		$table_html .="<tr>";
	$table_html .= "<td>".$First_Name."</td>";
		$table_html .= "<td>".$Last_Name."</td>";
		$table_html .= "<td>".$E_mail."</td>";
		$table_html .= "<td>".$Message."</td>";
		$table_html .= "<td>".$result."</td>";
		$table_html .= "<td>".$notification."</td>";
		$table_html .= "<td><a class='btn btn-danger' href='?delete=".$id."'>x</a></td>";
		$table_html .="</tr>"; //end row
		
		//DO something for EACH ROW
		
		//echo $id."  ".$message."<br>";
		
		}
		$table_html .="</table>";
		
	
	
	?>





<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="app.php">App page <span class="sr-only">(current)</span></a></li>
      <li class="active"><a href="table2.php">Table <span class="sr-only">(current)</span></a></li>
   
      
          </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


 <div class="container">

 <h1>This is the table page</h1>
<?php 

echo $table_html;
?>

 </div>










</body>
</html>