	<?php

         // define variables and set to empty values
         $name = $email = $password = $phone = $err = "";
         if (empty($_POST["name"]) || empty($_POST["email"]) ||!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($_POST["password"]) ||empty($_POST["phone"]) ||!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST["phone"])){
            if (empty($_POST["name"])) {
               $err.="Name empty ";
            }else {
               $name = test_input($_POST["name"]);
            }
            
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
                $err.="Password empty ";
            }else {
               $password = test_input($_POST["password"]);
            }
			 
		if (empty($_POST["phone"])) {
           $err.="Phone empty";
        }else if (preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST["phone"])) {
        $phone = test_input($_POST["phone"]);
        } 
		else {           
			  $err.="Phone is not in proper format 000-000-0000 ";
          
        }
//			 header("Location:both.php");
//			 exit();
			 echo '<script>
			 window.location.href = "both.php";
			 alert("There are some errors: '.$err.'")</script>'; 
        }
		else{
			header("Location:index.html");
			exit();
		}
         
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>