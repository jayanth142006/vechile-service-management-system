<?php

    $con = mysqli_connect ("localhost","java","Java_420_da", "customer details");
    if(!$con){
        die ("Connection Error");
    }
    if(isset($_GET['Del']))
    {
        $id = $_GET[ 'Del'];
        $query = " delete from request where id = '".$id."'";
        $result = mysqli_query ($con, $query); 
        if($result)
        {
            header ("location: request made.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
        {
            header ("location:request made.php");
        }