<?php
$servername="localhost";
$username="root";
$password="";
$dbname="vital infusion";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
die("Connection failed:".$conn->connect_error);
}
else
{
echo "Successfull connection"."<br>";
//$str="CREATE TABLE Users(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL)";
$str="CREATE TABLE Teacher(ID int NOT NULL,
email VARCHAR(30) NOT NULL,
UID int,
PRIMARY KEY (ID),
FOREIGN KEY (UID) REFERENCES Users(ID));";
$result=$conn->query($str);
if($result)
echo "Table created successfully";
else
echo "Error occured";
}
$conn->close();
?>