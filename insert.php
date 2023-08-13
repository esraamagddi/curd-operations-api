<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   

</head>
<body>
    <?php require_once 'dbconn.php';

    if(isset($_SESSION['errors']))
    {
        foreach($_SESSION['errors'] as $error)
        {?>

        <alert class="alert danger"><?php echo  $error.'<br>';?></alert>
        <?php

        }
    }
    
    
    
    
    ?>
    <form action="handleinsert.php" method="post">

        <input type="text" name="name" id=""><br>
        <input type="email" name="email" id=""><br>

        <button type="submit" name="submit">submit</button>

    </form>
</body>
</html>