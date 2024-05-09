<?php
class item{
  private $con;
  private  $image;
  private  $location;
  private $description;
  private  $rating;
  private  $price;
  private $discount;
   
  function __construct($con,$image,$location,$description,$rating,$price,$discount){
    $this->con =$con;
    $this->image = $image;
    $this->location = $location;
    $this->description = $description;
    $this->rating = $rating;
    $this->price=$price;
    $this->discount=$discount;
}


function addItem(){
    $sql="INSERT INTO `items`(`id`, `image_url`, `location`, `description`, `rating`, `price`, `discount_price`) VALUES (null,:image_url,:location,:description,:rating,:price,:discount_price) ";
    $stmt = $this->con->prepare($sql);
    $tab=array(':image_url'=>$this->image,':location'=>$this->location,':description'=>$this->description,':rating'=>$this->rating,':price'=>$this->price,':discount_price'=>$this->discount);
    $stmt->execute($tab);
    if($stmt)
        return true;
    
    else
       return false;
}




public  function itemIsExist() {
    $sql = "SELECT * FROM items WHERE  image=:image";
    $res = $this->con-> prepare($sql);
    $tab = array( ':image' => $this->image);
    $res->execute($tab);
    $resultat = $res->rowCount();

    if($resultat > 0) {
        return true;
    } else {
        return false;
    }
}


public static function deleteItem($con,$id){ 
    $sql="DELETE FROM items WHERE id=:id";
    $res=$con->prepare($sql);
    $tab=array(':id'=>$id);
    $resultat=$res->execute($tab);
    if ($resultat){
        $user=1;
        echo "Deleted success";
        header('location: admin.php');
    }
    }

}