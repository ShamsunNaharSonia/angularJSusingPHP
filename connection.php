<?php
$userName='root';
$hostName='localhost';
$password='';
$dbName='productdb';

// $con=new mysqli($hostName,$userName,$password,$dbName);
// if($con->connect_error){
//     die("Connection failed".$con->connect_error);
// }                                            
// //echo "connected";

//second way to connect database with project
$con = mysqli_connect($hostName,$userName,$password,$dbName);
if($con ){
    //echo "connection ok";
    
}else{
    echo "connected failed".mysqli_connect_error();
}

?>


