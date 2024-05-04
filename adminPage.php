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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body>

    <!------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------>

    <section class="book" id="book">
        <h1 class="heading">
            <span>A</span>
            <span>d</span>
            <span>d</span>
            &nbsp;
            &nbsp;
            <span>U</span>
            <span>s</span>
            <span>e</span>
            <span>r</span>
            
        </h1>

        <div class="row">
            <div class="image">
                <img src="images/book-img.svg" alt="">
            </div>
            <form method="post">
                <div class="inputdiv">
                    <h3>user name</h3>
                    <input type="text" placeholder="user name" name="name">
                </div>
                <div class="inputdiv">
                    <h3>user eamil</h3>
                    <input type="text" placeholder="user eamil" name="email">
                </div>
                <div class="inputdiv">
                    <h3>user number phone</h3>
                    <input type="text" placeholder="user number phone"name="tel">
                </div>

                <div class="inputdiv">
                    <h3>user password</h3>
                    <input type="password" placeholder="your password"name="password">
                </div>
                <div class="inputdiv">

                <input type="submit" class="btn" value="Sign up now">
            </form>
        </div>
    </section>
    <!------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------>

     <section  class="displayUser">
     <h1 class="heading">
            <span>D</span>
            <span>I</span>
            <span>S</span>
            <span>P</span>
            <span>L</span>
            <span>A</span>
            <span>Y</span>
            &nbsp;
            &nbsp;
            &nbsp;
            <span>U</span>
            <span>s</span>
            <span>e</span>
            <span>r</span>
            
        </h1>
        <div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>Email</th>
        <th>nember phone</th>
        <th>delete</th>
        <th>update</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $sql="SELECT * FROM users ";
        $res=$con->query($sql);
        while($row=$res->fetch()) {
            echo"<tr>";
            echo"<td>".$row['id']."</td>";
            echo"<td>".$row['name']."</td>";
            echo"<td>".$row['email']."</td>";
            echo"<td>".$row['tel']."</td>";
            echo"<td><a class='btn btn-danger' href='delete.php?id=".$row['id']."'>delete</a></td>";
            echo"<td><a class='btn btn-success' href='update.php?id=".$row['id']."'>update</a></td>";
            echo"</tr>";

        }
        ?>
     
    </tbody>
  </table>
</div>
     </section>
 
       <!------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------>

    <section class="book" id="book">
        <h1 class="heading">
            <span>A</span>
            <span>d</span>
            <span>d</span>
            &nbsp;
            &nbsp;
            <span>C</span>
            <span>A</span>
            <span>R</span>
            <span>D</span>
            
        </h1>

        <div class="row">
            <div class="image">
                <img src="images/book-img.svg" alt="">
            </div>
            <form method="post">
                <div class="inputdiv">
                    <h3>user name</h3>
                    <input type="text" placeholder="user name" name="name">
                </div>
                <div class="inputdiv">
                    <h3>user eamil</h3>
                    <input type="text" placeholder="user eamil" name="email">
                </div>
                <div class="inputdiv">
                    <h3>user number phone</h3>
                    <input type="text" placeholder="user number phone"name="tel">
                </div>

                <div class="inputdiv">
                    <h3>user password</h3>
                    <input type="password" placeholder="your password"name="password">
                </div>
                <div class="inputdiv">

                <input type="submit" class="btn" value="Sign up now">
            </form>
        </div>
    </section> 
    
</body>
</html>