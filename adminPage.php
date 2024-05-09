<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('connect.php');
require_once('user.php');
require_once('admin.php');
require_once('item.php');

// Handle user signup
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $password = $_POST['password'];

    $user = new user($con, $name, $email, $tel, $password);
    if(!$user->userIsExist()) {
        if($user->signup()) {
            echo "User added successfully.";
            exit; // Ensure that no code is executed after the redirection
        } else {
            echo "Error in user registration.";
        }
    } else {
        echo "This user already exists.";
    }
}

// Handle item addition
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['image']) && isset($_POST['location']) && isset($_POST['description']) && isset($_POST['rating']) && isset($_POST['discount']) && isset($_POST['price'])) 
 {
    $image = $_FILES['image'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    $path = "/images" . "/" . $image["name"];

    $item = new item($con, $path, $location, $description, $rating, $price, $discount);
    if(!$item->itemIsExist()) {
        if($item->addItem()) {
            echo "<script>alert('Item added successfully.')</script>";
        } else {
            echo "<script>alert('Failed to add item.')</script>";
        }
    } else {
        echo "<script>alert('This item already exists')</script>";
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



<header>
        <div id="menu-bar" class="fas fa-bars" onclick="showmenu()"></div>
     
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#book">book</a>
            <a href="#packages">packages</a>
            <a href="#services">services</a>
            <a href="#gallary">gallary</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>

      </div>
</header>
      

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
         admin::desplayUser($con);
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
            <span>I</span>
            <span>T</span>
            <span>E</span>
            <span>M</span>
            
        </h1>
        <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Upload Item
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" class="form-control" id="location" name="location">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5">
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01">
                            </div>
                            <div class="form-group">
                                <label for="discount_price">Discount Price:</label>
                                <input type="number" class="form-control" id="discount_price" name="discount_price" step="0.01">
                            </div>
                            <button type="submit" class="btn" >Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
    </section> 
    
</body>
</html>