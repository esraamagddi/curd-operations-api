<?php
require_once 'dbconn.php';
$query="select * from customers where country='usa'";

$runquery=mysqli_query($conn,$query);

if (mysqli_num_rows($runquery)>0) {
    $customer=mysqli_fetch_assoc($runquery);

// var_dump($customer);
// while($customer=mysqli_fetch_assoc($runquery))
// {
//     var_dump($customer);
//     echo '<hr>';
// }
     
        echo $customer['customerName'] .'<br>'.$customer['customerNumber'];
        echo "<hr>";

}
else
{
    echo 'customer not found';
}



mysqli_close($conn);
?>