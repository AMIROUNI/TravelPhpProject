<?php
class admin{
    private $email;
    private $password;
   
  function __constract($email,$password){
    $this->email = $email;
    $this->password = $password;
  }

  function getEmail(){
    return $this->email;
  }
  
  function setEmail($e){
       $this->email->$e;


}
  function getPassword(){
    return $this->password;
  }

   function setPassword($password){
    $this->password=$password;
   }
   function login($con){
    $sql = "SELECT * FROM admin WHERE email=:email AND password=:password";
    $res=$con->parepar($sql);
    $tab=array(':email'=>$this->email,':password'=>$this->password)
    $resultat=$res->execute($tab);
    return $resultat;

   }
}

?>