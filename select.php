
<?php 
//avabe o kora jai 
// require("connection.php"); 

//  $query = "SELECT * FROM ProductDetails";  
//  $result = mysqli_query($con, $query);  
//  $outp = array();
//  //echo $result;
//  while( $rs = $result->fetch_array(MYSQLI_ASSOC)) {
//     $outp[] = $rs;
// }
// echo json_encode($outp);




 
 
  
 require("connection.php"); 
// $output = array();  
 $query = "SELECT * FROM ProductDetails";  
 $result = mysqli_query($con, $query);  

  
    while($row = mysqli_fetch_array($result))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
  
 
   

 ?>  