<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCL-TRUE LIFE CARE</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Russo+One&display=swap');
         *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box; 
    font-family: 'Russo One', sans-serif;
    /* font-weight: 400; */
    font-size: large;
    font-weight: revert;
    
    }
    .btn{
    width: 100%;
    height: 45px;
    background: #162938;
    border: none;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: large;
    color: #fff;
    font-weight: 500;
    position: relative;
    top: 37px;
}
.login-register{
    font-size: medium;
    color: #fff;
    text-align: center;
    font-weight: 500;
    margin: 20px 0 10px;
    padding: 20px;
    position: relative;
    top: 44px;
}

    .wrapper2{
    position: relative;
    width: 650px;
    height: 650px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .5);
    border-radius: 20px;
    backdrop-filter: blur(5px);
    box-shadow: 0 0 30px rgba(0, 0, 0, .5);
    justify-content: center;
    align-items: center;
    left: 800px;
    transition: .5s;
 }
 .Register{
   width: 50%;
   height: 45px;
   background: #162938;
   border: none;
   outline: none;
   border-radius: 6px;
   cursor: pointer;
   font-size: large;
   color: #fff;
   position: relative;
   left: 25%;
   top: 67px;
 }
    .inputbox2 input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    color: #fff;
    font-size: large;
    font-weight: revert;
 }
 .login-register{
    font-size: medium;
    color: #fff;
    text-align: center;
    font-weight: 500;
    margin: 20px 0 10px;
    padding: 20px;
    position: relative;
    top: 44px;
}
    ::placeholder{
   font-size: larger;
   color: #fff;
   font-size: large;
    font-weight: revert;
 }
    .login-register p a{
    color: #fff;
    text-decoration: none;
    font-size: large;
    font-weight: revert;
}
    .inputbox input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    color: #fff;
    font-size: large;
    font-weight: revert;
 }
.inputbox2-Img{
    padding: -1px;
    position: relative;
    top: 13px;
    left: -5px;
    color: #fff;
    padding: 1px;
 }
 .pass{
   position: relative;
   width: 100%;
   height: 38px;
   border-bottom: 2px solid #162938;
   margin: 30px 0;
   position: relative;
   bottom: 3px;
}
.pass input{
   width: 100%;
   height: 100%;
   background: transparent;
   border: none;
   outline: none;
   color: #fff;
   /* font-weight: 300; */
}
    </style>
</head>
<body>
<header>
    <h2 class="logo"> TCL</h2>
    <nav class="navigation">
    <a href="Contactus.php">Contact</a>
    <a href="Userr.php">UserLogin</a>
    <a href="Boothpage.php">BoothLogin</a>
    <button class="btn-login" name="go-to-index" id="go-to-index">Login</button>
    </nav>
</header>
</div>
<div class="container">
<div class="wrapper" name="wrapper" id="wrapper">
    <div class="formbox login">
        <h2>User Login</h2>
        <form method="POST" ID="form1">
            <div class="inputbox">
                <span class="icon">
                    <input type="number" min="0" name="UserID" required>
                    <label for="">User ID</label>
                </span>
            </div>
            <div class="inputbox">
                <span class="icon">
                    <input type="text" name="Password" required>
                    <label for="">Password</label>
                </span>
            </div>
            <button type="submit" class ="btn" name="login">Login</button>
            <div class="login-register">
                <p>Don't have account??<a href="Secondpage.php" class ="register-link" Id="register-link" >Register</a></p>
            </div>
        </form>
    </div>
</div>
<div class="wrapper2" name="wrapper2" id = "wrapper2">
    <div class="formbox2 login2">
    <h2>User Registration</h2>
    <form class ="" method="POST" enctype="multipart/form-data" >
        <div class="box1">
            <div class="inputbox2">
            <input type="text" name="MotherName" placeholder="Mother Name" required>
            </div>
            <div class="inputbox2">
            <input type="text" name="FatherName" placeholder="Father Name" required>
            </div>
            <div class="inputbox2">
            <input type="text" name="ChildName" placeholder="Child Name" required>
            </div>
            <div class="inputbox2">
            <input type="email" name="Email" placeholder="Email" required>
            </div>
            <div class="inputbox2">
            <input type="number" min="0" name="ContactNumber" placeholder="Contact number" required>
            </div>
            <div class="inputbox2">
            <input type="text" name="Address" placeholder="Address" required>
            </div>
        </div>
        <div class="box2">
        <div class="inputbox2">
            <input type="number" name="Weight" min="0" placeholder="Weight" required>
        </div>
        <div class="inputbox2">
            <input type="number" name="Height" min="0" placeholder="Height" required>
        </div>
        <div class="inputbox2-select">
        <select name="BloodGroup" required>
           <option value="A+">A+</option>
           <option value="A-">A-</option>
           <option value="B+">B+</option>
           <option value="B-">B-</option>
           <option value="O+">O+</option>
           <option value="O-">O-</option>
           <option value="AB+">AB+</option>
           <option value="AB-">AB-</option>
          </select>
            <label for="">BloodGroup</label>
            </div>
            <div class="inputbox2-select" >
        <select name="Gender" required>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
           <option value="Other">Other</option>
          </select>
            <label for="">Gender</label>
            </div>
            <div class="inputbox2-date">
            <input type="Date" class="inputbox2-date2" name="BirthDate" required>
            <label for="">Birthdate</label>
        </div>
        <div class="inputbox2-Img">
            <input type="File" name="BirthCertificate">
            <label for="">BirthCertificate</label>
            </div>
            <div class="pass">
            <input type="password" name="Password"  placeholder="Password" required>
        </div>
        </div>
        <div class="inputbox2-register">
        <button type="submit" class ="Register" name="submit-register">Register</button> 
        </div>
            <div class="login-register">
                <p>Already have an account??<a href="" class ="register-link" id = "login-link">Login</a></p>
            </div>
    </form>                                                                                                                                                                                                                                                                                                                                                  
    </div>
</div>
</div>
<?php include('try.php')?>
<script src="help.js"></script>
</body>
</html>

