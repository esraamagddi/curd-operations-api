<?php
require_once 'dbconn.php';
$query="select * from customers where customerNumber=103";

$runquery=mysqli_query($conn,$query);

if (mysqli_num_rows($runquery)==1) {
    $customer=mysqli_fetch_assoc($runquery);?>

    <ul>
        <li>name :<?= $customer['customerName']?></li>
        <li>country :<?= $customer['country']?></li>


    </ul>
<?php
}
else
{
    echo 'customer not found';
}





?>