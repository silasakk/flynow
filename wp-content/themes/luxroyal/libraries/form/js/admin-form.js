var app = angular.module('app', []);
app.controller('main',  function($scope,$http) {

    $scope.defind_val = function(category_id,product_id,series_id){
        
        $scope.category = category_id;
        $scope.product = product_id;
        $scope.series = series_id;
        
      
        
    }
    function post_to_server(action){

        var val = {
            'action' : action, 
            'category_id':$scope.category,
            'product_id':$scope.product
        };

        $http({
            method: 'POST',
            url: ajaxurl,
            params:val,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(data, status, headers, config) {
            if(data != "null"){
                if(action == 'get_cat'){
                    $scope.category_items = data;
                }
                if(action == 'get_product'){
                    $scope.product_items = data  ;
                }
                if(action == 'get_series'){
                    $scope.series_items = data  ;
                }
            }
                

        });
    }
    $scope.get_data = function(action,selected) {
        
        if(action != undefined){
            post_to_server(action);
            $scope.series = 0  ;
            $scope.series_items = {}  ;
        }else{
            post_to_server('get_cat');
            post_to_server('get_product');
            post_to_server('get_series');
        }
    };
    
    
});
/*----------------------------------------------------------------------------------------------------------*/
app.controller('main_address',  function($scope,$http) {

    $scope.defind_val = function(province,district,place,post_code){

        $scope.province = province;
        $scope.district = district;
        $scope.place = place;
        if(post_code)
        $scope.post_code = post_code;

        console.log($scope.province);

    }
    function post_to_server(action){

        var val = {
            'action' : action, 
            'province' : $scope.province,
            'district' : $scope.district
        };

        $http({
            method: 'POST',
            url: ajaxurl,
            params:val,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(data, status, headers, config) {
            if(data != "null"){
                if(action == 'get_province'){
                    $scope.provinces = data;
                }
                if(action == 'get_district'){
                    $scope.districts = data  ;
                }
                if(action == 'get_place'){
                    $scope.places = data  ;
                }
            }


        });
    }
    $scope.get_obj = function(action) {

        if(action != undefined){
            
            if(action == "get_province"){
            
                $scope.district = 0  ;
                $scope.districts = {}  ;
                
                $scope.place = 0  ;
                $scope.places = {}  ;
                
                $scope.post_code = "" ;
            }
            if(action == "get_district"){

                $scope.district = 0  ;
                $scope.districts = {}  ;
                
                $scope.place = 0  ;
                $scope.places = {}  ;
                
                $scope.post_code = "" ;
            }
            if(action == "get_place"){
                
                $scope.place = 0  ;
                $scope.places = {}  ;

                $scope.post_code = "" ;
                
            }
            
            post_to_server(action);
            
           
            
        }else{
            
            post_to_server('get_province');
            
            if($scope.province)
                post_to_server("get_district");
            
            if($scope.district)
                post_to_server('get_place');
            
        }
    };
    $scope.send_postcode = function(id){
        angular.forEach($scope.places, function(index) {
            if(index.id == id){
                $scope.post_code = index.post_code;
            }
        });
    }


});