<?php

require("connection.php");

$response =  file_get_contents("php://input");

echo "<pre>";
print_r($_POST);
print_r($_FILES);

$product_name = $_POST['prodname'];
$product_description = $_POST['pdescription'];
$product_name = $_POST['prodname'];
$product_name = $_POST['prodname'];

$data=json_decode(file_get_contents("php://input"));


$filename = $_FILES['file']['name'];
$tempname = $_FILES['file']['tmp_name'];
$folder = 'resource/'.$filename;
$name = mysqli_real_escape_string($con, $_POST['prodname']);
$description = mysqli_real_escape_string($con, $data->pdescription);
$response = array();

if (move_uploaded_file($tempname, $folder)) {

    $response['product_image'] = $filename;
} 
else 
{
    $response['product_image'] = "File not uploaded.";
}
echo json_encode($response);
exit;


if ($name && $description ) {
   
    $btn_name = $data->btnName;

    if($btn_name  == "ADD")
    {
        



        $query = "INSERT INTO ProductDetails(`product_image`,`product_name`,`product_description`) VALUES('$folder','$name','$description')";
        $query_pass = mysqli_query($con, $query);
        
        if ($query_pass) {
            echo 'data inserted';
        } else {
            echo "DATA NOT INSERTED. Error: " . mysqli_error($con);
        }
    }


   

}
?>