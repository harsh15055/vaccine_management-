<?php
if(isset($_POST['submit-register'])){

    $MotherName = $_POST['MotherName'];
    $FatherName = $_POST['FatherName'];
    $ChildName = $_POST['ChildName'];
    $Email = $_POST['Email'];
    $ContactNumber = $_POST['ContactNumber'];
    $Address = $_POST['Address'];
    $Weight = $_POST['Weight'];
    $Height = $_POST['Height'];
    $BloodGroup = $_POST['BloodGroup'];
    $Gender = $_POST['Gender'];
    $BirthDate = $_POST['BirthDate'];
    $Password = $_POST['Password'];

        $filename = $_FILES["BirthCertificate"]["name"];
        $tmpfilename = $_FILES["BirthCertificate"]["tmp_name"];

        $redundancy = rand(100,99999);

        $folder = "Birth-Certificate-Images/".$redundancy.$filename;

        move_uploaded_file($tmpfilename,$folder);

        $conn = mysqli_connect('localhost','root','','user');
        $tmpid = rand(1,999999);
        $sql  = "INSERT INTO `userregistration`(`UserId`,`TmpId` , `FatherName`, `MotherName`, `ChildName`, `Email`, `Contact`, `Address`, `Height`, `Weight`, `BloodGroup`, `Gender`, `BirthDate`, `BirthCertificate`, `Password`) 
        VALUES ('','$tmpid',' $FatherName','$MotherName','$ChildName','$Email','$ContactNumber','$Address','$Height','$Weight','$BloodGroup','$Gender','$BirthDate','$folder','$Password')";

          $resulte = mysqli_query($conn,$sql);
        $sql2 = "SELECT `UserId` FROM `userregistration` WHERE TmpId = $tmpid ";
        $resulte2 = mysqli_query($conn,$sql2);

        $arr = mysqli_fetch_assoc($resulte2);

        $x = $arr['UserId'];
        echo $x;
          if($resulte) 
          {
            echo "<script>alert('submited !!Your User Id Is $x Please Not Down Or Take ScreenShort ')</script>";
          }
          else{
            echo "<script>alert(' not submited !!')</script>";
          }
    
}

?>
<?php
if(isset($_POST['login'])){
    $UserID = $_POST['UserID'];
    $Password = $_POST['Password'];
    $conn = mysqli_connect('localhost','root','','user');
    $sqlforpass = "SELECT `Password` FROM userregistration WHERE UserId = $UserID";

     $resulte =  mysqli_query($conn,$sqlforpass);
      $realPassword = mysqli_fetch_assoc($resulte);
    if($Password==$realPassword['Password']){
        file_put_contents("data.txt",$UserID);
        echo "<script>window.location.href = 'Userpage.php';</script>";
         
         exit;
    }
    else{
        echo "<script>alert('Incorrect UserId And Password')</script>";
        
        
    }
}

?>