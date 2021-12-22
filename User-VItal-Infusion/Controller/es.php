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
            $Gender=$value['Gender'];
            $Image=$value['Image'];
             
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
    $nameErr =$pnErr=$emailErr=$genderErr=$dobErr="";
    $name = $pn = $email =$gender=$dob="";
    $Username=$_SESSION["un"];

     if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
         $name_count = $_POST["name"];
        $Name = $_POST['name'];
		$pn= $_POST['pn'];
         $Email= $_POST['email'];
         $DOB= $_POST['dob'];
         $Gender =$_POST['gender'];

          if (empty($_POST["name"])) 
        {
            $nameErr = "Name is required";
        } 
        else {
            $name = test_Input($_POST["name"]);
            if ((!preg_match("/^[a-zA-Z-'. ]*$/", $name)) or (str_word_count($name_count) < 2)) {
                $nameErr = "At least two words and Alphabets only";
            }
        }

         if (empty($_POST["pn"])) 
        {
            $pnErr = "Phone number is required";
        } 


        else 
        {
            $pn = test_Input($_POST["pn"]);
    }
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
    if (empty($_POST["gender"])) 
    {
    $genderErr = "Gender is required";
    } 
    else 
    {
    $gender = test_input($_POST["gender"]);
     }
     if (empty($_POST["dob"])) 
    {
    $dobErr = "dob is required";
    } 
    else 
    {
    $dob = test_input($_POST["dob"]);
     }

  if(empty($nameErr) && empty($pnErr) && empty($emailErr)&& empty($genderErr)&&empty($genderErr)&&empty($dobErr)&&$_SERVER["REQUEST_METHOD"] == "POST")
       {
        $message="";

        $data = file_get_contents("Model/information.json");
         $data = json_decode($data, true);
        if (!empty($data))
         {
            foreach ($data as $key => $row)
             {

             if ($row["Username"] == $_SESSION["un"]) 

             {

                $data[$key]['Name'] = $name;
				$data[$key]['Phone Number'] = $pn;
                $data[$key]['Email'] = $email;
                $data[$key]['Gender'] = $gender;
                $data[$key]['DOB'] = $dob;


                file_put_contents('Model/information.json', json_encode($data));
                $_SESSION["name"] = $name;
				$_SESSION["pn"] = $pn;
                $_SESSION["pass"] = $email;
                $_SESSION["gender"] = $gender;
                $_SESSION["dob"] = $dob;

            $message = "Profile updated!";
            
                    break;
             }
    }

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