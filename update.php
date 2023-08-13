<?php
require_once 'dbconn.php';
if (isset($_GET['id']))
{
    $id=$_GET['id'];
}
else{
    header("location: index.php");
}
$name="ali mohamed";
$email="aa@gmail.com";

$errors=[];
if (empty($name)) {

    $errors[]="name must be filled";
    }
elseif(strlen($name)<6)
{
    $errors[]="name must be more than 6 chars";
}
elseif(!is_string($name))
{
    $errors[]="name must be string";
}

if (empty($email)) {

    $errors[]="email must be filled";
    }
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    $errors[]="it must be an email ";
}
elseif(!is_string($email))
{
    $errors[]="email must be string";
} 

    if (empty($errors))
    {
        //update
        $query="SELECT `id` FROM `users` WHERE `id` = $id";

        $runquery=mysqli_query($conn,$query);
         
        if(mysqli_num_rows($runquery)==1)
        {

        

        $query="UPDATE `users` SET `name`='$name', `email`='$email' where `id`=$id";

        $runquery=mysqli_query($conn,$query);
        
        if($runquery)
        {
            $_SESSION['success']="user updated successfully";
            header("location: index.php");
        }else
        {
            $_SESSION['errors']="failed updating user";
            header("location:update.php");
        }
    }}
    else
    {
        //store in session
        $_SESSION['errors']=$errors;
        var_dump($errors);
    }

















?>