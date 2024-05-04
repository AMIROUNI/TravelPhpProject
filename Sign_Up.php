<?php

include'connect.php';
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['password']) ){
$name=$_POST['name'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$password=$_POST['password'];
$sql="INSERT INTO users (name,email,tel,password) VALUES (:name,:email,:tel,:password)";
$res=$con->prepare($sql);
$tab=array(':name'=>$name,':email'=>$email,':tel'=>$tel,':password'=>$password);
$resultat=$res->execute($tab);
if ($resultat){
    $user=1;
    echo "Ineseted success";
    header('location:index.php#login-form');
}
else {
    $user=0;
     echo "Ineseted faild";
    }


}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign_Up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
</head>
<body>

    <!------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------>

    <section class="book" id="book">
        <h1 class="heading">
            <span>S</span>
            <span>i</span>
            <span>g</span>
            <span>n</span>
            &nbsp;
            &nbsp;
            <span>U</span>
            <span>P</span>
            
        </h1>

        <div class="row">
            <div class="image">
                <img src="images/book-img.svg" alt="">
            </div>
            <form method="post">
                <div class="inputdiv">
                    <h3>your name</h3>
                    <input type="text" placeholder="your name" name="name">
                </div>
                <div class="inputdiv">
                    <h3>your eamil</h3>
                    <input type="text" placeholder="your eamil" name="email">
                </div>
                <div class="inputdiv">
                    <h3>your number phone</h3>
                    <input type="text" placeholder="your number phone"name="tel">
                </div>

                <div class="inputdiv">
                    <h3>password</h3>
                    <input type="password" placeholder="your password"name="password">
                </div>
                <div class="inputdiv">

                <input type="submit" class="btn" value="Sign up now">
            </form>
        </div>
    </section>
    <!------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------>
    
</body>
</html>