<?php
include 'connect.php';
if(isset($_GET['id'])){
    $deleteid=$_GET['id'];
    echo $deleteid;
    $sql="DELETE FROM users WHERE id=:id";
    $res=$con->prepare($sql);
    $tab=array(':id'=>$deleteid);
    $resultat=$res->execute($tab);
    if ($resultat){
        $user=1;
        echo "Deleted success";
        header('location: admin.php');
    }

    
}



?>