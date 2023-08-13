<?php

require_once 'dbconn.php';
/**
 * 1-check the submit
 * 2-getting the data
 * 3-validation if true go insert
 * 4-if false store errors in session
 */
if (isset($_POST['submit']))
{
    $name=trim(htmlspecialchars($_POST['name']));
    $email=$_POST['email'];
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

    if (empty($errors)){
        //insert
        $query="INSERT into `users` (`name`,`email` ) values ('$name','$email')";
        print_r($query);
        $runquery=mysqli_query($conn,$query);

        if ($runquery)
        {
            $_SESSION['success']="data inserted successfully";
            header("location:index.php");
        }
        else 
        {
            $_SESSION['errors']="failed to insert";
            header("location: insert.php");


        }
    }
    else
    {
        //store in session
        $_SESSION['errors']=$errors;
    }
}
else
{
    header("location: insert.php");
}




?>