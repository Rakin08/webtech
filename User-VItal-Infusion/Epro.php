<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Profile</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body style="background-color:#7CB9E8;">

<?php

include 'Controller/es.php';

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
            <h3 style="text-decoration: underline; margin-bottom: 15px; text-align: center; font-weight: 800; color: #289bf3">Edit Profile</h3>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

          	    <label ><b>Your Name</b>&nbsp;</label><br>
                <input class="input-field" type="text" id="name" name="name"  placeholder="Your name" size="10" value="<?php echo $name;?>">
               
                    <?php 
                    if ($nameErr != "") 
                    {
                        echo "* ";
                        echo $nameErr;
                    }
                    ?>
                <br> <br>
				<label ><b>Phone Number</b>&nbsp;</label><br>
                <input class="input-field" type="numeric" id="pn" name="pn"  placeholder="Phone Number" size="11" value="<?php echo $pn;?>">
               
                    <?php 
                    if ($pnErr != "") 
                    {
                        echo "* ";
                        echo $pnErr;
                    }
                    ?>

                <br> <br>
                <label><b>Your Email</b>&nbsp; </label> <br>
                <input class="input-field" type="text" id="email" name="email" value="<?php echo $email;?>" placeholder="Your email">
                    <?php if ($emailErr != "") 
                        {
                        echo "*";
                        echo $emailErr;
                    }
                    ?>

                <br> <br>
                <label><b>Gender</b>&nbsp;</label><br>

                <input  style="margin-top: 10px; margin-right: 3px" type="radio" id="gender" name="gender"<?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">
                <label for="" style="margin-right: 20px">Male</label> 

                <input style="margin-right: 3px" type="radio" id="gender" name="gender"<?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> 
                <label for=" " style="margin-right: 20px">Female</label> 

                <input style="margin-right: 3px" type="radio" id="gender" name="gender"<?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"> 
                <label for="">Other</label> 
                <?php 
               if($genderErr)
               {  
                echo "* ";
                echo $genderErr;

                    }
                ?>
                

                <br> <br>
                <label><b>Date of Birth</b>&nbsp;</label> <br>
                <input class="input-field" type="date" name="dob" value="<?php echo $dob;?>">

                    <?php 
               if($dobErr)
               {  
                echo "* ";
                echo $dobErr;

                    }
                ?>

                <div class="button-container">
                    <input class="submit-button" type="submit" value="Submit">
                </div>

                </form>
                <?php
            if (isset($message)) 
            {
                echo "<span style='color:brown'><b>" . $message . "</b></span><br>";
            }
            ?>
        </div>
    </div>

	
</body>
</html>