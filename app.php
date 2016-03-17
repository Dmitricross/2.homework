
<html>
<head>
<body bgcolor="#908483"> 
<img src="http://www.tlu.ee/UserFiles/thumbs/__thumb_-2-BFM-logo-suur-EST.jpg";>
<h1 style="color:#e4e4e4"> Leave your feedback </h1>
</head>
<style>

label  {color: #e4e4e4;}
echo {color: #e4e4e4;}
</style>
   
  <body> 

<a href ="table2.php">table</a> 
 
<form method="get">





	<label for="firstname">First name<label><br>
  <input type="text" name="firstname"><br>
  
 <label for="lastname">Last name<label><br>
  <input type="text" name="lastname"><br>

 <label for="e-mail">E-mail<label><br>
  <input type="text" name="e-mail"><br><br>
  
<label for="message">Message:*<label><br>
<input type="text" name="message"><br><br>

<h2 style="color:#F5F1ED">How are you satisfied with my work?</h2>
		
			<select name="Result">
				<option value="Satisfied"selected>Satisfied</option>
				<option value="Neutral">Neutral</option>
				<option value="Dissatisfied">Dissatisfied</option>
			</select><br>
	
	<h2 style="color:#F5F1ED">Get delivery notification</h2>	
	
	<form style="color:#e4e4e4">
			<input style="color:#e4e4e4" type="radio"name="subject"value="Recieve e-mail">Recieve
			<input type="radio"name="subject"value="Dont recieve">Do not recieve
		</form><br><br>

	
	

<!--This is the save button -->
<input type="submit" value="Submit feedback"

	
<form><br>

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
	
	
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_dmikab");
	
	$stmt = $mysql->prepare("INSERT INTO homework (First_Name, Last_Name, E_mail, Message) VALUES (?, ?, ?, ?)" );
	
	echo $stmt->error;
	
	//we are replacing question marks with values
	//s - string, data or smth that is based on characters and
	//i - intiger, number
	// d - decimal, float
	$stmt->bind_param("ssss", $_GET["firstname"], $_GET["lastname"], $_GET["e-mail"], $_GET["message"]);
	
	//save
	
	if($stmt->execute()){
		
	echo	"saved succesefully";
	}else{
		
		echo $stmt->error;
		
		
		}	
	
	
	



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

if(isset($_GET["e-mail"])){
	
	
	
	if(empty($_GET["e-mail"])){
		//it is empty
		echo "Please enter e-mail!";
		
		}else{
			//its not empty
		echo "E-mail: ".$_GET["e-mail"]."<br>";
	}
}

if(isset($_GET["Result"])){
	
	
	
	if(empty($_GET["Result"])){
		//it is empty
		echo "Please enter the result!";
		
		}else{
			//its not empty
		echo "Result: ".$_GET["Result"]."<br>";
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





//Getting the message from address
//$my_message = $_GET["message"];
//$to = $_GET["to"];
//$from = $_GET["from"];

//echo "My message is ".$my_message." and is to ".$to." and is from ".$from;






?>




</body>
</html>