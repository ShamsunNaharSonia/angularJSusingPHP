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

   <div ng-app="myapp"  ng-controller="mycontroller" ng-init="displayData()">

  
    <div>
         <!-- it works for image upload ............................. -->
    <input type="file" name='file' id='file'ng-model='pic' ><br/> <br><br>
  
</div>
  




    <label>Product Name</label>
    <input type="text" name="pname" ng-model="prodname"><br>
{{prodname}}
<br>
    <label>Product Description</label>
    <input type="text" name="pdesc" ng-model="pdescription"><br>
{{pdescription}}
<br>

    <div>
    <input type="hidden" ng-model="id" />  
    <input type="submit" style="margin-left:300px" name="btnInsert" id="submit" ng-click="insertData()"class="btn btn-success" value="{{btnName}}">
    </div><br>

    <!-- table -->
    <table class="table table-bordered">  
     <tr>  
        <th>ID</th>
        <th>Image</th>
         <th>Product Name</th>  
        <th>Product Description</th> 
        <th>Actions</th> 
    </tr>  
        <tr ng-repeat="product in products"> 
            
            <td>{{product.product_id}}</td> 
            <td><img ng-src="resource/{{product.product_image}}" width="100" height="100"/></td> 
            <td>{{product.product_name}}</td>  
            <td>{{product.product_description}}</td>  
            <td><button ng-click="updateData(product)" class="btn btn-info">Update </button>
            <button ng-click="deleteData(product.product_id)" class="btn btn-danger">Delete </button></td>
         </tr>  
    </table>  
   </div>

</div>
</section>
</body>
</html>


<script>
var app = angular.module("myapp", []);

app.controller("mycontroller", ['$scope', '$http', function ($scope, $http) {
    $scope.btnName = "ADD";
    $scope.products;
   
    $scope.insertData = function () {
       

        var fd = new FormData();
        var files = document.getElementById('file').files[0];

      
         fd.append('file', files);

        fd.append('prodname', $scope.prodname);
        fd.append('pdescription', $scope.pdescription);
        fd.append('btnName', $scope.btnName);
        fd.append('id', $scope.id);

        // Convert FormData to JSON
        // var object = {};
        // fd.forEach(function(value, key){
        //     object[key] = value;
        // });
        // var json = JSON.stringify(object);

       
        $http({
            method: 'POST',
            url: 'insert_three_jsondata.php',
            data:fd,
            transformRequest: angular.identity,
            headers: {
                'Content-Type': undefined
            },
        }).then(function successCallback(response) {
          
            $scope.response = response.data;
        });
    }

    $scope.displayData = function(){  
           $http.get("select.php")  
           .then(function(response){  
                $scope.products =response.data;  
           });  
      }

      $scope.deleteData = function(id){  
           if(confirm("Are you sure you want to delete this data?"))  
           {  
                $http.post("delete.php", {'id':id})  
                .then(function(data){  
                    // alert(data);  
                     $scope.displayData();  
                });  
           }  
           else  
           {  
                return false;  
           }  
      }  

}]);
</script>
