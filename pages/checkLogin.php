<?php
session_start();
$usernameErr="";
$passwordErr="";

//import Connection File
include_once ('connectdb.php');

//Check form is fill or not
if(isset($_POST['register'])){

    //Check UserName is Empty Or Not Empty
    if(empty($_POST['username']))
    {
        $usernameErr="نام کاربری را وارد نمائید";
    }
    else{
        //Call Sanitizing Function
        $username=sanitize_data($_POST['username']);
    }

    //Check Password is Empty Or Not Empty
    if(empty($_POST['password']))
    {
        $passwordErr="نام کاربری را وارد نمائید";
    }
    else{
        //Call Sanitizing Function
        $password=sanitize_data($_POST['password']);
    }

    //Check Login Information
    $stmt=$conn->prepare("SELECT * FROM tbl_login WHERE username=:us AND password=:ps");

    $stmt->bindParam(':us',$username);
    $stmt->bindParam(':ps',$password);
    $stmt->execute();
    
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if($stmt->rowCount()>0)
    {   
        $row=$stmt->fetch();
      switch($row['type'])
        {
            case 1:
                $_SESSION['os.php']=$row['code'];
                header('Location:os.php');
                 break;
            case 2:
                 $_SESSION['..']=$row['code'];
                header('Location:..');
                break;
        }
    }
    else{
        //Username & Password Incorrect >> Back to the Login Form
        $_SESSION['err_login']="*نام کاربری یا پسورد اشتباه است!";
        header('location:../os.php');
    }
}
else{
    //Form is not Submit >> Back to the Login Form
    header('location:../os.php');
}

//Sanitizing  Input Data
function sanitize_data($data)
{
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    
    return $data;
}
?>