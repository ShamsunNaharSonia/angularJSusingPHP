


<?php
require("connection.php");

$data = json_decode(file_get_contents("php://input"));


//echo "Raw Data: " . file_get_contents("php://input");
// if (json_last_error() !== JSON_ERROR_NONE) {
//     echo "JSON Decode Error: " . json_last_error_msg();
//     exit;
// }

if (!empty($data)) {
    $name = mysqli_real_escape_string($con, $data->prodname);
    $description = mysqli_real_escape_string($con, $data->pdescription);
    

    $query = "INSERT INTO ProductDetails(`product_name`,`product_description`) VALUES('$name','$description')";
    
    $query_pass = mysqli_query($con, $query);
    
    if ($query_pass) {
        echo 'data inserted';
    } else {
        echo "DATA NOT INSERTED. Error: " . mysqli_error($con);
    }
}


?>
