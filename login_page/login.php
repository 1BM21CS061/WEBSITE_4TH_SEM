<?php
 $mail=$_POST['mail'];
 $psw=$_POST['psw'];
 $cpsw=$_POST['cpsw'];
//database connection//
$conn=new mysqli('localhost', 'root','', 'signup');
if($conn->connect_error){
    die('Connection Failed: ' .$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into signin(mail, psw, cpsw) values(?, ?, ?)");
    $stmt->bind_param("sss",$mail, $psw, $cpsw);
    try
    {
        $stmt->execute();
        sleep(2);
        echo "Signed in successfully";
        // Redirect browser
        header("Location: http://localhost/WEB_DEV\login_page\loginpage.html");
    
        exit;
    }
    catch(Exception $e) {
        echo "User already exists.";
        
      }


    $stmt->close();
    $conn->close();


}
?>