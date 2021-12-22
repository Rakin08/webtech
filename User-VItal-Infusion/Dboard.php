<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
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
			$pn=$value['Phone Number'];
            $Image=$value['Image']; 
            $Gender=$value['Gender'];
            $Username=$value['Username']; 
            $DOB=$value['DOB'];
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

        <div style="width: 95%; height: 95%; display: flex; justify-content: center; align-items: center;">
            <?php
                echo " <b><h3>Welcome,</h3> <h1>".$Name."</h1><b>";
            ?>
        </div>
    </div>
</body>
</html>