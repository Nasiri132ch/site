<?php
session_start();
if(!isset($_SESSION['daneshjo.php']))
{
    header('location:../index.html');
}
else{
$code=$_SESSION['teacherId'];
//Include Connect to Database File Setting
include_once ('connectdb.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سیستم آموزشی دانشجویان</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <header>
        <div class="user">
            <span>کاربر جاری:</span>
            <span>
                <?php
                    $stmt=$conn->prepare("SELECT * FROM tbl_login WHERE code=:code");
                    $stmt->bindParam(':code',$code);
                    $stmt->execute();

                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $row=$stmt->fetch();

                    echo $row['tname'];
                    echo "   ";
                    echo $row['tfamily'];
                ?>
            </span>
        </div>
        <div class="logo">
            <img src="../images/logo.png" alt="">
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="#">برنامه کلاسی</a></li>
            <li><a href="#">مشاهده نمرات ترم</a></li>
            <li><a href="#">درخواست اعتراض</a></li>
            <li><a href="#">گزارشات آموزشی</a></li>
            <li><a href="logout.php">خروج </a></li>
        </ul>
    </nav>
    <section>
       <div class="news">
       <h2>
            اطلاعیه های آموزشی
        </h2>
        <p>
            بازه زمانی ثبت نمرات ترم دوم تحصیلی از تاریخ 1 خرداد 97 الی 30 خرداد 1397 می باشد
        </p>
       </div>
    </section>
</body>
</html>