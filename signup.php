<?php 

session_start();
include_once 'db.php';
$fname = $_POST ['fname']; 
$lname = $_POST ['lname'];
$email = $_POST ['email'];
$phone= $_POST ['phone'];
$password = md5($_POST ['password']);
$cpassword = md5($_POST ['cpassword']);
$Role = 'user';
$verification_status = '0';

//checking if the field are not empty

if(!empty ($fname) && !empty ($lname) && !empty ($email) && !empty ([$phone]) && !empty ($password) && !empty ($cpassword)){
    //if email is valid
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        //checking email is already exists
        $sql = mysqli_query($conn, "SELECT email from users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            echo "$email ~ Already Exists";
        }
        else{
            //checking password and confirm password match
            if($password == $cpassword){
                
                    $time = time ();
                    {
                       $random_id = rand(time(),10000000);       //create user unique id
                       $otp = mt_rand(1111, 9999);              //creating 4 digits OTP

                       //insert data into table
                       $sql2 =mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, phone, password, otp, verification_status, Role)
                       VALUES ({$random_id}),'{$fname}', '{$lname}', '{$email}', '{$phone}', '{$password}', '{$otp}','{$verification_status}','{$Role}')");
                       if ($sql2){
                        $sql3 = mysqli_query ($conn , "SELECT * FROM users WHERE email = '{$email}'");
                        if (mysqli_num_rows ($sql3)>0){
                            $row = mysqli_fetch_assoc($sql3);           //fetch data
                            $_SESSION['unique_id'] = $row['unique_id'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['otp'] = $row['otp'];



                            //mail function

                            if($otp){
                                $receiver = $email;
                                $subject = "From: $fname $lname <$email>";
                                $body = "Name "." $fname $lname \n Email "." $email \n "." $otp";
                

                                if(mail($receiver,$subjec,$body)){
                                    echo "sucess";
                                }
                                else{
                                    echo "Email Problem!" . mysqli_error($conn);
                                }
            
                            }

                    

                        }

                       }
                    }
                

            }
            else{
                echo "Password Don't Match";

            }
        }

    }
    else{

        echo "$email ~ Invalid Email";

    }

}

else{
    echo "All Input Fields are Required!";
}
?>