<?php
$email = $password = $err = "";
//if(empty($_POST["email"]) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($_POST["password"])){
	
	 if (empty($_POST["email"])) {
               $err.="Email empty ";
     }else {
	   $email = test_input($_POST["email"]);

	   // check if e-mail address is well-formed
	   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $err.="Invalid email format ";
	   }
	 }
		 if (empty($_POST["password"])) {
              $err.="Password empty";
    }else {
		 		
               $password = test_input($_POST["password"]);
            }
	if($err!=""){
			 echo '<script>
			 window.location.href = "both.php";
			 alert("There are some errors: '.$err.'")</script>'; 
	}
	$user=$_POST["email"]." ".$_POST["password"];   
    $users=file_get_contents("users.html");
    if(str_contains($users,$user)){ 
      header("Location:index.html");
		}else
		echo '<script>
			 window.location.href = "both.php";
			 alert("Invalid Login")</script>';
	
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>