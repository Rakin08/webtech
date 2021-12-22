<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>View Profile</title>
	<link rel="stylesheet" href="css/dashboard.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body style="background-color:#7CB9E8;">
	<?php
	session_start();
    $isset=false;

    if(isset($_SESSION['un']))
    {
        $current = file_get_contents("Model/information.json");  
        $current = json_decode($current, true); 
        foreach($current as $key=>$value){
            if($value['Username']==$_SESSION["un"])
            {
            $Name=$value['Name'];
			$pn= $value['Phone Number'];
            $Image=$value['Image']; 
            $Gender=$value['Gender'];
            $Username=$value['Username']; 
            $DOB=$value['DOB'];
            $Email=$value['Email'];
            $isset=true;
            break;
            }
        }
        if($isset){
             $Confirm_msg="";
        }else{
             $Errmsg="Something did not match";
        }

    }
	?>
	
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

    <br></br>

    <div class="full-dashboard">
        <div class="sidebar">
            <div style=" font-weight: bold; padding-left: 15px; padding-top: 15px;">
                <?php   
                echo "Logged in as <br>".$Name;
                ?>

                <br> <br>
                <img class="intro2" src="<?php echo $Image ?>" width="120px" height="120px"><br><br>
            </div>
            <ul>
                <li><a href="Dboard.php">Dashboard</a></li>
                <li><a href="Viewpro.php">View Profile</a></li>
                <li><a href="Epro.php">Edit Profile</a></li>
                <li><a href="Electriain.html">Get Electrician</a></li>
                <li><a href="maid.html">Get Maid</a></li>
                <li><a href="Mechanic.html">Get Mechanic</a></li>
				<li><a href="order.php">Order</a></li>
                <li><a href="Propic.php">Change Profile Picture</a></li>
                <li><a href="Cpass.php">Change Password</a></li>
                <li><a href="Login.php">Log out</a></li>
            </ul>
        </div>

        <div class="dboard-content">
            <h3 style="text-decoration: underline; margin-bottom: 15px">Profile</h3>
            <img class="intro2" src="<?php echo $Image ?>" width="150px" height="150px"><br><br>
            <?php

                echo "Name           : ".$Name."<br><br>";
                echo "Phone Number           : ".$pn."<br><br>";
                echo "Email           : ".$Email."<br><br>";
                echo "Username       : ".$Username."<br><br>";
                echo "Gender         : ".$Gender."<br><br>";
                echo "Date of Birth  : ".$DOB."<br><br>";
            ?>
<p id="main">Balance</p>
            <a href="Epro.php" style="font-weight: bold; color: #289bf3;">Edit Profile</a>
        </div>
		
	<button onclick="load()">Check</button></br></br>
	<script>
	 function load(){
	 var x=new XMLHttpRequest();
	 x.onreadystatechange=function(){
	  if(this.readyState==4 && this.status==200)
	  {
		document.getElementById("main").innerHTML=this.responseText;
	  }
	 }; 
	 x.open('GET','contact.txt',true);
	 x.send();
	 }
	</script>
    </div>
	
</body>
</html>