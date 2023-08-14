<?php
require_once '../inc/dbconn.php';
require_once '../inc/functions.php';

if ($_SERVER['REQUEST_METHOD']=="POST")
{  
    /*    $data=file_get_contents("php://input");
            $alldata=json_decode($data);
            $name=$alldata->name;
            $email=$alldata->email;

            //if you want to read raw json//
            
            
    */     


    $name=trim(htmlspecialchars($_POST['name']));
    $email=trim(htmlspecialchars($_POST['email']));
    
    if (isset($_FILES['image']) && $_FILES['image']['name'])
    {
        $image=$_FILES['image'];

        $image_name=$image['name'];

        $image_tmpname=$image['tmp_name'];

        $ext=strtolower(pathinfo($image_name,PATHINFO_EXTENSION));

        $image_error=$image['error'];

        $image_size=$image['size']/(1024 * 1024 );

        $newname=uniqid().".".$ext;
    }
    else
    {
        $newname=null;
    }
    
    $query="insert into `products` (`name`,`email`,`img`) values ('$name', '$email','$newname')";
    $runquery=mysqli_query($conn,$query);

    if ($runquery)
    {
        //t or f validating query action in inserting
        if (isset($_FILES['image']) && $_FILES['image']['name'])
{
    move_uploaded_file($image_tmpname,"../upload/$newname");

}
        msg("inserted successfully",200);
    }
    else
    {
        msg("failed to insert",404);
    }



}
else
{
    msg("method not allowed",403);
}
