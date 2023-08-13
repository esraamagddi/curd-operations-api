<?php
require_once '../inc/dbconn.php';
require_once '../inc/functions.php';

if ($_SERVER['REQUEST_METHOD']=="GET")
{
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $query="SELECT id from products where id=$id";
        $runquery=mysqli_query($conn,$query);

        if (mysqli_num_rows($runquery)>0){ 
        $query="SELECT `name` FROM `products` where `id` =$id";
        $runquery=mysqli_query($conn,$query);
        $user=mysqli_fetch_assoc($runquery);
        echo json_encode($user);
        }
        else
        {
            msg("id not found",404);
        }
    }
    else
    {
        msg("id not found",404);
    }
  
}
else
{
    msg("method not allowed", 403);
}
?>