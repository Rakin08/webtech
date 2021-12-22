<?php
$servername="localhost";
$username="root";
$password="";
$dbname="vital infusion";
$conn=new mysqli($servername,$username,$password,$dbname);
if(isset($_POST['submit'])){
	if(!empty($_POST['order']) && !empty($_POST['details'])){
		$order = $_POST['order'];
		$details = $_POST['details'];
		$price = $_POST['price'];
	$s = "INSERT INTO user(no., details) VALUES('$order', '$details')";
	$q = mysqli_query($conn,$sql) or die (mysqli_error());
	if($q){
		echo "Inserted";
	}
else{
	echo "Not Inserted";
	}
}
}
?>

<html>
	<head>
		<title>Order</title>
		<link rel="stylesheet" href="css/login.css">
		<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	</head>

	<body  style="background-color:#7CB9E8;">
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
	<div class="login-form">
		
		<h1>Order Place</h1>
		<form id="form" class="form">
			<div class="form-control">
				<label for="username"><strong>Order Id:</strong></label>
				<input id="order" name="order" class="input-field" type="text" placeholder="111" />
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small></small>
			</div>
			<div class="form-control" style="margin-top: 7px">
				<label for="username"><strong>Details:</strong></label>
				<input id="details" name="details" class="input-field" type="text" placeholder="title with contact" />
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small></small>
			</div>
			<div class="button-container">
                <input class="submit-button" type="submit" value="submit">
				<button class="submit-button" type="submit" onclick="window.location.href = 'Dboard.php';">Back</button>
            </div>
					
		</form>
	</div>
	<script src='jav.js'></script>
</body>
</html>