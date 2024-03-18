<?php
include 'config.php';
                session_start();

if(isset($_POST['loginbtn']))
{
    if(empty($_POST['email']) || empty($_POST['pswd']))
    {
        header("location:index.php?Empty= Please fill in the Blanks");
    }
    else{
        $query="SELECT * FROM customers WHERE email='".$_POST['email']."' and password='".$_POST['pswd']."'  ";
        $result=mysqli_query($conn,$query);
       
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            $_SESSION['User']=$row['first_name']."   ".$row['last_name'];
            header("location:index.php");
        }}
        else{
            header("location:index.php?Invalid= Wrong Username or Password");
        }
    }

}
else{
echo "not working";
}
?>