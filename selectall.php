<?php
require_once 'dbconn.php';

$query="select * from customers";

$runquery=mysqli_query($conn,$query);

if (mysqli_num_rows($runquery)>0) {
    $customers=mysqli_fetch_all($runquery,MYSQLI_ASSOC);
    // echo '<pre>';
    // var_dump($customers);
    
    foreach($customers as $customer)
    {
        echo $customer['customerName'] .'<br>'. $customer['customerNumber'];
        echo "<hr>";
    }
}
else
{
    echo "customer not found";
}















?>