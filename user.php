<?php 
class user extends admin{
    private $name;
    private $tel ;
    
    public function __construct($name,$email, $tel,$password){
       super($email,$password);
       $this->name=$name;
       $this->tel =$tel;
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

    public funtion singup(){
        $sql="INSERT INTO `users`(`id` ,`name`, `email`, `tel`, `password`) VALUES (null,:name,:email,:tel,'[:password')";
        $res=$con->prepare($sql);
        $tab=array(':name'=>$name,':email'=>$email,':tel'=>$tel,':password'=>$password);
        $res->execute($tab);
       return $res;
    }



}


?>