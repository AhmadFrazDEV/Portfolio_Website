<?php

    $conn = mysqli_connect("localhost" , "root" , "" , "portfolio_web");
    if(!$conn)
    {
        echo "Server has not been connected Because of the error-----> ". mysqli_error($conn);
    }
   

?>