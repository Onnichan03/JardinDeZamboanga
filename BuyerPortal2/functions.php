<?php
function getOrderDetails($con, $referenceNumber)
{
    $query = "SELECT * FROM orders WHERE referencenumber = '$referenceNumber'";
    $result = mysqli_query($con, $query);

    if ($result && $orderDetails = mysqli_fetch_assoc($result)) {
        return $orderDetails;
    }

    return false;
}

?>