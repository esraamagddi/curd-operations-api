<?php
require_once 'dbconn.php';

if (isset($_GET['id']))
{
    $id=$_GET['id'];

    $query=" SELECT `id` FROM `users` WHERE `id`=$id ";

    $runquery=mysqli_query($conn,$query);

    if (mysqli_num_rows($runquery)>0)
    {
        $query="DELETE FROM `users` WHERE `id` = $id";

        $runquery=mysqli_query($conn,$query);
    
        if($runquery)
        {
            $_SESSION['success']="user deleted successfully";
        }
        else
        {
            $_SESSION['errors']="failed to delete user";
        }
    }


}
else
{
    header("location: index.php");
}









?>