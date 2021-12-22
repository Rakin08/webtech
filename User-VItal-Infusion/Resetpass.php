<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Password Reset</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body style="background-color:#7CB9E8;">

    <nav>
        <div class="logo">
            <div>
                <img class="logo-image" src="images/logo.png" alt="">
            </div>
            <h2 class="logo-name">Vital Infusion</h2>
        </div>
        <ul>
            <li><a href="Homepage.php">Home</a></li>
            <li><a href="Login.php">Login</a></li>
            <li><a href="Signup.php">Signup</a></li>
        </ul>
    </nav>

<?php
	$email="";
	$emailErr=$Confirm_msg=$Errmsg="";
	 if (($_SERVER["REQUEST_METHOD"] == "POST"))
	 	
	 {
	 	$Email= $_POST['email'];
	 	if (empty($_POST["email"])) 
        {
            $emailErr = "Email is required";
        } 


        else 
        {
            $email = test_Input($_POST["email"]);
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
         {
            $emailErr= "Invalid Email !";
        }
    }

    $isset=false;

    if($emailErr==""){
        $c_content = file_get_contents("Model/information.json");  
        $c_content= json_decode($c_content, true); 
        foreach($c_content as $key=>$value){
            if($value['Email']==$Email){
            $isset=true;
            break;
            }
        }
        if($isset){
             $Confirm_msg="A verification code sent to your email";
        }
        else{
             $Errmsg="Email address did not match";
        }
    }
    
  }
     function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


?>
        <br></br>
		<div class="login-form">
            <div class="login-image">
                <img src="images/Elegant.png" alt="" height="200px">
            </div>
		<br><h1>Reset Password</h1><br>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
              	 <label><b>Enter Your Email:</b>&nbsp; </label>
                <input class="input-field" placeholder="someone@example.com" type="text" id="email" name="email" >
                 <?php
                     if($emailErr!="")
                     {
                        echo "*";
                        echo  $emailErr;
                     }
                     else if($Errmsg!=""){
                         echo "*";
                         echo $Errmsg;
                     }
                     ?>

                <hr>
                    <div class="button-container">
                        <input class="submit-button button1" type="submit" value="Submit" name="submit">
                    </div>
                 <br>
                  <?php
                 if($Confirm_msg!=""){
                     echo $Confirm_msg;
                 }
                 ?>
	             
		</form>
		<br>
		</div>

</body>
</html>