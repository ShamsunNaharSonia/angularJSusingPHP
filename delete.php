


<?php
// delete.php
require("connection.php");
$data = json_decode(file_get_contents("php://input"));
if (!empty($data)) {
    $id = $data->id;
    $query = "DELETE FROM ProductDetails WHERE product_id='$id'";
    if (mysqli_query($con, $query)) {
        echo 'Data Deleted';
    } else {
        echo 'Error';
    }
}
?>
