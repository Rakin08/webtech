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
	//$str="CREATE TABLE Leo(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL)";
	//$q="CREATE TABLE test(ID int(11) PRIMARY KEY ,OrderNumber int(11) NOT NULL,sid int(11), FOREIGN KEY (sid) REFERENCES user(id))";
	$str="SELECT id,name,email from user1";
	$result=$conn->query($str);
	if($result->num_rows>0)
	{
		?>
		<style> table, th, td { border: 5px solid blue;}
		</style>
		<table >
		<tr>
		<th>Id</th>
        <th>Name</th>
        <th>Email</th>
		</tr>

		<?php
		while($row=$result->fetch_assoc())
		{
			 echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>". $row['email'] ."</td></tr>";
			}
			echo "</table>";
			}
			else
				echo "O results";
			}
	
	/*if($result)
		echo "Table created successfully";
	else
		echo "Error occured";*/
$conn->close();
?>
