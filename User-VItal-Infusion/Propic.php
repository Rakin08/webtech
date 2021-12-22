<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Profile Picture</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body style="background-color:#7CB9E8;">
	<?php
    session_start();
    $ImgErr=$Name=$Image="";
    $isset=false;

    if(isset($_SESSION['un'])){
        $currentdata = file_get_contents("Model/information.json");  
        $currentdata = json_decode($currentdata, true); 
        foreach($currentdata as $key=>$value){
            if($value['Username']==$_SESSION["un"])
            {
            $Name=$value['Name'];
			$pn= $value['Phone Number'];
            $oldImage=$value['Image']; 
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

	$pictureErr= "";
    $ImgErr = $UploadConfirmation = "";
    $target_file="";

    if(isset($_POST['submit'])){
        $target_dir = "Picture/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
       
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $filepath = "";    
        if($_FILES['fileToUpload']['name'] != "")
        {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                
                $uploaded = 1;
            } else {
                $ImgErr = "File is not an image.";
                $uploaded = 0;
            }
        
            if (file_exists($target_file)) {
                $ImgErr = "Sorry, file already exists.";
                $uploaded = 0;
            }
        
            if ($_FILES["fileToUpload"]["size"] > 40000000000) {
                $ImgErr = "Sorry, this file is too large.";
                $uploaded = 0;
            }
        
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $ImgErr= "Only JPG, JPEG, PNG  files can be uploaded.";
                $uploaded = 0;
            }
        
            if ($uploadOk == 0) {
                $ImgErr = "Sorry, your file was not uploaded.";
            } 
            else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $UploadConfirmation = "File has been uploaded Successfully";

                    $filepath = $target_dir . htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
                    $data = file_get_contents("Model/information.json");

                    $data = json_decode($data, true);

                    if (!empty($data)) {

                        foreach ($data as $key => $row) {

                            if ($row["Username"] == $_SESSION['un']) {

                                $data[$key]['Image'] = $filepath;

                                $_SESSION['Image'] = $filepath;
                                $Image=$filepath;

                                break;

                            }

                        }



                        file_put_contents('Model/information.json', json_encode($data));

                    }
                } else {
                    $ImgErr = "Sorry, there was an error uploading your file.";
                }
            }
        }else{
            $ImgErr="Select an image!";
        }
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
                <img class="intro2" src="<?php if(empty($Image)){echo $oldImage;}else{echo $Image;} ?>" width="120px" height="120px"><br><br>
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
            <h3 style="text-decoration: underline; margin-bottom: 15px; text-align: center; font-weight: 800; color: #289bf3">Change Profile Picute</h3>

            <form style="text-align: center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

                <img src="<?php if(!empty($filepath)){echo $filepath;}else{ echo $oldImage;} ?>" alt="" width="300px" height="300px"><br>
                <?php
                    if ($ImgErr) {
                        echo ($ImgErr);
                    }
                    ?>
                    
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <hr>
                

                <div class="button-container">
                    <input class="submit-button" type="submit" value="Submit" name="submit">
                </div>

            </form>
        </div>
    </div>


</body>
</html>