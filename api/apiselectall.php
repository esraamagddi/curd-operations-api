<?php

require_once '../inc/dbconn.php';
require_once '../inc/functions.php';


if ($_SERVER['REQUEST_METHOD']=="GET")
{

    
    
    $query="SELECT * FROM `products`";

    $runquery=mysqli_query($conn,$query);

if (mysqli_num_rows($runquery)>0)
{

    $users=json_encode(mysqli_fetch_all($runquery,MYSQLI_ASSOC));
    // echo"<pre>";
    print_r($users);
    
    
    
    
}
else
{

     msg("users not found",404);


}

}
else
{
     msg("method not allowed",403);
}






?>