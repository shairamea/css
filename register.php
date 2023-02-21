<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ActiveHelp - Register </title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <link rel="stylesheet" href = "https://cdnjs.cloudfare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src ="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="form">
        <h2>Signup Form</h2>
        <p>It's free and always will be.</p>
        <form action="" enctype="multipart/form-data">
            <div class="error-text">Error</div>
            <div class = "grid-details">
                <div class ="input">
                    <label>First Name</label>
                    <input type="text" name="fname" placeholder="First Name" required pattern="[a-zA-Z'-'\s]*">
                </div>
                <div class ="input">
                    <label>Last Name</label>
                    <input type="text" name="lname" placeholder="Last Name" required pattern="[a-zA-Z'-'\s]*">
                </div>
            </div>
            <div class="input">
                <label>Email</label>
                <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input">
                <label>Phone Number</label>
                <input type="tel" name="phone" placeholder="Phone Number" required pattern="[0-9]{11}" oninvalid="this.setCustomValidity('Enter 11 Digits Number')" oninput="this.setCustomValidity('')">
            </div>
            <div class = "grid-details">
                <div class ="input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class ="input">
                    <label>Confirm Password</label>
                    <input type="password" name="cpassword" placeholder="Password" required>
                </div>
            </div>
            <div class="submit">
                <input type="submit" value="Signup Now" class="button">
            </div> 
        </form> 
        <div class="link">Already signed up? <a href="login.php"> Login Now </a></div>
    </div>  

    <script src="../js/register.js"></script>
    
</body>
</html>