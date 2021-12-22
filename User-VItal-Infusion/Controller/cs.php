<?php
    session_start();
    $isset=false;
    $currpass=$newpass=$rnewpass=$message="";
    $currpassErr=$newpassErr=$rnewpassErr="";


    if(isset($_SESSION['un']))
    {
        $currentdata = file_get_contents("Model/information.json");  
        $currentdata = json_decode($currentdata, true); 
        foreach($currentdata as $key=>$value){
        if($value['Username']==$_SESSION["un"])
                {
            $Name=$value['Name'];
			$pn= $value['Phone Number'];
            $Gender=$value['Gender'];
            $Username=$value['Username']; 
            $DOB=$value['DOB'];
            $Image=$value['Image']; 
                
            $isset=true;
            break;
            }
        }
    }
		if($isset){
                 $Confirm_msg="";
            }else{
                 $Errmsg="Something did not match";
            }


    	

    	 if (($_SERVER["REQUEST_METHOD"] == "POST"))
        {
           
            
              if (empty($_POST["currpass"])) 
        {
        $currpassErr = "Password is required";
        } 
        else 
        {
        $currpass = test_input($_POST["currpass"]);

          if (strlen($_POST["currpass"]) < 8) {
            $currpassErr = "Your Password Must Contain At Least 8 Digits !"."<br>";
        }
        elseif(!preg_match("#[0-9]+#",$_POST["currpass"])) {
            $currpassErr = "Your Password Must Contain At Least 1 Number !"."<br>";
        }
        elseif(!preg_match("#[A-Z]+#",$_POST["currpass"])) {
            $currpassErr= "Your Password Must Contain At Least 1 Capital Letter !"."<br>";
        }
        elseif(!preg_match("#[a-z]+#",$_POST["currpass"])) {
            $currpassErr= "Your Password Must Contain At Least 1 Lowercase Letter !"."<br>";
        }
        elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["currpass"])) {
            $currpassErr= "Your Password Must Contain At Least 1 Special Character !"."<br>";
        }

            }

         
         
        if (empty($_POST["newpass"])) 
        
        {
        $newpassErr = " New password is required";
        } 


        else
        {
        $newpass = test_input($_POST["newpass"]);

           if($currpass!=$newpass)
           {

          if (strlen($_POST["newpass"]) < 8) 
          {
            $newpassErr = "Your Password Must Contain At Least 8 Digits !"."<br>";
        }
        elseif(!preg_match("#[0-9]+#",$_POST["newpass"])) {
            $newpassErr = "Your Password Must Contain At Least 1 Number !"."<br>";
        }
        elseif(!preg_match("#[A-Z]+#",$_POST["newpass"])) {
            $newpassErr= "Your Password Must Contain At Least 1 Capital Letter !"."<br>";
        }
        elseif(!preg_match("#[a-z]+#",$_POST["newpass"])) {
            $newpassErr= "Your Password Must Contain At Least 1 Lowercase Letter !"."<br>";
        }
        elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["newpass"])) 
        {
            $newpassErr= "Your Password Must Contain At Least 1 Special Character !"."<br>";
        }

            }
            else 
            {
                $newpassErr="New Password should not be same as the Current Password";

            }
        }


        
          if (empty($_POST["rnewpass"])) 
        {
        $rnewpassErr = "Please re-type new password";
        } 
        else 
        {
        $rnewpass = test_input($_POST["rnewpass"]);
           

          if (strlen($_POST["rnewpass"]) < 8)

          {
            $rnewpassErr = "Your Password Must Contain At Least 8 Digits !"."<br>";
        }
        elseif(!preg_match("#[0-9]+#",$_POST["rnewpass"])) {
            $rnewpassErr = "Your Password Must Contain At Least 1 Number !"."<br>";
        }
        elseif(!preg_match("#[A-Z]+#",$_POST["rnewpass"])) {
            $rnewpassErr= "Your Password Must Contain At Least 1 Capital Letter !"."<br>";
        }
        elseif(!preg_match("#[a-z]+#",$_POST["rnewpass"])) {
            $rnewpassErr= "Your Password Must Contain At Least 1 Lowercase Letter !"."<br>";
        }
        elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["rnewpass"])) 
        {
            $rnewpassErr= "Your Password Must Contain At Least 1 Special Character !"."<br>";
        }

            

              elseif( $newpass !=$rnewpass)
              {
                $rnewpassErr="Current password must be matched with new password";
              }
              

           }
            

       }
       if(empty($currpassErr) && empty($newpassErr)&& empty($rnewpassErr)&& $_SERVER["REQUEST_METHOD"] == "POST")
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

                $data[$key]['Password'] = $newpass;

                file_put_contents('Model/information.json', json_encode($data));
                $_SESSION["pass"] = $newpass;

            $message = "Password changed!";
            
                    break;
             }
    }

    }
       }



       function test_Input($data)
        {
            $information = trim($data);
            $information = stripslashes($data);
            $information = htmlspecialchars($data);
            return $data;
        }

?>