<?php
require("connection.php");

$filename = $_FILES['file']['name'];
$tempname = $_FILES['file']['tmp_name'];

$div=explode('.',$filename);
$filename_extensn= strtolower(end($div));
$unique_image = substr(md5(time()),0,10).'.'.$filename_extensn;
$folder = 'resource/'.$unique_image ;

$response = array();

// Get the file extension
$file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));


// //image rename

// list($name, $extension) = explode('.', $filename);

// $randomno = rand(0, 100000000);
// $newname = $name . "_" . $randomno . '.' . $file_extension;








// Define allowed image file types
$allowed_extensions = array('jpg', 'jfif', 'png', 'gif');
$maxSize = 5 * 1024 * 1024; //5MB
//$minsize=2*1024*1024; //2MB
if (in_array($file_extension, $allowed_extensions)) {
    if ($_FILES['file']['size'] > $maxSize) {
        $response['product_image'] = "File size is greater than 5MB).";
    } else {

        // (move_uploaded_file($tempname, $folder . $newname))

        // Move the uploaded file only if it is an allowed image type and size
        if (move_uploaded_file($tempname, $folder)) {
            $response['product_image'] = $folder;
            $name = mysqli_real_escape_string($con, $_POST['prodname']);
            $description = mysqli_real_escape_string($con, $_POST['pdescription']);
            if ($name && $description) {
                $btn_name = $_POST['btnName'];

                if ($btn_name == "ADD") {
                    $query = "INSERT INTO ProductDetails(`product_image`,`product_name`,`product_description`) VALUES('$folder','$name','$description')";
                    $query_pass = mysqli_query($con, $query);

                    if ($query_pass) {
                        echo 'data inserted';
                    } else {
                        echo "DATA NOT INSERTED. Error: " . mysqli_error($con);
                    }
                }
            }
        } else {
            $response['product_image'] = "File not uploaded.";
            

        }
    }
} else {
    $response['product_image'] = "Invalid file type. Only JPG, JFIF,PNG and GIF are allowed.";
}

echo json_encode($response);
