


<?php

require("connection.php");
$data = json_decode(file_get_contents("php://input"));

// /* Getting file name */
// $filename = $_FILES['file']['name'];
// $tempname= $_FILES['file']["tmp_name"];
// /* Location */
// $folder = 'uploadf/'.$filename;
// //echo $folder;
// $response = array();
// /* Upload file */
// if(move_uploaded_file($tempname,$folder)){
//    $response['product_image'] = $filename; 
// } else{
//    $response['product_image'] = "File not uploaded.";
// }
//  echo json_encode($response);
//  exit;

$name = mysqli_real_escape_string($con, $data->prodname);
$description = mysqli_real_escape_string($con, $data->pdescription);
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
if($btn_name  == 'Update')
{

    $id=$data->id;
 
    $query= "UPDATE ProductDetails SET product_name = '$name', product_description = '$description' WHERE product_id= '$id' ";
    echo  $query;

   //echo $query;
   
   $result= mysqli_query($con, $query);

    if ($result) 
    {
        echo 'data updated';
    } 
    else 
    {
        echo "DATA NOT updated. Error: " . mysqli_error($con);
    }
}
   

}
?>








































