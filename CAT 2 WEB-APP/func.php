<?php 
$host = "localhost";
$user = "root"; 
$pass = ""; 
$name = "web_dev";

// Create connection 
$conn = new mysqli($host, $user, $pass, $name);

//Register
if (isset($_POST['register'])) {
 $name = $_POST['name'];
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];
   

   $sql = "INSERT INTO `users`(`Username`, `Name`, `Email`, `Password`)  VALUES ('$username','$name','$email','$password')";
     mysqli_query($conn, $sql);
   // var_dump($sql);
   // die();
  header("Location: login.html?userregistration=success");

//Login
if (isset($_POST['login'])) {
 $email = $_POST['email'];
 $password = $_POST['password'];

		$sql =  "SELECT * FROM `users` WHERE `Email`='$email' AND `Password`='$password'";

        $query = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query) > 0){
        	header("Location: home.php?login=success");
}
}
 ?>