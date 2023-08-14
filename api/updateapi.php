<?php
require_once '../inc/dbconn.php';
require_once '../inc/functions.php';

if ($_SERVER['REQUEST_METHOD']=="POST")
{
    if (isset($_GET['id'])  )
    {
        $id=$_GET['id'];
        // $name=$_POST['name'];
        $query="select * from products where id=$id";
        $runquery=mysqli_query($conn,$query);

        if (mysqli_num_rows($runquery)==1)
        {
            $name=$_POST['name'];
            $query="update products set name='$name' where id=$id";
            $runquery=mysqli_query($conn,$query);
            if ($runquery)
            {
                msg("updated successfully",201);
            }
            else
            {
                msg("failed to update",404);
            }
        }
    }
    else
    {
        msg("product not found",404);
    }
}
else
{
    msg("method not allowed",403);
}





















?>