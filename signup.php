<?php
include 'config.php';
session_start();
if(isset($_POST['signupbtn']))
{
    if(empty($_POST['fnsignup']) ||empty($_POST['lnsignup']) ||empty($_POST['phonesignup']) || empty($_POST['emailsignup']) || empty($_POST['pswdsignup']) )
    {
        header("location:index.php?SignupEmpty= Please fill in the Blanks");
    }
    else{
        $fname= $_POST['fnsignup'];
        $lname= $_POST['lnsignup'];
        $email= $_POST['emailsignup'];
        $phonenumber= $_POST['phonesignup'];
        $password= $_POST['pswdsignup'];
        $query="INSERT INTO customers(first_name,last_name,email,phone_number,password) VALUES ('$fname','$lname','$email','$phonenumber','$password')";
        // $result=mysqli_query($conn,$query);
        if($conn->query($query) === TRUE){
            header("location:index.php");
        }
        else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
        // if ($result->num_rows > 0) {
        //     while ($row = $result->fetch_assoc()) {
        //     $_SESSION['User']=$row['first_name']."   ".$row['last_name'];
        //     header("location:index.php");
        // }}
        // else{
        //     header("location:index.php?InvalidSignup= Enter Right Credentsials");
        // }
    }

}
else{
echo "not working";
}
?>