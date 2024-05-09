<?php 
class user  {
    private $con;

    private $name;
    private $email;
    private $tel ;
    private $password;
   
    
    public function __construct($con,$name, $email, $tel, $password) {
        $this->con = $con;
        $this->name = $name;
        $this->email = $email;
        $this->tel = $tel;
        $this->password = $password;
    }
    
    public function getname(){
        return $this->name;
    }
    public function setname($name){
        $this->name=$name;

    }
    public function getTel(){
        return $this->tel;
    }
    public function setTel($tel){
        $this->tel=$tel;
    }

     
    public function getemail(){
        return $this->email;
    }
    public function setemail($email){
        $this->email=$email;
    }
    function login(){
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
        $res=$this->con->prepare($sql);
        $tab=array(':email'=>$this->email,':password'=>$this->password);
        $resultat=$res->execute($tab);
        return $resultat;
       }
    public function signup(){
        $sql = "INSERT INTO `users`(`id`, `name`, `email`, `tel`, `password`) VALUES (null, :name, :email, :tel, :password)";
        $res = $this->con->prepare($sql);
        $tab = array(':name' => $this->name, ':email' => $this->email, ':tel' => $this->tel, ':password' => $this->password);
        $res->execute($tab);
        return $res;
    }


    public  function userIsExist() {
        $sql = "SELECT * FROM users WHERE  email=:email";
        $res = $this->con-> prepare($sql);
        $tab = array( ':email' => $this->email);
        $res->execute($tab);
        $resultat = $res->rowCount();

        if($resultat > 0) {
            return true;
        } else {
            return false;
        }
    }


    public static function deleteUser($con,$id){ 
    $sql="DELETE FROM users WHERE id=:id";
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