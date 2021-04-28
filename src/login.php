<?php
$email = $password ="";
if(empty($_POST["email"]) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($_POST["password"])){
	
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
			 echo '<script>
			 window.location.href = "both.php";
			 alert("There are some errors: '.$err.'")</script>'; 
        }
        
         else{
			header("Location:index.html");
		}
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>