<?php

class data_base{
   
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "testdb"; 
    public $name;
    public $email;
    public $phone;

    function __construct($name, $email,$phone){
        $this->name = $name;
        $this->name = $email;
        $this->name = $phone;
    
    
        // Create connection
    
    $conn = new mysqli("localhost",  "root", "", "testdb");
     // Check connection
     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);

    }
    }
  
     function exeute_query($name,$email,$phone){

         session_start();
        $sql = "INSERT INTO MyGuests (name,email,phone) VALUES ('$name', '$email', '$phone')";
        $_SESSION["email"] = $email;
        header("Location:home.php");
        
     }
     function __destruct(){
         $conn = new mysqli("localhost",  "root", "", "testdb");
        mysqli_close($conn);
         
    }
    
     
    }
    
     class user extends data_base {
        

    function update_user(){
        
        $sql = "UPDATE users SET name='".$name."', email='".$email."', phone='".$phone."' ,  WHERE email='".$email."'";

    }

    function delete() {
        $sql = "DELETE FROM users WHERE email='".$email."'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
        
    
    function __destruct(){
        
        mysqli_close(conn);
         
    }



}


$con = new data_base($_POST["name"],$_POST["email"],$_POST["phone"]) ;
$con->exeute_query($_POST["name"],$_POST["email"],$_POST["phone"]);  
?>









    




