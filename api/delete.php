<?php
require_once '../inc/dbconn.php';
require_once '../inc/functions.php';

if ($_SERVER['REQUEST_METHOD']=="DELETE")
{
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        $query="select id,img from products where id =$id";
        
        $runquery=mysqli_query($conn,$query);
        if (mysqli_num_rows($runquery)==1)
       {    
            // $products=mysqli_fetch_assoc($runquery);
            // $imagename=$products['img'];
            $product = mysqli_fetch_assoc($runquery);
            $imagename = $product['img'];
            if ($imagename && file_exists("../upload/$imagename")) {
                unlink("../upload/$imagename");
            }
            // unlink("../upload/$imagename");
           $query="DELETE FROM products where id =$id";
           $runquery=mysqli_query($conn,$query);


        if ($runquery)
        {
            msg("deleted successfully",201);
        }
        else
        {
            msg("failed to delete",404);
        }
       } 



    }
    else
    {
        msg("users already not exist",404);
    }
}
else
{
    msg("method not allowed",403);
}












?>