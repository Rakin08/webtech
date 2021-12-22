<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Password</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body style="background-color:#7CB9E8;">
		
<?php

include 'Controller/cs.php';

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

        <div class="dboard-content">
            <h3 style="text-decoration: underline; margin-bottom: 15px; text-align: center; font-weight: 800; color: #289bf3">Change Password</h3>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <label><b>Enter Current Password:</b></label>       
                <input class="input-field" type="password" name="currpass" autocomplete="current-password" required="" 
              id="id_password"value="<?php echo $currpass;?>">
                         <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                         <?php if ($currpassErr != "") 
                            {
                            echo "*";
                            echo $currpassErr;
                        }
                        ?>
                        <script > const togglePassword = document.querySelector('#togglePassword');
                const password = document.querySelector('#id_password');
      
     
      togglePassword.addEventListener('click', function (e) {
        
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        this.classList.toggle('fa-eye-slash');
    });
    </script>
                        
                        <br></br>


                         <label><b style="color: green;">Enter New Password:</b></label>
                                  
              <input class="input-field" type="password" name="newpass" autocomplete="current-password" required="" 
              id="n_password"value="<?php echo $newpass;?>">
                         
                         <?php if ($newpassErr != "") 
                            {
                            echo "*";
                            echo $newpassErr;
                        }
                        ?>
                        
                        <br></br>
                        
                            <label><b style="color: red;">Retype New Password:</b></label>
                    <input class="input-field" type="password" name="rnewpass" autocomplete="retype-password" required="" id="r_password"value="<?php echo $rnewpass;?>">
                    <?php if ($rnewpassErr != "") 
                            {
                            echo "*";
                            echo $rnewpassErr;
                        }
                        ?>
                           <br>
                            
                        <div class="button-container">
                            <input class="submit-button" type="submit" value="Submit" name="submit">
                        </div>
                        
                    <?php
                        if (isset($message)) 
                            {
                                echo "<span style='color:brown'><b>" . $message . "</b></span><br>";
                            }
                    ?>               
           </form>
        </div>
    </div>

</body>
</html>