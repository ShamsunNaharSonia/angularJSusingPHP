<?php require("connection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AngularJS with PHP</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>




    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
   
    
</head>
<body >
<section style="padding: 80px;">

   <div class="container" style="width:500px" >

   <div ng-app="myapp"  ng-controller="mycontroller">
    <label>Product Name</label>
    <input type="text" name="pname" ng-model="prodname"><br>
{{prodname}}
<br>
    <label>Product Description</label>
    <input type="text" name="pdesc" ng-model="pdescription"><br>
{{pdescription}}
<br>
    <div>
    <input type="submit" style="margin-left:300px" name="btnInsert" id="submit" ng-click="insertData()"class="btn btn-success" value="ADD">
    </div><br>

    <!-- table -->
    <table class="table table-bordered">  
     <tr>  
         <th>Product Name</th>  
        <th>Product Description</th> 
        <th>Actions</th>
    </tr>  
        <tr ng-repeat="x in names">  
            <td>{{x.product_name}}</td>  
            <td>{{x.product_description}}</td>  
         </tr>  
    </table>  
   </div>

</div>
    
</section>
   <!-- <script src="connection.php"></script> -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>

<script>
var app= angular.module("myapp",[]);
app.controller("mycontroller", function($scope, $http){
// $scope.btnName="ADD";
// $scope.product_id=0;
    $scope.insertData = function(){
        // let data = {'prodname':$scope.prodname, 'pdescription':$scope.pdescription};
         $info =  {'prodname':$scope.prodname, 'pdescription':$scope.pdescription};
         //console.log(data);
        $http.post(
            "insert.php",
            $info
           //data
        ).then(function(data){
           // alert(data);
            $scope.prodname=null;
            $scope.pdescription=null;
            //console.log(data)
        });
    }
});
</script>