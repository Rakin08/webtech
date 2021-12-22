<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SignUp - Vital Infusion</title>
    <link rel="stylesheet" href="css/signup.css">
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

include 'Controller/valid.php';

?>
			<br></br>
			<div class="signup-form">
                <h1>SIGN UP</u></h1><br><br>
                <img src="images/logo.png" alt="" height="100px" style="position:absolute; top: 30px;">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                
                <div class="inputs-container">
                    <div>
                        <label ><b>Enter Your Name:</b>&nbsp;</label><br>
                        <input class="input-field" type="text" id="name" name="name"  placeholder="Your Name" size="10" value="<?php echo $name;?>">
               
                        <?php 
                        if ($nameErr != "") 
                        {
                            echo "* ";
                            echo $nameErr;
                        }
                        ?>
                    </div>

                    <div>
                        <label ><b>Enter Phone Number</b>&nbsp;</label><br>
                        <input class="input-field" type="numeric" id="pn" name="pn"  placeholder="Phone Number" size="11" value="<?php echo $pn;?>">
               
                        <?php 
                        if ($pnErr != "") 
                        {
                            echo "* ";
                            echo $pnErr;
                        }
                        ?>
                    </div>

                    <div>
                        <label><b>Enter Your Email</b>&nbsp; </label><br>
                        <input class="input-field" type="text" id="email" name="email" value="<?php echo $email;?>" placeholder="someone@example.com">
                        <?php if ($emailErr != "") 
                            {
                            echo "*";
                            echo $emailErr;
                        }
                        ?>
                    </div>

                    <div>
                        <label><b>Enter User Name</b></label><br>
                        <input class="input-field" type="text" name = "un" value="<?php echo $un;?>"placeholder="Your username">
                            <?php if ($unErr != "") 
                            {
                            echo "*";
                            echo $unErr;
                        }
                        ?>
                    </div>

                    <div>
                        <label><b>Enter Password</b></label><br>
                        <input class="input-field" type="password" name = "pass" value="<?php echo $pass;?>" placeholder="Password" >
                        <?php if ($passErr != "") 
                            {
                            echo "*";
                            echo $passErr;
                        }
                        ?>
                    </div>

                    <div>
                        <label><b>Re-enter Password</b></label><br>
                        <input class="input-field" type="password" name = "Cpass" value="<?php echo $Cpass;?>"placeholder="confirm Password">
                        <?php if ($CpassErr != "") 
                            {
                            echo "*";
                            echo $CpassErr;
                        }
                        ?>
                    </div>

                    <div>
                        <label><b>Enter Your Gender</b>&nbsp;</label><br>

                        <div style="margin-top: 10px">
                            <input type="radio" id="gender" name="gender"<?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">
                            <label for="">Male</label> 

                            <input type="radio" id="gender" name="gender"<?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> 
                            <label for=" ">Female</label> 

                            <input type="radio" id="gender" name="gender"<?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"> 
                            <label for="">Other</label> 
                            <?php 
                            if($genderErr)
                            {  
                                echo "* ";
                                echo $genderErr;

                                    }
                            ?>
                        </div>
                    </div>

                    <div>
                        <label><b>Date of Birth</b>&nbsp;</label><br>
                        <input class="input-field" type="date" name="dob" value="<?php echo $dob;?>">

                        <?php 
                        if($dobErr)
                        {  
                            echo "* ";
                            echo $dobErr;

                                }
                        ?>
                    </div>
                    <div>
                        <label><b>Enter Profile Picture</b>&nbsp;</label>

                        <input style="margin: 5px" type="file" name="fileToUpload" id="fileToUpload">
                        <img src="<?php if(!empty($filepath)){echo $filepath;}else{ echo "images/default.jpg";} ?>" alt="" width="100px" height="100px"><br></br>
                        <?php
                            if ($ImgErr) {
                                echo ($ImgErr);
                            }
                        ?>
                    </div>
                </div>
                <div class="button-container">
                    <input class="submit-button" type="submit" value="Submit">
                </div>

                <p class="text-button">Already Have An Account? <a href="Login.php">Login Now.</a></p>
                        
			    <?php
                    if (isset($insertion)) 
                    {
                        echo "<span style='color:brown'><b>" . $insertion . "</b></span><br>";
                    }
                ?>
            </form>
			<br>
			</div>
</body>
</html>