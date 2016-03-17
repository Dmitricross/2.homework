<?php require_once("header.php"); ?>



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
        <li class="active"><a href="app.php">App page <span class="sr-only">(current)</span></a></li>
      <li><a href="table2.php">Table <span class="sr-only">(current)</span></a></li>
   
      
          </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


 <div class="container">

 <h1>Homework app</h1>

<form>
<div class="row">
	<div class="col-md-3">
	<div class="form-group">
	<label for="First name">First name:</label>
	<input name="firstname" id="First name" type="text" class="form-control">

	 </div>
	 </div>
 </div>


<div class="row">
	<div class="col-md-3">
	<div class="form-group">
	<label for="Last name">Last name:</label>
	<input name="lastname" id="Last name" type="text" class="form-control">


	 </div>
	 </div>
 </div>


<div class="row">
	<div class="col-md-3">
	<div class="form-group">
	<label for="E_mail">E-mail:</label>
	<input name="e_mail" id="E_mail" type="text" class="form-control">

	 </div>
	 </div>
 </div>


 <div class="row">
	<div class="col-md-3">
	<div class="form-group">
	<label for="Message">Message:</label>
	<input name="message" id="Message" type="text" class="form-control">

	 </div>
	 </div>
 </div>


<h2 style="color:purple">How are you satisfied with my work?</h2>
		
			<select name="result">
				<option value="Satisfied"selected>Satisfied</option>
				<option value="Neutral">Neutral</option>
				<option value="Dissatisfied">Dissatisfied</option>
			</select><br>
	
	<h2 style="color:purple>Get delivery notification</h2>	
	
			<input style="color:purple" type="radio"name="notification"value="Recieve e-mail">Recieve
			<input type="radio"name="subject"value="Recieve>Recieve
			<input type="radio"name="subject"value="Dont recieve">Do not recieve

		<br><br>

<div class="row">
	<div class="col-md-3" "col-sm-6">
	<input class="btn btn-success hidden-xs" type="submit" value="Save data 1"></input>
	<input class="btn btn-success btn-block visible-xs-block" type="submit" value="Save data 2"></input>
	 </div>
</div>	



</div>
</form>



	
	

<!--This is the save button -->


<?php

require_once("../../config.php");
//**************....
//to field validation
//******************
	
	
	//connection with username and password
	//access username from config
	//echo $db_username;
	
	// 1 servername
	// 2 username
	// 3 password
	// 4 database
	
	
	
	
	
$everything_was_okay = true;


if(empty($_GET["firstname"])){
		//it is empty
		echo "Please enter the name!";
		
		}else{
			//its not empty
		echo "Fist name: ".$_GET["firstname"]."<br>";
	}

if(empty($_GET["lastname"])){
		//it is empty
		echo "Please enter the last name!";
		
		}else{
			//its not empty
		echo "Last name: ".$_GET["lastname"]."<br>";
	}

if(isset($_GET["e_mail"])){
	
	
	
	if(empty($_GET["e_mail"])){
		//it is empty
		echo "Please enter e-mail!";
		
		}else{
			//its not empty
		echo "E-mail: ".$_GET["e_mail"]."<br>";
	}
}

if(isset($_GET["result"])){
	
	
	
	if(empty($_GET["result"])){
		//it is empty
		echo "Please enter the result!";
		
		}else{
			//its not empty
		echo "result: ".$_GET["result"]."<br>";
	}
}

//check if there is variable in the URL
if(isset($_GET["message"])){
	
	//only if there is message in the URL
	//echo "there is a message";
	
	if(empty($_GET["message"])){
		//it is empty
		echo "Please enter the message!";
		
		}else{
			//its not empty
		echo "Message: ".$_GET["message"]."<br>";
	}
	
	
}
if(isset($_GET["message"])){
	
	//only if there is message in the URL
	//echo "there is a message";
	
	if(empty($_GET["notification"])){
		//it is empty
		echo "Please mark notification!";
		
		}else{
			//its not empty
		echo "notification: ".$_GET["notification"]."<br>";
	}
	
	
}
 if ($everything_was_okay == true) {
	
	echo "Saving to database ...";
	
	
	//connection with username and password
	//access username from config
	//echo $db_username;
	
	// 1 servername
	// 2 username
	// 3 password
	// 4 database
	
	
	
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_dmikab");
	
	$stmt = $mysql->prepare("INSERT INTO homework (First_Name, Last_Name, E_mail, Message, result, notification) VALUES (?, ?, ?, ?, ?, ?)" );
	
	echo $stmt->error;
	
	//we are replacing question marks with values
	//s - string, data or smth that is based on characters and
	//i - intiger, number
	// d - decimal, float
	$stmt->bind_param("ssssss", $_GET["firstname"], $_GET["lastname"], $_GET["e_mail"], $_GET["message"], $_GET["result"], $_GET["notification"]);
	
	//save
	
	if($stmt->execute()){
		
	echo	"saved succesefully";
	}else{
		
		echo $stmt->error;
		
		
		}	




//Getting the message from address
//$my_message = $_GET["message"];
//$to = $_GET["to"];
//$from = $_GET["from"];

//echo "My message is ".$my_message." and is to ".$to." and is from ".$from;


}



?>




</body>
</html>